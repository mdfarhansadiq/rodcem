<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\OrderResource;
use App\Models\Company;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    # Agent
    public function index()
    {
        try {
            return OrderResource::collection(Order::whereAgentId(auth('agent')->id())->paginate(10));
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }

    public function place_order(Request $r)
    {
        try {
            # Validation rules | unique:categories (not implemented)
            if(!isset($r->name)){
                $name_errors = [
                    'name' => ['Name field is required.']
                ];
                return API_VALIDATION_ERROR((object) $name_errors);
            }else{
                if (strlen($r->name) > 200) {
                    $name_errors = [
                        'name' => ['Name can contain maximum 200 character.']
                    ];
                    return API_VALIDATION_ERROR((object) $name_errors);
                }
            }

            if(!isset($r->customer_name)){
                $customer_name_errors = [
                    'customer_name' => ['Customer name field is required.']
                ];
                return API_VALIDATION_ERROR((object) $customer_name_errors);
            }else{
                if (strlen($r->customer_name) > 200) {
                    $customer_name_errors = [
                        'customer_name' => ['Customer name can contain maximum 200 character.']
                    ];
                    return API_VALIDATION_ERROR((object) $customer_name_errors);
                }
            }

            if(!isset($r->cart)){
                $cart_errors = [
                    'cart_errors' => ['Cart field is required.']
                ];
                return API_VALIDATION_ERROR((object) $cart_errors);
            }

            $data = [
                'name'          => $r->name,
                'customer_name' => $r->customer_name,
                'des'           => $r->des,
                'note'          => $r->note,
                'agent_id'      => auth('agent')->id(),
                'same_order_uid' => time(),
                'status' => 'Ordered'
            ];

            if($r->hasFile('image')) $data['image'] = upload_file('agent/orders', $r->image);
            
            $order = Order::create($data);

            foreach (explode(',', $r->cart) as $item) {
                $key_value = explode(':', $item);
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $key_value[0],
                    'company_id' => get_product($key_value[0])->company_id,
                    'quantity' => $key_value[1]
                ]);
            }
            return API(['message' => 'Order sended successfully.', 'data' => new OrderResource($order)]);
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }

    public function set_delivery_time_location(Request $r, $order_id)
    {
        try {
            $request = (object) $r->json()->all();

            # Validation rules
            $validator = Validator::make((array) $request, [
                'delivery_date' => 'required',
                'delivery_location' => 'required'
            ]);
            
            # Return validation errors
            if($validator->fails()) return API_VALIDATION_ERROR($validator->errors());

            $order = Order::find($order_id);
            $order->update([
                'delivery_date' => $request->delivery_date,
                'delivery_location' => $request->delivery_location
            ]);
            return API(['message' => 'Delivery date and location updated successfully.', 'data' => new OrderResource($order)]);
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }

    public function set_product_prices(Request $r)
    {
        try {
            $request = (object) $r->json()->all();

            $total_price = 0;
            if(count($request->all()) > 0){
                foreach ($request as $id => $agent_price) {
                    $detail = OrderDetail::find($id);
                    $detail->update([
                        'agent_price' => $agent_price
                    ]);
                    $total_price += $agent_price;
                }
                $detail->order->update([
                    'agent_price' => $detail->order->agent_price + $total_price
                ]);
                return API(['message' => 'Prices saved successfully.', 'data' => new OrderResource($detail->order)]);
            }
            return API(['message' => 'Nothing to update.'], 204);
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }

    # Company
    public function company_orders()
    {
        try {
            $data = Order::with('order_details')->whereHas('order_details', function ($query){
                return $query->whereCompanyId(auth('company_api')->id());
            })->paginate(10);
            return OrderResource::collection($data);
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }

    public function set_products_prices(Request $request)
    {
        try {
            $total_price = 0;
            if(count($request->all()) > 0){
                foreach ($request->all() as $id => $price) {
                    $detail = OrderDetail::find($id);
                    $detail->update([
                        'price' => $price
                    ]);
                    $total_price += $price;
                }
                $detail->order->update([
                    'total_price' => $total_price,
                    'status'      => 'Replied'
                ]);
                return API(['message' => 'Products prices saved successfully.', 'data' => new OrderResource($detail->order)]);
            }
            return API(['message' => 'Nothing to update.'], 204);
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }

    # App Frontend
    public function get_companies()
    {
        try {
            return CompanyResource::collection(Company::paginate(10));
        } catch (\Throwable $th) {
            return API(['message' => $th->getMessage()], 400);
        }
    }
}
