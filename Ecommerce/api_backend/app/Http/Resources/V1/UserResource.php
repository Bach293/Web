<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'registration_date' => $this->registration_date,
            'gender' => $this->gender,
            'role' => $this->role,
            'store_id' => $this->store_id,
            'city_id' => $this->city_id,
            'district_id' => $this->district_id,
            'store' => new StoreResource($this->whenLoaded('store')),
            'city' => new CityResource($this->whenLoaded('city')),
            'district' => new DistrictResource($this->whenLoaded('district')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
