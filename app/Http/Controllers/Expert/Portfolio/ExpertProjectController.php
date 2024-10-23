<?php

namespace App\Http\Controllers\Expert\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\ExpertProject;
use App\Models\ExpertProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExpertProjectController extends Controller
{
    public function index()
    {
        return view('Expert.portfolio.project.index', 
        [
            'projects' => ExpertProject::where('expert_id', auth('expert')->id())->get(),
            'categories' => ExpertProjectCategory::where('expert_id', auth('expert')->id())->get(),
        ]);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'duration'       => 'required',
        //     'title'          => 'required',
        //     'institute_name' => 'required',
        //     'description'    => 'required',
        // ]);

    // return $request;
      $project = new ExpertProject();
      $project->expert_id      = auth('expert')->id();
      $project->category_id    = $request->category_id;
      $project->title          = $request->title;   
      $project->slug           = Str::slug($request->title);
      $project->description    = $request->description;

      if($request->hasFile('image'))
      {  
          $image    = $request->file('image');
          $name     = 'expert-project-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
          $location = public_path('expert/portfolio/project');
          $image->move($location, $name);
          $project->image = $name;
      }

      $project->save();
      return redirect()->route('expert.portfolio.project.index')->with('success',  'New Project Added Successfull');
    }

    public function update(Request $request, $slug)
    {
        // $request->validate([
        //     'duration'       => 'required',
        //     'title'          => 'required',
        //     'institute_name' => 'required',
        //     'description'    => 'required',
        // ]);

       $project = ExpertProject::where('expert_id', auth('expert')->id())->where('slug', $slug)->first();
       $project->expert_id      = auth('expert')->id();
       $project->category_id    = $request->category_id;
       $project->title          = $request->title;
       $project->slug           = Str::slug($request->title);
       $project->description    = $request->description;

       if($request->hasFile('image'))
       {  
           $image    = $request->file('image');
           $name     = 'expert-project-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
           $location = public_path('expert/portfolio/project');
           $image->move($location, $name);
           $project->image = $name;
       }
 

       $project->save();
        return redirect()->route('expert.portfolio.project.index')->with('success',  'Project Updaqte Successfull');
    }

    public function delete($slug)
    {        
       $project = ExpertProject::where('expert_id', auth('expert')->id())->where('slug', $slug)->first();
       $project->delete();
       return redirect()->route('expert.portfolio.project.index')->with('success',  'Project Delete Successfull');
    }
}
