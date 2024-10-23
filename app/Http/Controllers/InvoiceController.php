<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoice($id)
    {
        $id    = decrypt($id);
        $order = Order::find($id);
        return view('user.invoice',compact('order'));
    }
}
