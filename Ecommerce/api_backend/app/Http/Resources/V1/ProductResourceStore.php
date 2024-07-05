<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResourceStore extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sku' => $this->sku,
            'slug' => $this->slug,
            'description' => $this->description,
            'discount_amount' => $this->discount_amount,
            'price' => $this->price,
            'status' => $this->status,
            'draft_content' => $this->draft_content,
            'stock_quantity' => $this->stock_quantity,
            'trademark' => $this->trademark,
            'warranty_period' => $this->warranty_period,
            'type' => $this->type,
            'ship_from' => $this->ship_from,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'store_id' => $this->store_id,
            'images' => ImageResource::collection($this->whenLoaded('images')),
            'variants' => ProductVariantResource::collection($this->whenLoaded('variants')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
