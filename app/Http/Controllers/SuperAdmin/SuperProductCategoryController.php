<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SuperProductCategoryController extends Controller
{
    public function index()
    {
        return view('Super.category.product.index', ['categories' => ProductCategory::latest()->get()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'unique:product_categories,name'
        ]);

       $category = ProductCategory::Create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $name     = 'product-category-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('product/category');
            $image->move($location, $name);
            $category->image = $name;
        }

        $category->save();
        return redirect()->route('super.product.category.index')->with('success', 'Category Create Successfull.');
    }

    public function Update(Request $request, $id)
    {
        $request->validate([
            'name' => 'unique:product_categories,name,'.$request->id,
        ]);

       $category = ProductCategory::find($id);
       $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $name     = 'product-category-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('product/category');
            $image->move($location, $name);
            $category->image = $name;
        }

        $category->save();
        return redirect()->route('super.product.category.index')->with('success', 'Category Update Successfull.');
    }

    public function delete($id)
    {
        $category = ProductCategory::find($id);
        if (count($category->sub_category) == 0) {
            $category->delete();
            return redirect()->route('super.product.category.index')->with('success', 'Category Delete Successfull.');
        }
        return redirect()->route('super.product.category.index')->with('error', 'Category Can\'t Delete.');

    }

}
