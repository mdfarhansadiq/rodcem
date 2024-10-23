<?php

namespace App\Http\Controllers\Api\V1\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        try {
            return ProductResource::collection(Product::whereCompanyId(auth('company_api')->id())->get());
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }

    public function store(Request $r)
    {
        try {
            # Validation rules | unique:products (not implemented)
            if(!isset($r->name)){
                $name_errors = [
                    'name' => ['Name field is required.']
                ];
                return API_VALIDATION_ERROR((object) $name_errors);
            }else{
                if (strlen($r->name) > 150) {
                    $name_errors = [
                        'name' => ['Name can contain maximum 150 character.']
                    ];
                    return API_VALIDATION_ERROR((object) $name_errors);
                }
            }

            if(!isset($r->unit_id)){
                $unit_id_errors = [
                    'unit_id' => ['Unit field is required.']
                ];
                return API_VALIDATION_ERROR((object) $unit_id_errors);
            }

            if(!isset($r->category_id)){
                $category_id_errors = [
                    'category_id' => ['Category field is required.']
                ];
                return API_VALIDATION_ERROR((object) $category_id_errors);
            }

            if(!$r->hasFile('image')){
                $image_errors = [
                    'image' => ['Image field is required & should be a file.']
                ];
                return API_VALIDATION_ERROR((object) $image_errors);
            }
            
            $product = Product::create([
                'name'   => $r->name,
                'unit_id'   => $r->unit_id,
                'category_id'   => $r->category_id,
                'company_id'   => auth('company_api')->id(),
                'image' => upload_file('company/products', $r->image)
            ]);
            return API(['message' => 'Product created successfully.', 'data' => new ProductResource($product)]);
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
                if (strlen($r->name) > 150) {
                    $name_errors = [
                        'name' => ['Name can contain maximum 150 character.']
                    ];
                    return API_VALIDATION_ERROR((object) $name_errors);
                }
            }

            if(!isset($r->unit_id)){
                $unit_id_errors = [
                    'unit_id' => ['Unit field is required.']
                ];
                return API_VALIDATION_ERROR((object) $unit_id_errors);
            }

            if(!isset($r->category_id)){
                $category_id_errors = [
                    'category_id' => ['Category field is required.']
                ];
                return API_VALIDATION_ERROR((object) $category_id_errors);
            }

            $product = Product::find($id);
            $data = [
                'name'   => $r->name,
                'unit_id'   => $r->unit_id,
                'category_id'   => $r->category_id
            ];
            
            if($r->hasFile('image')){
                $data['image'] = upload_file('company/products', $r->image);
                remove_file('company/products', $product->image);
            }
            
            $product->update($data);
            return API(['message' => 'Product created successfully.', 'data' => new ProductResource($product)]);
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::find($id);
            if(empty($product)) return API(['message' => 'Product does not exist by id ' . $id]);
            remove_file('company/products', $product->image);
            $product->delete();
            return API(['message' => 'Product deleted successfully.']);
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }
}
