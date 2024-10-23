<?php

namespace App\Http\Controllers\Premium\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\AgentSubscription;
use App\Models\AgentSubscriptionDeadLine;
use App\Models\AgentSubscriptionSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class PremiumAgentSubscriptoion extends Controller
{
    public function index()
    {
        return view('Premium.layout.frontend.agent.subscription.index');
    }

    public function subscription_payment($id)
    {
        $subscription =  AgentSubscriptionSetting::find($id);
        $subscription_id = Crypt::encryptString($subscription->id);

        // $url = 'https://sandbox.aamarpay.com/request.php'; // live url https://secure.aamarpay.com/request.php
        $url = 'https://secure.aamarpay.com/request.php'; // live url https://secure.aamarpay.com/request.php
        $fields = array(
            'store_id' => 'rodcem', //store id will be aamarpay,  contact integration@aamarpay.com for test/live id
            // 'store_id' => 'aamarpaytest', //store id will be aamarpay,  contact integration@aamarpay.com for test/live id
            // 'amount' => 1, //transaction amount
            'amount' => $subscription->subscription_fee, //transaction amount
            'payment_type' => 'VISA', //no need to change
            'currency' => 'BDT',  //currenct will be USD/BDT
            'tran_id' => rand(1111111, 9999999), //transaction id must be unique from your end
            'cus_name' => auth('agent')->user()->name,  //customer name
            'cus_email' => auth('agent')->user()->email, //customer email address
            'cus_add1' => 'Dhaka',  //customer address
            'cus_add2' => 'Dhaka', //customer address
            'cus_city' => 'Dhaka',  //customer city
            'cus_state' => 'Dhaka',  //state
            'cus_postcode' => '1206', //postcode or zipcode
            'cus_country' => 'Bangladesh',  //country
            'cus_phone' => auth('agent')->user()->phone_number, //customer phone number
            'cus_fax' => 'Not¬Applicable',  //fax
            'ship_name' => 'no ship name', //ship name
            'ship_add1' => 'No Ship Address',  //ship address
            'ship_add2' => 'No Ship Address',
            'ship_city' => 'No Ship Address',
            'ship_state' => 'No Ship Address',
            'ship_postcode' => '1212',
            'ship_country' => 'Bangladesh',
            'desc' => 'Rodcem Subscription Free',
            'success_url' => route('agent.subscription.success', $subscription_id), //your success route
            'fail_url' => route('agent.subscription.fail'), //your fail route
            'cancel_url' => route('agent.subscription.cancel'), //your cancel url
            'opt_a' => 'Reshad',  //optional paramter
            'opt_b' => 'Akil',
            'opt_c' => 'Liza',
            'opt_d' => 'Sohel',
            'signature_key' => '0ac251e5f8a0b6384381016c98ff2d4d'
            // 'signature_key' => 'dbb74894e82415a2f7ff0ec3a97e4183'
        ); //signature key will provided aamarpay, contact integration@aamarpay.com for test/live signature key

        $fields_string = http_build_query($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $url_forward = str_replace('"', '', stripslashes(curl_exec($ch)));
        curl_close($ch);

        $this->redirect_to_merchant($url_forward);
    }

    function redirect_to_merchant($url)
    {
        // return $url;
?>
        <html xmlns="http://www.w3.org/1999/xhtml">

        <head>
            <script type="text/javascript">
                function closethisasap() {
                    document.forms["redirectpost"].submit();
                }
            </script>
        </head>

        <body onLoad="closethisasap();">


            <form name="redirectpost" method="post" action="<?php echo 'https://secure.aamarpay.com/' . $url; ?>"> </form>
            <!-- for live url https://secure.aamarpay.com -->
            <!-- send box https://sandbox.aamarpay.com/' -->
        </body>

        </html>
<?php
        exit;
    }

    public function success(Request $request, $id)
    {

        if (URL::previous() == url('agent/subscription/invoice')) {
            return redirect()->route('agent.subscription.index');
        }

        $subscription_id = Crypt::decryptString($id);
        $subscription_free =  AgentSubscriptionSetting::find($subscription_id);

        // store agent subscripiton
        $subscription = new AgentSubscription();
        $subscription->agent_id               = auth('agent')->id();
        $subscription->subscription_type      = $subscription_free->subscription_type;
        $subscription->subscripiton_book_date = Carbon::today();
        $subscription->subscripiton_start     = Carbon::today();
        if ($subscription_free->suffix == 'year') {
            if (agentHasSubscriptin()) {

                $subscription->subscripiton_end       = Carbon::parse(subsctiption_deadline()->deadline)->addMonth($subscription_free->duration * 12);
            } else {
                $subscription->subscripiton_end       = Carbon::today()->addMonth($subscription_free->duration * 12);
            }
        } else {
            if (agentHasSubscriptin()) {
                // return Carbon::parse(subsctiption_deadline()->deadline)->addMonth($subscription_free->duration);
                $subscription->subscripiton_end  = Carbon::parse(subsctiption_deadline()->deadline)->addMonth($subscription_free->duration);
            } else {
                $subscription->subscripiton_end = Carbon::today()->addMonth($subscription_free->duration);
            }
        }
        $subscription->amount   = $subscription_free->subscription_fee;
        $subscription->save();


        // Set Subscription Deadline
        $deadline = AgentSubscriptionDeadLine::where('agent_id', auth('agent')->id())->first();
        if ($deadline) {
            $deadline->deadline = $subscription->subscripiton_end;
            $deadline->save();
        } else {
            $deadline = new AgentSubscriptionDeadLine();
            $deadline->agent_id = auth('agent')->id();
            $deadline->deadline = $subscription->subscripiton_end;
            $deadline->save();
        }

        // redirct in invoice page
        $trangection_id = $request->pg_txnid;
        Session::put('trangection_id', $trangection_id);
        Session::put('subscription', $subscription->id);
        return redirect()->route('agent.subscription.invoice');
    }

    //Subscription Invoice
    public function subscription_invoice()
    {
        $trangection_id = Session::get('trangection_id');
        $subscription_id = Session::get('subscription');
        $subscription   =  AgentSubscription::find($subscription_id);

        return view('Premium.layout.frontend.agent.subscriptionInvoice', compact('trangection_id', 'subscription'));
    }

    public function fail(Request $request)
    {
        // return $request;
        return view('Premium.layout.frontend.agent.paymentFail');
    }

    //Cancel

    public function payment_cancel()
    {
        return back();
    }
}
