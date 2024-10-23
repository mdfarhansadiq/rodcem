<?php

namespace App\Http\Controllers\Api\V1\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\UnitResource;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    public function index()
    {
        try {
            return UnitResource::collection(Unit::all());
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }

    public function store(Request $r)
    {
        try {
            $request = (object) $r->json()->all();

            # Validation rules
            $validator = Validator::make((array) $request, [
                'name'   => 'required|max:50|unique:units',
                'symbol' => 'required|max:30|unique:units'
            ]);
            
            # Return validation errors
            if($validator->fails()) return API_VALIDATION_ERROR($validator->errors());

            $unit = Unit::create([
                'name'   => $request->name,
                'symbol' => $request->symbol
            ]);
            return API(['message' => 'Unit created successfully.', 'data' => new UnitResource($unit)]);
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }

    public function update(Request $r, $id)
    {
        try {
            $request = (object) $r->json()->all();

            # Validation rules
            $validator = Validator::make((array) $request, [
                'name'   => 'required|max:50',
                'symbol' => 'required|max:30'
            ]);
            
            # Return validation errors
            if($validator->fails()) return API_VALIDATION_ERROR($validator->errors());

            $unit = Unit::find($id);
            if(!empty($unit)){
                $unit->update([
                    'name'   => $request->name,
                    'symbol' => $request->symbol
                ]);
                return API(['message' => 'Unit updated successfully.', 'data' => new UnitResource($unit)]);
            }
            return API(['message' => 'Unit does not exist by id ' . $id]);
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        try {
            Unit::destroy($id);
            return API(['message' => 'Unit deleted successfully.']);
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }
}
