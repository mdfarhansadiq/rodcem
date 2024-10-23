<?php

namespace App\Http\Controllers\Expert\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\ExpertExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExpertExperienceController extends Controller
{
    public function index()
    {
        return view('Expert.portfolio.experience.index', ['qualifications' => ExpertExperience::where('expert_id', auth('expert')->id())->get()]);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'duration'       => 'required',
        //     'title'          => 'required',
        //     'institute_name' => 'required',
        //     'description'    => 'required',
        // ]);

       $experience = new ExpertExperience();
       $experience->expert_id      = auth('expert')->id();
       $experience->duration       = $request->duration;
       $experience->title          = $request->title;
       $experience->institute_name = $request->institute_name;
       $experience->description    = $request->description;
       $experience->slug           = Str::slug($request->title);
       $experience->save();

        return redirect()->route('expert.portfolio.experience.index')->with('success',  'ExperienceAdded Successfull');
    }

    public function update(Request $request, $slug)
    {
        // $request->validate([
        //     'duration'       => 'required',
        //     'title'          => 'required',
        //     'institute_name' => 'required',
        //     'description'    => 'required',
        // ]);

        $experience = ExpertExperience::where('slug', $slug)->first();
        $experience->update($request->all());
        $experience->expert_id = auth('expert')->id();
        $experience->slug = Str::slug($request->title);
        $experience->save();
        return redirect()->route('expert.portfolio.experience.index')->with('success',  'Experience Updaqte Successfull');
    }

    public function delete(Request $request, $slug)
    {        
        $experience = ExpertExperience::where('slug', $slug)->first();
        $experience->delete();
        return redirect()->route('expert.portfolio.experience.index')->with('success',  'Experience Delete Successfull');
    }
}
