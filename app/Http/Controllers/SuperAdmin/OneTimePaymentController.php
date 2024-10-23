<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\AgentOneTimeSubscription;
use App\Models\AgentSubscription;
use App\Models\AgentSubscriptionDeadLine;
use App\Models\OneTimePayment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class OneTimePaymentController extends Controller
{
    public function index()
    {
        return view('Super.subscription.oneTimePaymetn', ['item' => OneTimePayment::first()]);
    }

    public function update(Request $request)
    {
        $item = OneTimePayment::first();
        if ($item) {
            $item->update($request->all());
            return back()->with('success', 'Update Successfull!');
        } else {
            OneTimePayment::Create($request->all());
            return back()->with('success', 'Create Successfull!');
        }
    }

    //Agent One Time Payment Pay
    public function agent_payment_pay()
    {
        // $url = 'https://sandbox.aamarpay.com/request.php'; // live url https://secure.aamarpay.com/request.php
        $url = 'https://secure.aamarpay.com/request.php'; // live url https://secure.aamarpay.com/request.php
        $fields = array(
            // 'store_id' => 'aamarpaytest', //store id will be aamarpay,  contact integration@aamarpay.com for test/live id
            'store_id' => 'rodcem', //store id will be aamarpay,  contact integration@aamarpay.com for test/live id
            'amount' => one_time_paymet()->amount, //transaction amount
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
            'ship_name' => 'One time payment', //ship name
            'ship_add1' => 'No Ship Address',  //ship address
            'ship_add2' => 'No Ship Address',
            'ship_city' => 'No Ship Address',
            'ship_state' => 'No Ship Address',
            'ship_postcode' => '1212',
            'ship_country' => 'Bangladesh',
            'desc' => 'Rodcem One Time Payment',
            'success_url' => route('payment.success'), //your success route
            'fail_url' => route('fail'), //your fail route
            'cancel_url' => route('agent.subscription.cancel'), //your cancel url
            'opt_a' => 'Reshad',  //optional paramter
            'opt_b' => 'Akil',
            'opt_c' => 'Liza',
            'opt_d' => 'Sohel',
            // 'signature_key' => 'dbb74894e82415a2f7ff0ec3a97e4183'
            'signature_key' => '0ac251e5f8a0b6384381016c98ff2d4d'
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
            <!-- 'https://sandbox.aamarpay.com/' -->
        </body>

        </html>
<?php
        exit;
    }

    public function success(Request $request)
    {
        if (URL::previous() == url('one/time/invoice')) {
            return redirect()->route('agent.subscription.index');
        }
        // store agent one time payment
        $agent_one_time_payment = new AgentOneTimeSubscription();
        $agent_one_time_payment->agent_id = auth('agent')->id();
        $agent_one_time_payment->subscription_duration = one_time_paymet()->subscription_duration;
        $agent_one_time_payment->amount = one_time_paymet()->amount;
        $agent_one_time_payment->save();


        // store agent subscripiton
        $subscription = new AgentSubscription();
        $subscription->agent_id               = auth('agent')->id();
        $subscription->subscription_type      = 1;
        $subscription->subscripiton_book_date = Carbon::today();
        $subscription->subscripiton_start     = Carbon::today();
        $subscription->subscripiton_end       = Carbon::today()->addMonth(one_time_paymet()->subscription_duration);;
        $subscription->amount                 = 0;
        $subscription->save();

        // Set Subscription Deadline
        $deadline = new AgentSubscriptionDeadLine();
        $deadline->agent_id = auth('agent')->id();
        $deadline->deadline = $subscription->subscripiton_end;
        $deadline->save();

        $agent = Agent::find(auth('agent')->id());
        $agent->status = 1;
        $agent->save();


        // redirct in invoice page
        $trangection_id = $request->pg_txnid;
        Session::put('trangection_id', $trangection_id);
        return redirect()->route('one.time.payment.invoice');
    }

    //One Time Payment Invoice
    public function one_time_payment_invoice()
    {
        $trangection_id = Session::get('trangection_id');
        return view('Premium.layout.frontend.agent.OnetimepaymentInvoice', compact('trangection_id'));
    }
    public function fail(Request $request)
    {
        // return $request;
        return view('Premium.layout.frontend.agent.paymentFail');
    }
}
