<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Company;
use App\Models\Order;
use App\Models\OneTimePayment;
use Pusher\Pusher;

class SuperAdminController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('Dashboard.super', compact('orders'));
    }

    public function companyList()
    {
        $companies = Company::latest()->paginate(20);
        return view('Super.company', compact('companies'));
    }

    public function agentList()
    {
        $agents = Agent::latest()->paginate(20);
        $has_one_time_payment = OneTimePayment::count();
        $one_time_payment_status = OneTimePayment::latest()->first()->status;
        return view('Super.agent', compact('agents', 'has_one_time_payment', 'one_time_payment_status'));
    }

}
