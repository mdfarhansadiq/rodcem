<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\CompanyCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SuperCompanyCategoryController extends Controller
{
    public function index()
    {
        return view('Super.category.company.index', ['categories' => CompanyCategory::latest()->get()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'unique:company_categories,name'
        ]);
        $category = CompanyCategory::Create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        $category->save();
        return redirect()->route('super.company.category.index')->with('success', 'Category Create Successfull.');
    }

    public function Update(Request $request, $id)
    {
        $request->validate([
            'name' => 'unique:company_categories,name,'.$request->id,
        ]);

        $category = CompanyCategory::find($id);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        $category->save();
        return redirect()->route('super.company.category.index')->with('success', 'Category Update Successfull.');
    }

    public function delete($id)
    {
        $category = CompanyCategory::find($id);
        if(count($category->companies) == 0)
        {
            $category->delete();
            return redirect()->route('super.company.category.index')->with('success', 'Category Delete Successfull.');
        }
        return redirect()->route('super.company.category.index')->with('error', 'Category Can\'t Delete.');
    }

}
