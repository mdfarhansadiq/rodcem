<?php

namespace App\Http\Controllers\Expert\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\ExpertEducation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExperEducationController extends Controller
{
    public function index()
    {
        return view('Expert.portfolio.education.index', ['qualifications' => ExpertEducation::where('expert_id', auth('expert')->id())->get()]);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'duration'       => 'required',
        //     'title'          => 'required',
        //     'institute_name' => 'required',
        //     'description'    => 'required',
        // ]);

       $education = new ExpertEducation();
       $education->expert_id      = auth('expert')->id();
       $education->duration       = $request->duration;
       $education->title          = $request->title;
       $education->institute_name = $request->institute_name;
       $education->description    = $request->description;
       $education->slug           = Str::slug($request->title);
       $education->save();

        return redirect()->route('expert.portfolio.education.index')->with('success',  'Qualification Added Successfull');
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'duration'       => 'required',
            'title'          => 'required',
            'institute_name' => 'required',
            'description'    => 'required',
        ]);

        $education = ExpertEducation::where('slug', $slug)->first();
        $education->update($request->all());
        $education->expert_id = auth('expert')->id();
        $education->slug = Str::slug($request->title);
        $education->save();
        return redirect()->route('expert.portfolio.education.index')->with('success',  'Qualification Updaqte Successfull');
    }

    public function delete(Request $request, $slug)
    {        
        $education = ExpertEducation::where('slug', $slug)->first();
        $education->delete();
        return redirect()->route('expert.portfolio.education.index')->with('success',  'Qualification Delete Successfull');
    }
}
