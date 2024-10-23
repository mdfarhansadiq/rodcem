<?php

namespace App\Http\Controllers\Frontend\Expert;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use App\Models\ExpertAbout;
use App\Models\ExpertBanner;
use App\Models\ExpertEducation;
use App\Models\ExpertExperience;
use App\Models\ExpertProject;
use App\Models\ExpertProjectCategory;
use App\Models\ExpertService;
use Illuminate\Http\Request;

class ExpertPortfolioController extends Controller
{
    public function index()
    {
        return view('Pages.frontend.expert.portfolio');
    }

    public function portfolio($slug)
    {
        $expert      = Expert::where('slug',$slug)->where('status', 1)->first();
        if($expert)
        {
            $banner      = ExpertBanner::where('expert_id', $expert->id)->first();
            $about       = ExpertAbout::where('expert_id', $expert->id)->first();
            $educations  = ExpertEducation::where('expert_id', $expert->id)->get();
            $experiences = ExpertExperience::where('expert_id', $expert->id)->get();
            $services    = ExpertService::where('expert_id', $expert->id)->get();
            $categories  = ExpertProjectCategory::where('expert_id', $expert->id)->get();
            $projects    = ExpertProject::where('expert_id', $expert->id)->get();
            return view('Pages.frontend.expert.portfolio',compact('expert', 'banner', 'about', 'educations', 'experiences', 'services', 'categories', 'projects'));
        }else{

            $pending_expert   = Expert::where('slug',$slug)->where('status', '!=', 1)->first();
            if(auth('super')->check() || auth('expert')->check() && auth('expert')->user()->id == $pending_expert->id)
            {
                $expert      = Expert::where('slug',$slug)->where('status', '!=', 1)->first();
                $banner      = ExpertBanner::where('expert_id', $expert->id)->first();
                $about       = ExpertAbout::where('expert_id', $expert->id)->first();
                $educations  = ExpertEducation::where('expert_id', $expert->id)->get();
                $experiences = ExpertExperience::where('expert_id', $expert->id)->get();
                $services    = ExpertService::where('expert_id', $expert->id)->get();
                $categories  = ExpertProjectCategory::where('expert_id', $expert->id)->get();
                $projects    = ExpertProject::where('expert_id', $expert->id)->get();
    
                return view('Pages.frontend.expert.portfolio',compact('expert', 'banner', 'about', 'educations', 'experiences', 'services', 'categories', 'projects'));
            }else{
                return back();
            }
        }
    }
        
}

