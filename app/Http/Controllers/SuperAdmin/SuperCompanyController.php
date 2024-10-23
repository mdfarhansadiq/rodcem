<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SuperCompanyController extends Controller
{
    public function company_register_form()
    {
        return view('Super.company.register');
    }

    public function company_register(Request $request)
    {
       $request->validate([
            'name'          => ['required', 'string', 'max:255', 'unique:companies'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:companies'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number'  => ['required', 'unique:companies'],
            'category'      => ['required'],
       ]);

         Company::create([
            'name'          => $request->name,
            'slug'          => Str::slug($request->name),
            'email'         => $request->email,
            'phone_number'  => $request->phone_number,
            'category'      => $request->category,
            'password'      => Hash::make($request->password),
        ]);

        return redirect()->route('companies.list')->with('success', 'New Company Added Successfull!');
    }

    public function company_view($id)
    {
        $company = Company::find($id);
        auth('company')->login($company);
        return redirect()->route('company.dashboard');
    }

    public function company_delete($id)
    {
        $company = Company::find($id);
            //Order Delete;
            foreach($company->orders as $order)
            {

                if($order && $order->status != 'payment_done' && $order->status != 'company_payment_receive'&& $order->status != 'deliver')
                {
                    foreach($order->order_details as $detais)
                    {
                       $detais->delete();
                    }
                    if($order->order_location)
                    {
                        $order->order_location->delete();
                    }
                    if($order->order_cancel)
                    {
                        $order->order_cancel->delete();
                    }
                    if($order->payment_slip)
                    {
                        $order->payment_slip->delete();
                    }
                    if($order->client)
                    {
                        $order->client->delete();
                    }
                    $order->delete();
                }else{
                    return back()->with('error', 'Your Can\'t Delete This Company');
                }
            }

            // product delete
            foreach ($company->products as $product) {
                $product->delete();
            }

            foreach ($company->categories as $category) {
                $category->delete();
            }

            $company->delete();
            return back()->with('success', 'Company Delete Successfull!');
    }
}
