<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\Product;
use Illuminate\Support\Collection;

class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
    public function model()
    {
        return Product::class;
    }
 
    public function findProductById($id): ?Product
    {
        return $this->model->with(['images', 'variants', 'category'])->find($id);
    }

    public function findProductByIdAndStoreId($id, $storeId): ?Product{
        return $this->model->with(['images', 'variants', 'category'])->where('store_id', $storeId)->find($id);

    }

    public function paginateProducts(int $perPage, ?int $storeId = null): Collection
    {
        $query = $this->model->with(['images', 'variants', 'category']);

        if (!is_null($storeId)) {
            $query->where('store_id', $storeId);
        }

        $paginator = $query->paginate($perPage);
        return collect($paginator->items());
    }

    public function getTotalProducts(?int $storeId = null): int
    {
        if (!is_null($storeId)){
            return $this->model::where('store_id', $storeId)->count();
        }
        return $this->model::count();
    }

    public function createProduct(array $data): ?Product
    {
        return $this->create($data);
    }

    public function updateProduct(array $data, $id): ?Product
    {
        $product = $this->find($id);
        return $product ? $product->update($data) : null;
    }


    public function deleteProduct($id): bool
    {
        $product = $this->find($id);
        return $product ? $product->delete() : false;
    }

    public function updateStatus($id, int $status): bool
    {
        $product = $this->find($id);
    
        if (!$product) {
            return false;  
        }
    
        if (!in_array($status, [0, 1, 2])) {
            return false;  
        }
    
        $success = $product->update([
            'status' => $status,
            'draft_content' => null  
        ]);
    
        return $success;
    }
}
