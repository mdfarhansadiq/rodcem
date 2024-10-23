<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'order_id' => $this->id,
            'customer_name' => $this->customer_name,
            'name' => $this->name,
            'description' => $this->des,
            'total_price' => $this->total_price ?? null,
            'agent_price' => $this->agent_price ?? null,
            'note' => $this->note,
            'delivery_date' => $this->delivery_date ?? null,
            'delivery_location' => $this->delivery_location ?? null,
            'status' => $this->status,
            'image' => $this->image ? asset('agent/orders/' . $this->image) : null,
            'order_details' => OrderDetailResource::collection($this->order_details),
            'hide_set_delivery_time_and_location_btn' => empty($this->delivery_date) || empty($this->delivery_location) ? false : true,
            'hide_set_products_prices_btn' => $this->total_price && !$this->agent_price ? false : true
        ];
    }
}
