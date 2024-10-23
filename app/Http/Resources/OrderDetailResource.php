<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
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
            'order_detail_id' => $this->id,
            'product_id' => $this->product->id,
            'product_name' => $this->product->name,
            'company_id' => $this->company->id,
            'product_quantity' => $this->quantity,
            'price' => $this->price,
            'agent_price' => $this->agent_price,
            'unit' => $this->product->unit->symbol
        ];
    }
}
