<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\str;

class videoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Super.video.index', ['videos' => Video::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function getYouTubeVideoId($url)
    {
        if (preg_match('/(youtu\.be\/|v=|\/embed\/|\/v\/|watch\?v=|&v=)([^#&?]*).*/', $url, $matches)) {
            return $matches[2]; // Extract the video ID
        }
        return null;
    }


    public function store(Request $request)
    {

        $request->validate([
            'link' => 'required',
            'image' => 'required'
        ]);


        $category = Video::Create($request->all());
        $category->link = 'https://www.youtube.com/embed/' . $this->getYouTubeVideoId($request->input('link'));

        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $name     = 'video-thumbnail-' . uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('video/image');
            $image->move($location, $name);
            $category->image = $name;
            $category->save();
        }

        return redirect()->route('videos.index')->with('success', 'Product Category Create Successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'link' => 'required',
        ]);

        $category = Video::where('id', $id)->first();
        $category->update($request->all());
        $link = $this->getYouTubeVideoId($request->input('link'));
        if(($link) != null) {
            $category->link = 'https://www.youtube.com/embed/' . $link;
        }

        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $name     = 'video-thumbnail-' . uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('video/image');
            $image->move($location, $name);
            $category->image = $name;
            $category->save();
        }

        return redirect()->route('videos.index')->with('success', 'Product Category Update Successfull!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Video::find($id)->delete();
        return redirect()->route('videos.index')->with('success', 'Product Category Update Successfull!');
    }
}
