<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop.category.index', ['categories' => Category::where('user_id', Auth::id())->latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);


        $category = new Category();
        $category->name = $request->name;
        $category->user_id = Auth::id();
        $image    = $request->file('image');
        $name     = 'category-' . '.' . uniqid(50) . '.'.$image->getClientOriginalExtension();
        $location = public_path('uploads/category');
        $image->move($location, $name);
        $category->image = $name;

        $category->save();

        return redirect()->route('shop.category.index')->with('success', 'Category Create Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('shop.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category->update($request->all());

        if($request->hasFile('image'))
        {
            $image    = $request->file('image');
            $name     = 'banner-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/category');
            $image->move($location, $name);
            $category->image = $name;
            $category->save();
        }
        return redirect()->route('shop.category.index')->with('success', 'Category Update Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('shop.category.index')->with('success', 'Category Delete Successfull');
    }
}
