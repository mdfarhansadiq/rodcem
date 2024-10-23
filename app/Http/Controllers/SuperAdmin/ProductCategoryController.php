<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Super.productCategory.index', ['categories' => ProductCategory::latest()->get()]);
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
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'unique:product_categories,name'
         ]);

       $category = ProductCategory::Create($request->all());
       $category->slug = Str::slug($request->name);
       if($request->hasFile('image'))
       {
           $image    = $request->file('image');
           $name     = 'product-category-'.uniqid(50) . '.' . $image->getClientOriginalExtension();
           $location = public_path('product/category');
           $image->move($location, $name);
           $category->image = $name;
           $category->save();
       }


       return redirect()->route('category.index')->with('success', 'Product Category Create Successfull!');
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
            'name' => 'unique:product_categories,name,'.$id
        ]);

       $category = ProductCategory::find($id);
       $category->slug = Str::slug($request->name);
       $category->Update($request->all());
        if($request->hasFile('image'))
        {
            $image    = $request->file('image');
            $name     = 'product-category-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('product/category');
            $image->move($location, $name);
            $category->image = $name;
            $category->save();
        }

       return redirect()->route('category.index')->with('success', 'Product Category Update Successfull!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $category = ProductCategory::find($id);
        if($category->sub_category->count() !=0)
        {
            return redirect()->route('category.index')->with('error', 'Can\'t Delete!Beacuse This Category Has Many Porduct.');
        }
        else{
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Product Category Delete Successfull!');
        }
    }
}
