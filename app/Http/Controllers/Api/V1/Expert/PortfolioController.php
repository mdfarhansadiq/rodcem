<?php

namespace App\Http\Controllers\Api\V1\Expert;

use App\Http\Controllers\Controller;
use App\Http\Resources\PortfolioResource;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        try {
            return PortfolioResource::collection(Portfolio::all());
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }

    public function store(Request $r)
    {
        try {
            # Validation rules | unique:portfolios (not implemented)
            if(!isset($r->title)){
                $title_errors = [
                    'title' => ['Title field is required.']
                ];
                return API_VALIDATION_ERROR((object) $title_errors);
            }else{
                if (strlen($r->title) > 199) {
                    $title_errors = [
                        'title' => ['Title can contain maximum 199 character.']
                    ];
                    return API_VALIDATION_ERROR((object) $title_errors);
                }
            }

            if(!isset($r->description)){
                $description_errors = [
                    'description' => ['Description field is required.']
                ];
                return API_VALIDATION_ERROR((object) $description_errors);
            }

            if(!$r->hasFile('image')){
                $image_errors = [
                    'image' => ['Image field is required & should be a file.']
                ];
                return API_VALIDATION_ERROR((object) $image_errors);
            }
            
            $portfolio = Portfolio::create([
                'expert_id' => auth('expert_api')->id(),
                'title'   => $r->title,
                'description'   => $r->description,
                'image' => upload_file('expert/portfolios', $r->image)
            ]);
            return API(['message' => 'Portfolio created successfully.', 'data' => new PortfolioResource($portfolio)]);
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }

    public function update(Request $r, $id)
    {
        try {
            # Validation rules
            if(!isset($r->title)){
                $title_errors = [
                    'title' => ['Title field is required.']
                ];
                return API_VALIDATION_ERROR((object) $title_errors);
            }else{
                if (strlen($r->title) > 199) {
                    $title_errors = [
                        'title' => ['Title can contain maximum 199 character.']
                    ];
                    return API_VALIDATION_ERROR((object) $title_errors);
                }
            }

            if(!isset($r->description)){
                $description_errors = [
                    'description' => ['Description field is required.']
                ];
                return API_VALIDATION_ERROR((object) $description_errors);
            }
            
            $portfolio = Portfolio::find($id);
            $data['title'] = $r->title;
            $data['description'] = $r->description;

            if($r->hasFile('image')) {
                $data['image'] = upload_file('expert/portfolios', $r->image);
                remove_file('expert/portfolios', $portfolio->image);
            }

            $portfolio->update($data);
            return API(['message' => 'Portfolio updated successfully.', 'data' => new PortfolioResource($portfolio)]);
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        try {
            $portfolio = Portfolio::find($id);
            if(empty($portfolio)) return API(['message' => 'Portfolio does not exist by id ' . $id]);
            remove_file('expert/portfolios', $portfolio->image);
            $portfolio->delete();
            return API(['message' => 'Portfolio deleted successfully.']);
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }
}
