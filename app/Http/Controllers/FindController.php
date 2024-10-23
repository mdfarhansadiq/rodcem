<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\AgentLocation;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;
use App\Models\Expert;
use App\Models\ExpertLocation;
use App\Models\Union;
use App\Models\Upazila;

class FindController extends Controller
{
    public function agent(Request $request)
    {
        visitorLog('agent_find'); 
        $divissions = Division::orderBy('name', 'asc')->get();
        $districts  = District::orderBy('name', 'asc')->get();
        $upazilas   = Upazila::orderBy('name', 'asc')->get();
        $unions     = Union::orderBy('name', 'asc')->get();

    $locations = AgentLocation::where('division_id', $request->division)->where('district_id', $request->district)->where('upazila_id', $request->upalize)->where('union_id', $request->union)->exists();
    if($locations)
    {
        $locations = AgentLocation::where('division_id', $request->division)->where('district_id', $request->district)->where('upazila_id', $request->upalize)->where('union_id', $request->union)->get();
        $agent_id = [];
        foreach($locations as $location)
        {
            $agent_id[] = $location->agent_id;
        }       
         $agents = Agent::whereIn('id',$agent_id)->get();
         return view('Pages.frontend.page.agents', compact('agents','divissions', 'districts', 'upazilas', 'unions'));
    }else{
        // Agent Search Based on division,district,upazila
        $locations = AgentLocation::where('division_id', $request->division)->where('district_id', $request->district)->where('upazila_id', $request->upalize)->exists();
        if($locations)
        {
            $locations = AgentLocation::where('division_id', $request->division)->where('district_id', $request->district)->where('upazila_id', $request->upalize)->get();
            $agent_id = [];
            foreach($locations as $location)
            {
                $agent_id[] = $location->agent_id;
            }       
             $agents = Agent::whereIn('id',$agent_id)->get();
             return view('Pages.frontend.page.agentss', compact('agents','divissions', 'districts', 'upazilas', 'unions'));
        }else{
            // Agent Search Based on division,district
            $locations = AgentLocation::where('division_id', $request->division)->where('district_id', $request->district)->exists();
            if($locations)
            {
                $locations = AgentLocation::where('division_id', $request->division)->where('district_id', $request->district)->get();
                $agent_id = [];
                foreach($locations as $location)
                {
                    $agent_id[] = $location->agent_id;
                }       
                 $agents = Agent::whereIn('id',$agent_id)->get();
                 return view('Pages.frontend.page.agents', compact('agents','divissions', 'districts', 'upazilas', 'unions'));
            }else{                
                $locations = AgentLocation::where('division_id', $request->division)->exists();
                if($locations)
                {                          
                    $locations = AgentLocation::where('division_id', $request->division)->get();
                    $agent_id = [];
                    foreach($locations as $location)
                    {
                        $agent_id[] = $location->agent_id;
                    }       
                    $agents = Agent::whereIn('id',$agent_id)->get();
                    return view('Pages.frontend.page.agents', compact('agents','divissions', 'districts', 'upazilas', 'unions'));
                }else{
                    $locations = AgentLocation::where('division_id', $request->division)->orWhere('district_id', $request->district)->orWhere('upazila_id', $request->upalize)->orWhere('union_id', $request->union)->exists();
                    if($locations)
                    {
                        $locations = AgentLocation::where('division_id', $request->division)->orWhere('district_id', $request->district)->orWhere('upazila_id', $request->upalize)->orWhere('union_id', $request->union)->get();
                        $agent_id = [];
                        foreach($locations as $location)
                        {
                            $agent_id[] = $location->agent_id;
                        }       
                        $agents = Agent::whereIn('id',$agent_id)->get();
                        $agents = Agent::all();
                        return view('Pages.frontend.page.agents', compact('agents','divissions', 'districts', 'upazilas', 'unions'));
                    }else{
                        return back()->with('error','NO Agent Found');
                    }
                }
            }
        }       
    }
    }


    //Find Expert
    // public function expert(Request $request)
    // {
    //     $divissions = Division::orderBy('name', 'asc')->get();
    //     $districts  = District::orderBy('name', 'asc')->get();
    //     $upazilas   = Upazila::orderBy('name', 'asc')->get();
    //     $unions     = Union::orderBy('name', 'asc')->get();

    //     $locations = ExpertLocation::where('division_id', $request->division)->where('district_id', $request->district)->where('upazila_id', $request->upalize)->where('union_id', $request->union)->exists();
    // if($locations)
    // {
    //     $locations = ExpertLocation::where('division_id', $request->division)->where('district_id', $request->district)->where('upazila_id', $request->upalize)->where('union_id', $request->union)->get();
    //     $expert_id = [];
    //     foreach($locations as $location)
    //     {
    //         $expert_id[] = $location->expert_id;
    //     }       
    //      $experts = Expert::whereIn('id',$expert_id)->get();
    //      return view('Pages.expert', compact('experts','divissions', 'districts', 'upazilas', 'unions'));
    // }else{
    //     // Agent Search Based on division,district,upazila
    //     $locations = ExpertLocation::where('division_id', $request->division)->where('district_id', $request->district)->where('upazila_id', $request->upalize)->exists();
    //     if($locations)
    //     {
    //         $locations = ExpertLocation::where('division_id', $request->division)->where('district_id', $request->district)->where('upazila_id', $request->upalize)->get();
    //         $expert_id = [];
    //         foreach($locations as $location)
    //         {
    //             $expert_id[] = $location->expert_id;
    //         }       
    //          $experts = Expert::whereIn('id',$expert_id)->get();
    //          return view('Pages.expert', compact('experts','divissions', 'districts', 'upazilas', 'unions'));
    //     }else{
    //         // Agent Search Based on division,district
    //         $locations = ExpertLocation::where('division_id', $request->division)->where('district_id', $request->district)->exists();
    //         if($locations)
    //         {
    //             $locations = ExpertLocation::where('division_id', $request->division)->where('district_id', $request->district)->get();
    //             $expert_id = [];
    //             foreach($locations as $location)
    //             {
    //                 $expert_id[] = $location->expert_id;
    //             }       
    //              $experts = Expert::whereIn('id',$expert_id)->get();
    //              return view('Pages.expert', compact('experts','divissions', 'districts', 'upazilas', 'unions'));
    //         }else{                
    //             $locations = ExpertLocation::where('division_id', $request->division)->exists();
    //             if($locations)
    //             {                          
    //                 $locations = ExpertLocation::where('division_id', $request->division)->get();
    //                 $expert_id = [];
    //                 foreach($locations as $location)
    //                 {
    //                     $expert_id[] = $location->expert_id;
    //                 }       
    //                 $experts = Expert::whereIn('id',$expert_id)->get();
    //                 return view('Pages.expert', compact('experts','divissions', 'districts', 'upazilas', 'unions'));
    //             }else{
    //                 $locations = ExpertLocation::where('division_id', $request->division)->orWhere('district_id', $request->district)->orWhere('upazila_id', $request->upalize)->orWhere('union_id', $request->union)->exists();
    //                 if($locations)
    //                 {
    //                     $locations = ExpertLocation::where('division_id', $request->division)->orWhere('district_id', $request->district)->orWhere('upazila_id', $request->upalize)->orWhere('union_id', $request->union)->get();
    //                     $expert_id = [];
    //                     foreach($locations as $location)
    //                     {
    //                         $expert_id[] = $location->expert_id;
    //                     }       
    //                     $experts = Expert::whereIn('id',$expert_id)->get();
    //                     $experts = Expert::all();
    //                     return view('Pages.expert', compact('experts','divissions', 'districts', 'upazilas', 'unions'));
    //                 }else{
    //                     return back()->with('error','NO Agent Found');
    //                 }
    //             }
    //         }
    //     }
       
    // }
    // }

    //Find Expert
    public function expert(Request $request)
    {
        $experts = Expert::where('name', 'Like', '%'.$request->search.'%')->orWhere('email', 'Like', '%'.$request->search.'%')->orwhere('designation', 'Like', '%'.$request->search.'%')->get();
        return view('Pages.frontend.page.expert', compact('experts'));
    }
}
