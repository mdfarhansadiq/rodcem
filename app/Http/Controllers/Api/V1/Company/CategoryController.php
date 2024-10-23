<?php

namespace App\Http\Controllers\Api\V1\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            return CategoryResource::collection(Category::all());
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }

    public function store(Request $r)
    {
        try {
            # Validation rules | unique:categories (not implemented)
            if(!isset($r->name)){
                $name_errors = [
                    'name' => ['Name field is required.']
                ];
                return API_VALIDATION_ERROR((object) $name_errors);
            }else{
                if (strlen($r->name) > 50) {
                    $name_errors = [
                        'name' => ['Name can contain maximum 50 character.']
                    ];
                    return API_VALIDATION_ERROR((object) $name_errors);
                }
            }

            if(!$r->hasFile('image')){
                $image_errors = [
                    'image' => ['Image field is required & should be a file.']
                ];
                return API_VALIDATION_ERROR((object) $image_errors);
            }
            
            $category = Category::create([
                'name'   => $r->name,
                'image' => upload_file('company/categories', $r->image)
            ]);
            return API(['message' => 'Category created successfully.', 'data' => new CategoryResource($category)]);
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }

    public function update(Request $r, $id)
    {
        try {
            # Validation rules
            if(!isset($r->name)){
                $name_errors = [
                    'name' => ['Name field is required.']
                ];
                return API_VALIDATION_ERROR((object) $name_errors);
            }else{
                if (strlen($r->name) > 50) {
                    $name_errors = [
                        'name' => ['Name can contain maximum 50 character.']
                    ];
                    return API_VALIDATION_ERROR((object) $name_errors);
                }
            }
            
            $category = Category::find($id);
            $data['name'] = $r->name;

            if($r->hasFile('image')) {
                $data['image'] = upload_file('company/categories', $r->image);
                remove_file('company/categories', $category->image);
            }

            $category->update($data);
            return API(['message' => 'Category updated successfully.', 'data' => new CategoryResource($category)]);
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            if(empty($category)) return API(['message' => 'Category does not exist by id ' . $id]);
            remove_file('company/categories', $category->image);
            $category->delete();
            return API(['message' => 'Category deleted successfully.']);
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }
}
