<?php

namespace App\Http\Controllers\Expert\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ExpertProjectCategory;
use Illuminate\Http\Request;
use illuminate\Support\Str;
class ExpertProjectCategoryController extends Controller
{
    public function index()
    {
        return view('Expert.portfolio.category.index',['categories' => ExpertProjectCategory::where('expert_id', auth('expert')->id())->latest()->get()]);
    }

    public function store(Request $request)
    {
        $category = new ExpertProjectCategory();
        $category->expert_id = auth('expert')->id();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
        return redirect()->route('expert.portfolio.project.category.index')->with('success',  'Category Create Successfull');
    }

    public function update(Request $request, $slug)
    {
        $category = ExpertProjectCategory::where('slug',$slug)->first();
        $category->expert_id = auth('expert')->id();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->route('expert.portfolio.project.category.index')->with('success',  'Category Update Successfull');
    }

    public function delete(Request $request, $slug)
    {
        $category = ExpertProjectCategory::where('slug',$slug)->first();
        $category->delete();
        return redirect()->route('expert.portfolio.project.category.index')->with('success',  'Category Delete Successfull');
    }
}
