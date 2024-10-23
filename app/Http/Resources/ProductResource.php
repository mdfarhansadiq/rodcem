<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'product_id' => $this->id,
            'name' => $this->name,
            'image' => asset('company/products/' . $this->image),
            'unit' => new UnitResource($this->unit),
            'category' => new CategoryResource($this->category)
        ];
    }
}
