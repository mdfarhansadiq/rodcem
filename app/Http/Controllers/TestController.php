<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function invoice()
    {
        return view('test.user_invoice');
        // return view('test.invoice');
    }
}
