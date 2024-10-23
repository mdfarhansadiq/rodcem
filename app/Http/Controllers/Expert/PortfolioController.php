<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    private $VIEW = 'Expert.portfolio.';

    public function index()
    {
        $data = Portfolio::all();
        return view($this->VIEW . 'index', compact('data'));
    }

    public function create()
    {
        return view($this->VIEW . 'create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'   => 'required|max:199',
            'image' => 'required',
            'description' => 'required'
        ]);

        $data['expert_id'] = auth('expert')->id();
        $data['image'] = upload_file('expert/portfolios', $request->image);

        Portfolio::create($data);
        return redirect(route('expert.portfolio.index'))->with('success', 'Portfolio created successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Portfolio::find($id);
        return view($this->VIEW . 'edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title'   => 'required|max:199',
            'description' => 'required'
        ]);

        $portfolio = Portfolio::find($id);

        if($request->hasFile('image')) {
            $data['image'] = upload_file('expert/portfolios', $request->image);
            remove_file('expert/portfolios', $portfolio->image);
        }
        
        $portfolio->update($data);
        return redirect(route('expert.portfolio.index'))->with('success', 'Portfolio updated successfully.');
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        remove_file('expert/portfolios', $portfolio->image);
        $portfolio->delete();
        session()->flash('success', 'Portfolio deleted successfully.');
        return true;
    }
}