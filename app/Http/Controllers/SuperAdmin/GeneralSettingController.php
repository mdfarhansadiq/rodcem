<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    public function index()
    {
        return view('Super.general_setting.index');
    }

    public function update(Request $request)
    {
        $general_setting = GeneralSetting::first();
        if($general_setting)
        {
            $general_setting->update($request->all());
        }else{
            GeneralSetting::Create($request->all());
        }
        return redirect()->route('general.setting.index')->with('success', 'Information Update Successfull!');
    }
}
