<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\ExpertCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SuperEngineerCategoryController extends Controller
{
    public function index()
    {
        return view('Super.category.expert.index', ['categories' => ExpertCategory::latest()->get()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'unique:expert_categories,name'
        ]);
        $category =  ExpertCategory::Create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        $category->save();
        return redirect()->route('super.expert.category.index')->with('success', 'Category Create Successfull.');
    }

    public function Update(Request $request, $id)
    {
        $request->validate([
            'name' => 'unique:expert_categories,name,' . $request->id,
        ]);

        $category =  ExpertCategory::find($id);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        $category->save();
        return redirect()->route('super.expert.category.index')->with('success', 'Category Update Successfull.');
    }

    public function delete($id)
    {
        $category =  ExpertCategory::find($id);
        if (count($category->experts) == 0) {
            $category->delete();
            return redirect()->route('super.expert.category.index')->with('success', 'Category Delete Successfull.');
        }
        return redirect()->route('super.expert.category.index')->with('error', 'Category Can\'t Delete.');
    }
}
