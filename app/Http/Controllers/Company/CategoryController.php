<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // private $VIEW = 'Company.category.';

    public function index()
    {
        $categories = Category::where('company_id', auth('company')->id())->latest()->get();
        return view('Company.category.index', compact('categories'));
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->company_id   = auth('company')->id();
        $category->category_id  = $request->category_id;
        $category->sub_category = $request->sub_category;
        $category->slug         = Str::slug($request->sub_category);
        $category->save();
        return redirect(route('company.category.index'))->with('success', 'Subcategory created successfully.');
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        return back();
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);        
        $category->company_id   = auth('company')->id();
        $category->category_id  = $request->category_id;
        $category->sub_category = $request->sub_category;
        $category->slug         = Str::slug($request->sub_category);
        $category->save();

        return redirect(route('company.category.index'))->with('success', 'SubCategory updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if($category->products->count() !=0)
        {
            return redirect()->route('company.category.index')->with('error', 'Can\'t Delete!Beacuse This Category Has Many Porduct.');
        }
        else{
            $category->delete();
            return redirect(route('company.category.index'))->with('success', 'SubCategory Delete successfully.');
        }
    }
}
