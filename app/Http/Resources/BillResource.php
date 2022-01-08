<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BillResource extends JsonResource
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
            'id'=> $this->id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'city' => $this->city,
            'description' => $this->description,
            'time' => $this->time,
            'price' => $this->price,
        ];
    }
}
