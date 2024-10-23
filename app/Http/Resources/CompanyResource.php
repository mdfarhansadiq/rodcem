<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'company_id' => $this->id,
            'name' => $this->name,
            'logo' => $this->logo ? asset('company/documents/' . $this->logo) : null,
            'cover' => $this->cover ? asset('company/documents/' . $this->cover) : null,
            'products' => ProductResource::collection($this->products)
        ];
    }
}
