<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class WebsiteSettingController extends Controller
{
    private $VIEW = 'Super.website_setting.';

    public function index()
    {
        $data = WebsiteSetting::all();
        return view($this->VIEW . 'index', compact('data'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = WebsiteSetting::find($id);
        return view($this->VIEW . 'edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'value'   => 'required'
        ]);

        $website_setting = WebsiteSetting::find($id);

        if($request->hasFile('value')) {
            $data['value'] = upload_file('super_admin/website_setting', $request->value);
            if($website_setting->value) remove_file('super_admin/website_setting', $website_setting->value);
        }
        
        $website_setting->update($data);
        return redirect(route('super.websitesetting.index'))->with('success', 'Website setting updated successfully.');
    }

    public function destroy($id)
    {
        //
    }
}
