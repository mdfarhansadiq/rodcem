<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use App\Models\PortfolioApproval;
use Illuminate\Http\Request;

class PortfolioApporvalController extends Controller
{
    public function index()
    {
        return view('Super.portfolio_approval.index',
        [
            'experts' => Expert::latest()->get(),
        ]);
    }

    public function message_update(Request $request)
    {
        $portfolio_approved = PortfolioApproval::where('expert_id', $request->expert_id)->first();
        $portfolio_approved->update([
            'message' => $request->message,
        ]);

        return redirect()->route('super.portfolio.approval.index')->with('success', 'Message Send Successfull!');

    }

    public function approve($id)
    {
        $portfolio_approved = PortfolioApproval::where('expert_id', $id)->first();
        $portfolio_approved->update([
            'status' => 1,
        ]);

        return redirect()->route('super.portfolio.approval.index')->with('success', 'Portfolio Approve Successfull!');
    }
}
