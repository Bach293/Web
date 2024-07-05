<?php

namespace App\Repositories;

use App\Models\ProductVariant;

interface ProductVariantRepository
{
    public function createVariant(array $data): ProductVariant;
    public function updateVariant(array $data, $id): bool;
    public function deleteVariant($id): bool;
    public function deleteVariantsByProductId($productId): bool;
}
