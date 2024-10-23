<?php

namespace App\Http\Controllers\Agent\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\AgentServiceCategory;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class AgentServiceCategoryController extends Controller
{
    public function index()
    {
        return view('Super.agentServiceCategory.index', ['categories' => AgentServiceCategory::latest()->get()]);
    }


    public function store(Request $request)
    {
        AgentServiceCategory::Create($request->all());
        return redirect()->route('super.agent.categories.index')->with('success', 'Category Create Successfull!');

    }


    public function update(Request $request, $id)
    {

        $category = AgentServiceCategory::find($id);
        $category->update($request->all());
        return redirect()->route('super.agent.categories.index')->with('success', 'Category Update Successfull!');

    }

    public function destroy($id)
    {

        AgentServiceCategory::find($id)->delete();
        return redirect()->route('super.agent.categories.index')->with('success', 'Category Delete Successfull!');

    }
}
