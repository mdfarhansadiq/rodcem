<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SuperSliderController extends Controller
{
    public function index()
    {
        $data = Slider::all();
        return view('modulus.slider.index', compact('data'));
    }

    public function store(Request $request)
    {
        
        // $data = $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        //     'app_link' => 'required',
        //     'image' => 'required',
        // ]);

 

       $slider = Slider::create($request->all());
       if($request->hasFile('image'))
       {
           $image    = $request->file('image');
           $name     = 'slider-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
           $location = public_path('super/slider');
           $image->move($location, $name);
           $slider->image = $name;
           $slider->save();
       }
        return redirect(route('super.slider.index'))->with('success', 'Slider created successfully.');
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->update($request->all());
        if($request->hasFile('image'))
        {
            $image    = $request->file('image');
            $name     = 'slider-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('super/slider');
            $image->move($location, $name);
            $slider->image = $name;
            $slider->save();
        }

        return redirect(route('super.slider.index'))->with('success', 'Slider Update successfully.');
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect(route('super.slider.index'))->with('success', 'Slider Delete successfully.');
    }
}
