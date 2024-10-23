<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\AgentInfo;
use App\Models\AgentNomineeInfo;
use App\Models\AgentParmanentInfo;
use App\Models\AgentPresentInfo;
use App\Models\AgentShopInfo;
use App\Models\District;
use App\Models\Division;
use App\Models\Union;
use App\Models\Upazila;
use Illuminate\Http\Request;

class AgentDocumentManagementBySuperAdminController extends Controller
{
    public function index($slug)
    {    
       $agent      = Agent::where('slug', $slug)->first();
       $divissions = Division::orderBy('name', 'asc')->get();
       $districts  = District::orderBy('name', 'asc')->get();
       $upazilas   = Upazila::orderBy('name', 'asc')->get();
       $unions     = Union::orderBy('name', 'asc')->get();
 
    //  $agent_info     = AgentInfo::Where('agent_id', $agent->id)->first();
    //  $parmanent_info = AgentParmanentInfo::Where('agent_id', $agent->id)->first();
    //  $present_info   = AgentPresentInfo::Where('agent_id', $agent->id)->first();    
    //  $shop_info      = AgentShopInfo::Where('agent_id', $agent->id)->first();
    //  $shop_info      = AgentShopInfo::Where('agent_id', $agent->id)->first();
    //  $nominee_info   = AgentNomineeInfo::Where('agent_id', $agent->id)->first();
       $agent_info     = agent_info($agent->id);
       $parmanent_info = parmanent_info($agent->id);
       $present_info   = present_info($agent->id);
       $shop_info      = shop_info($agent->id);
       $nominee_info   = nominee_info($agent->id);
       return view('Super.document.index',compact('agent','divissions', 'districts', 'upazilas', 'unions', 'agent_info', 'parmanent_info','present_info', 'shop_info','nominee_info'));
    }
 
 
    public function update(Request $request, $slug)
    {
       $agent      = Agent::where('slug', $slug)->first();
 
       //Shop Information create/update
       $shop = AgentShopInfo::where('agent_id', $agent->id)->first();
       if($shop)
       {
          $shop->update([
             'shop_name' => $request->shop_name,
             'shop_address' => $request->shop_address,
          ]);
       }else{
          AgentShopInfo::Create([
             'agent_id'  => $agent->id,
             'shop_name' => $request->shop_name,
             'shop_area' => $request->shop_area,
          ]);
       }
 
       //Agent Information create/update
       $agent_info = AgentInfo::where('agent_id', $agent->id)->first();
       if($agent_info)
       {
         $agent_info->update([
             'father_name'     => $request->father_name,
             'mother_name'     => $request->mother_name,
             'nid_no'          => $request->nid_no,
             'date_of_birth'   => $request->date_of_birth,
             'gender'          => $request->gender,    
          ]);
 
          if($request->hasFile('agent_photo'))
          {
              $image    = $request->file('agent_photo');
              $name     = 'agent-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
              $location = public_path('agent/document/agent/photo');
              $image->move($location, $name);
              $agent_info->photo = $name;
              $agent_info->save();
          }
          }else{
          $agent_info = AgentInfo::Create([
                'agent_id'        => $agent->id,
                'father_name'     => $request->father_name,
                'mother_name'     => $request->mother_name,
                'nid_no'          => $request->nid_no,
                'date_of_birth'   => $request->date_of_birth,
                'gender'          => $request->gender,    
             ]);
 
             if($request->hasFile('agent_photo'))
             {
                 $image    = $request->file('agent_photo');
                 $name     = 'agent-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                 $location = public_path('agent/document/agent/photo');
                 $image->move($location, $name);
                 $agent_info->photo = $name;
                 $agent_info->save();
             }
          }
          
       //Agent PRESENT ADDRESS CREATE/UPDATE
       $present_addresss = AgentPresentInfo::where('agent_id', $agent->id)->first();
       if($present_addresss)
       {
          $present_addresss->update([
             'division_id' => $request->present_division,
             'district_id' => $request->present_district,
             'upazila_id'  => $request->present_upazila,
             'union_id'    => $request->present_union,
             'post_office' => $request->present_post_office,
             'post_code'   => $request->present_post_code,
          ]);        
       }else{
          AgentPresentInfo::Create([
             'agent_id'    => $agent->id,
             'division_id' => $request->present_division,
             'district_id' => $request->present_district,
             'upazila_id'  => $request->present_upazila,
             'union_id'    => $request->present_union,
             'post_office' => $request->present_post_office,
             'post_code'   => $request->present_post_code,
          ]);
       }
 
       //AGENT PARMANENT ADDRESS CREATE/UPDATE
       $pharmanent_address = AgentParmanentInfo::where('agent_id', $agent->id)->first();
       if($pharmanent_address)
       {
          $pharmanent_address->update([
             'division_id' => $request->pharmanent_division,
             'district_id' => $request->pharmanent_district,
             'upazila_id'  => $request->pharmanent_upazila,
             'union_id'    => $request->pharmanent_union,
             'post_office' => $request->pharmanent_post_office,
             'post_code'   => $request->pharmanent_post_code,            
          ]);         
       }else{
          AgentParmanentInfo::Create([
             'agent_id'    => $agent->id,
             'division_id' => $request->pharmanent_division,
             'district_id' => $request->pharmanent_district,
             'upazila_id'  => $request->pharmanent_upazila,
             'union_id'    => $request->pharmanent_union,
             'post_office' => $request->pharmanent_post_office,
             'post_code'   => $request->pharmanent_post_code,
          ]);
       }
 
       // NOMINEE INFORMATION Create/Update 
       $nominee = AgentNomineeInfo::where('agent_id', $agent->id)->first();
       if($nominee)
       {
          $nominee->update([
             'nominee_name'   => $request->nominee_name,
             'nominee_phone'  => $request->nominee_phone,
             'nominee_email'  => $request->nominee_email,
             'nominee_nid_no' => $request->nominee_nid_no,
          ]);
 
          if($request->hasFile('nominee_photo'))
          {
              $image    = $request->file('nominee_photo');
              $name     = 'agent-nominee-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
              $location = public_path('agent/document/nominee/photo');
              $image->move($location, $name);
              $nominee->nominee_photo = $name;
              $nominee->save();
          } 
       }else{
          AgentNomineeInfo::Create([
             'agent_id'       => $agent->id,
             'nominee_name'   => $request->nominee_name,
             'nominee_phone'  => $request->nominee_phone,
             'nominee_email'  => $request->nominee_email,
             'nominee_nid_no' => $request->nominee_nid_no,      
          ]);
          if($request->hasFile('nominee_photo'))
          {
              $image    = $request->file('nominee_photo');
              $name     = 'agent-nominee-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
              $location = public_path('agent/document/nominee/photo');
              $image->move($location, $name);
              $nominee->nominee_photo = $name;
              $nominee->save();
          } 
       }
 
       return back()->with('success', 'Document Update Succesfull!');
    }
}
