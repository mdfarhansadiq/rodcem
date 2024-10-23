<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;
use App\Models\Union;
use App\Models\Upazila;

class CheckoutController extends Controller
{
    public function checkout($id)
    {
        $agent = Agent::find(auth('agent')->id());
        $divissions = Division::orderBy('name', 'asc')->get();
        $districts  = District::orderBy('name', 'asc')->get();
        $upazilas   = Upazila::orderBy('name', 'asc')->get();
        $unions     = Union::orderBy('name', 'asc')->get();

        return view('Pages.checkout', compact('agent', 'divissions', 'districts', 'upazilas', 'unions'));
    }
}
