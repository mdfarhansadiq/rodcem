<?php

namespace App\Http\Controllers\Expert\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\ExpertService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExpertServiceController extends Controller
{
    public function index()
    {
        return view('Expert.portfolio.service.index', ['services' => ExpertService::where('expert_id', auth('expert')->id())->get()]);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'duration'       => 'required',
        //     'title'          => 'required',
        //     'institute_name' => 'required',
        //     'description'    => 'required',
        // ]);

      $service = new ExpertService();
      $service->expert_id      = auth('expert')->id();
      $service->title          = $request->title;
      $service->slug           = Str::slug($request->title);
      $service->description    = $request->description;


    //   if($request->hasFile('image'))
    //   {  
          $image    = $request->file('image');
          $name     = 'expert-service' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
          $location = public_path('expert/portfolio/service');
          $image->move($location, $name);
          $service->image = $name;
    //   }

      $service->save();
      return redirect()->route('expert.portfolio.service.index')->with('success',  'Service Added Successfull');
    }

    public function update(Request $request, $slug)
    {
        // $request->validate([
        //     'duration'       => 'required',
        //     'title'          => 'required',
        //     'institute_name' => 'required',
        //     'description'    => 'required',
        // ]);

       $service = ExpertService::where('slug', $slug)->first();
       $service->update($request->all());
       $service->expert_id = auth('expert')->id();
       $service->slug = Str::slug($request->title);

       if($request->hasFile('image'))
       {
           $image    = $request->file('image');
           $name     = 'expert-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
           $location = public_path('expert/portfolio/service');
           $image->move($location, $name);
           $service->image = $name;
       }

       $service->save();
        return redirect()->route('expert.portfolio.service.index')->with('success',  'Service Updaqte Successfull');
    }

    public function delete(Request $request, $slug)
    {        
       $service = ExpertService::where('slug', $slug)->first();
       $service->delete();
        return redirect()->route('expert.portfolio.service.index')->with('success',  'Service Delete Successfull');
    }
}
