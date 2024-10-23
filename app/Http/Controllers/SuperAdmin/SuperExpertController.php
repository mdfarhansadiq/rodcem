<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use App\Models\PortfolioApproval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SuperExpertController extends Controller
{
    public function expert_register_form()
    {
        return view('Super.Expert.register');
    }

    public function expert_register(Request $request)
    {
        $request->validate([
            'name'          => ['required', 'string', 'max:255', 'unique:companies'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:companies'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number'  => ['required', 'unique:companies'],
            'designation'   => 'required',
        ]);

        $expert = new Expert();
        $expert->name         = $request->name;
        $expert->slug         = Str::slug($request->name);
        $expert->email        = $request->email;
        $expert->designation  = $request->designation;
        $expert->service_zone = $request->service_zone;
        $expert->phone_number = $request->phone_number;
        $expert->password     = bcrypt($request->password);
        $expert->save();

        $portfolio_approval = PortfolioApproval::create([
            'expert_id' => $expert->id,
        ]);

        return redirect()->route('expert.list')->with('success', 'New Expert Added Successfull!');
    }

    public function expert_view($id)
    {
        $expert = Expert::find($id);
        auth('expert')->login($expert);
        return redirect()->route('expert.dashboard');
    }

    public function expert_delete($id)
    {
        $expert = Expert::find($id);
        $expert->delete();

        return back()->with('success', 'Expert Delete Successfull!');
    }
}
