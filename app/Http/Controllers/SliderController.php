<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Slider::all();
        return view('modulus.slider.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('modulus.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
       }
        return redirect(route('slider.index'))->with('success', 'Slider created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Slider::find($id);
        return  view('modulus.slider.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Slider::find($id);
        return view('modulus.slider.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'title'   => 'required',
            'description'   => 'required',
            'app_link'   => 'required',
            'image'   => 'required',
        ]);

        $slider = Slider::find($id);

        if($request->hasFile('image')) {
            $data['image'] = upload_file('super/sliders', $request->image);
            remove_file('super/sliders', $slider->image);
        }

        $slider->update($data);
        return redirect(route('slider.index'))->with('success', 'Slider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        remove_file('super/sliders', $slider->image);
        $slider->delete();
        session()->flash('success', 'Slider deleted successfully.');
        return true;
    }
}
