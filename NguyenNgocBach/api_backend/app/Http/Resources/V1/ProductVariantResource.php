<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariantResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'color' => $this->color,
            'price' => $this->price,
            'stock_quantity' => $this->stock_quantity,
        ];
    }
}
