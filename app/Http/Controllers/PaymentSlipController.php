<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PaymentSlip;
use Illuminate\Http\Request;

class PaymentSlipController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'slip' => 'required|image',
        ]);

        $slip = PaymentSlip::where('order_id', $id)->where('agent_id', auth('agent')->id())->first();
        if($slip)
        {
            if($request->hasFile('slip'))
            {
                $image    = $request->file('slip');
                $name     = 'payment_slip'. uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('agent/slip');
                $image->move($location, $name);
                $slip->slip = $name;
                $slip->save();
            } 
        }else{
            $slip = PaymentSlip::Create([
                'order_id'     => $id,
                'agent_id'     => auth('agent')->id(),                       
            ]);
    
            if($request->hasFile('slip'))
            {
                $image    = $request->file('slip');
                $name     = 'payment_slip'. uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('agent/slip');
                $image->move($location, $name);
                $slip->slip = $name;
                $slip->save();
            } 

            Order::find($id)->update([
                'status' => 'payment_done',
            ]);
        }
       
        return back()->with('success', 'Panyment Slip Upload Successfull!');
    }
}
