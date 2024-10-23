<?php

use App\Models\ExpertProject;
use App\Models\ExpertService;

    function expert_total_services($id)
    {
        return ExpertService::where('expert_id', $id)->count();
    }

    function expert_total_projects($id)
    {
        return ExpertProject::where('expert_id', $id)->count();
    }
?>