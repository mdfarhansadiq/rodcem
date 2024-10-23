<?php

use App\Models\AgentLocation;
use App\Models\District;
use App\Models\Division;
use App\Models\ExpertLocation;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\UserLocation;

    function division()
    {
        return Division::get();
    }

    function district()
    {
        return District::get();
    }

    function upazila()
    {
        return Upazila::get();
    }

    function union()
    {
        return Union::get();
    }

    function agent_location($id)
    {
       return AgentLocation::where('agent_id', $id)->first();
    }

    function expert_location($id)
    {
       return ExpertLocation::where('expert_id', $id)->first();
    }

    function user_location($id)
    {
       return UserLocation::where('user_id', $id)->first();
    }
?>
