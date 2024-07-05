<?php

namespace App\Repositories;

use App\Models\ProductVariant;

class ProductVariantRepositoryEloquent implements ProductVariantRepository
{
    public function createVariant(array $data): ProductVariant
    {
        return ProductVariant::create($data);
    }

    public function updateVariant(array $data, $id): bool
    {
        $variant = ProductVariant::find($id);
        return $variant ? $variant->update($data) : false;
    }

    public function deleteVariant($id): bool
    {
        $variant = ProductVariant::find($id);
        return $variant ? $variant->delete() : false;
    }

    public function deleteVariantsByProductId($productId): bool
    {
        return ProductVariant::where('product_id', $productId)->delete();
    }
}
