<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $arr = [
            'user_id' => $this->id,
            'name' => $this->name,
            'email' => $this->email
        ];
        if(auth('expert_api')->check() && $this->image) $arr['image'] = asset('expert/documents/' . $this->image);
        elseif(auth('user_api')->check() && $this->image) $arr['image'] = asset('user/documents/' . $this->image);
        elseif(auth('agent_api')->check() && $this->image) $arr['image'] = asset('agent/documents/' . $this->image);
        elseif(auth('company_api')->check() && $this->image) $arr['image'] = asset('company/documents/' . $this->logo);
        return $arr;
    }
}
