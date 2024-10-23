<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Headline;
use App\Models\OurNews;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SuperNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Super.news.index', [
            'categories' => NewsCategory::latest()->get(),
            'news'       => OurNews::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Super.news.create', [
            'categories' => NewsCategory::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $news         = OurNews::Create($request->all());
        $news->slug   = Str::slug($request->name) . uniqid(5);
        $news->author = auth('super')->id();

        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $name     = 'news-' . uniqid(5) . '.' . $image->getClientOriginalExtension();
            $location = public_path('news');
            $image->move($location, $name);
            $news->image = $name;
        }
        $news->save();
        return redirect(route('news.index'))->with('success', 'News created successfully.');
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
        return view('Super.news.edit', [
            'categories' => NewsCategory::latest()->get(),
            'news'       => OurNews::find($id),
        ]);
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
        $news         = OurNews::find($id);
        $news->update($request->all());
        $news->slug   = Str::slug($request->name) . uniqid(5);
        $news->author = auth('super')->id();

        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $name     = 'news-' . uniqid(5) . '.' . $image->getClientOriginalExtension();
            $location = public_path('news');
            $image->move($location, $name);
            $news->image = $name;
        }
        $news->save();
        return redirect(route('news.index'))->with('success', 'News Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OurNews::find($id)->delete();
        return redirect(route('news.index'))->with('success', 'News Delete successfully.');
    }

    //headline
    public function headline()
    {
        return view('Super.news.headline');
    }

    //headline
    public function headline_store(Request $request)
    {
        $headline = Headline::first();
        $headline->content = $request->content;
        $headline->save();
        return back()->with('success', 'Update Successfull!');
    }

}
