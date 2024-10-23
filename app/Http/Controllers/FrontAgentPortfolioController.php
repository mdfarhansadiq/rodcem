<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontAgentPortfolioController extends Controller
{
    public function index()
    {
        return view('Pages.agentPortfolio');
    }
}
