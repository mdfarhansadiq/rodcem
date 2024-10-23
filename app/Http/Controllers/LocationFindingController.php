<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Union;
use App\Models\Upazila;
use Illuminate\Http\Request;

class LocationFindingController extends Controller
{
    public function district(Request $request)
    {
        $districts = District::where('division_id', $request->division_id)->get();
        $html = '';
        foreach ($districts as $key => $district) {
            if($key == 0)
            {
                $first_district = $district->id;
            }            
            $html .= '<option value="' . $district->id . '">' . $district->name . '</option>';
        }

        //upazilas 
        $upazilas = Upazila::where('district_id', $first_district)->get();
        $district_upazilas = '';
        foreach ($upazilas as $key => $upazila) {
            if($key == 0)
            {
                $first_upazila = $upazila->id;
            }
            $district_upazilas .= '<option value="' . $upazila->id . '">' . $upazila->name . '</option>';
        }

        // upazilas union
        $unions = Union::where('upazila_id', $first_upazila)->get();
        $upazilas_union = '';
        foreach ($unions as $union) {
            $upazilas_union .= '<option value="' . $union->id . '">' . $union->name . '</option>';
        }

        return response()->json(['html' => $html, 'district_upazilas' => $district_upazilas, 'upazilas_union' => $upazilas_union]);
    }











    public function upazila(Request $request)
    {
        $upazilas = Upazila::where('district_id', $request->district_id)->get();
        $html = '';
        foreach ($upazilas as $upazila) {
            $html .= '<option value="' . $upazila->id . '">' . $upazila->name . '</option>';
        }
        return response()->json(['html' => $html]);
    }

    public function union(Request $request)
    {
        $unions = Union::where('upazila_id', $request->upazila_id)->get();
        $html = '';
        foreach ($unions as $union) {
            $html .= '<option value="' . $union->id . '">' . $union->name . '</option>';
        }
        return response()->json(['html' => $html]);
    }
}
