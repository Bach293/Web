<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;
use Illuminate\Support\Collection;
use App\Models\Product;

interface ProductRepository extends RepositoryInterface
{
    public function findProductById($id): ?Product;
    public function findProductByIdAndStoreId($id, $storeId): ?Product;
    public function paginateProducts(int $perPage, int $storeId = null): Collection;
    public function getTotalProducts(?int $storeId = null): int;
    public function createProduct(array $data): ?Product;
    public function updateProduct(array $data, $id): ?Product;
    public function deleteProduct($id): bool;
    public function updateStatus($id, int $status): bool;
}
