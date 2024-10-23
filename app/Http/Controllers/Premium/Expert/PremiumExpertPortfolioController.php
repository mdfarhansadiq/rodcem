<?php

namespace App\Http\Controllers\Premium\Expert;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use App\Models\ExpertPortfolio;
use Illuminate\Http\Request;

class PremiumExpertPortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Premium.layout.frontend.expert.projects', ['experts' => ExpertPortfolio::latest()->where('expert_id', auth('expert')->id())->get()]);
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
        $portfolio = new  ExpertPortfolio();
        $portfolio->title = $request->title;
        $portfolio->expert_id = auth('expert')->id();

        if ($request->hasFile('image'))
        {
            $image    = $request->file('image');
            $name     = 'expert-portfolio-' . uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('expert/portfolio');
            $image->move($location, $name);
            $portfolio->image = $name;
        }
        $portfolio->save();
        return redirect()->route('expert.projects.index')->with('success', 'Portfolio Create Successfull.');

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
