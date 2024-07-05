<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Repositories\ImageRepository;
use App\Repositories\ProductVariantRepository;
use App\Models\Product;
use Illuminate\Support\Collection;

class ProductService
{
    protected ProductRepository $productRepository;
    protected ImageRepository $imageRepository;
    protected ProductVariantRepository $productVariantRepository;

    public function __construct(
        ProductRepository $productRepository,
        ImageRepository $imageRepository,
        ProductVariantRepository $productVariantRepository
    ) {
        $this->productRepository = $productRepository;
        $this->imageRepository = $imageRepository;
        $this->productVariantRepository = $productVariantRepository;
    }

    public function getAllProducts(int $perPage, ?int $storeId = null): Collection
    {
        return $this->productRepository->paginateProducts($perPage, $storeId);
    }

    public function getTotalProducts(?int $storeId = null): int
    {
        return  $this->productRepository->getTotalProducts($storeId);
    }

    public function getProductById(int $id): ?Product
    {
        $product = $this->productRepository->findProductById($id);

        if ($product && $product->draft_content) {
            $draftContent = json_decode($product->draft_content, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $product->fill($draftContent);
            }
        }

        return $product;
    }

    public function getProductByIdAndStoreId(int $id, int $storeId): ?Product
    {
        $product = $this->productRepository->findProductByIdAndStoreId($id, $storeId);

        if ($product && $product->draft_content) {
            $draftContent = json_decode($product->draft_content, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $product->fill($draftContent);
            }
        }

        return $product;
    }

    public function createProduct(array $data, int $storeId): ?Product
    {
        $data['store_id'] = $storeId;

        $product = $this->productRepository->createProduct($data);

        if ($product && isset($data['images'])) {
            foreach ($data['images'] as $image) {
                $this->imageRepository->createImage(['related_id' => $product->id, 'related_type' => 'product', 'image_url' => $image]);
            }
        }

        if ($product && isset($data['variants'])) {
            foreach ($data['variants'] as $variant) {
                $variant['product_id'] = $product->id;
                $this->productVariantRepository->createVariant($variant);
            }
        }

        return $this->getProductById($product->id);
    }

    public function createDraft(array $data, int $storeId): ?Product
    {
        $data['store_id'] = $storeId;
        $data['status'] = 2;

        $product = $this->productRepository->createProduct($data);

        if ($product && isset($data['images'])) {
            foreach ($data['images'] as $image) {
                $this->imageRepository->createImage(['related_id' => $product->id, 'related_type' => 'product', 'image_url' => $image]);
            }
        }

        if ($product && isset($data['variants'])) {
            foreach ($data['variants'] as $variant) {
                $variant['product_id'] = $product->id;
                $this->productVariantRepository->createVariant($variant);
            }
        }

        return $this->getProductById($product->id);
    }

    public function updateProduct(int $id, array $data): ?Product
    {
        $product = $this->productRepository->updateProduct($data, $id);

        if (!$product) {
            return null;
        }

        if (isset($data['images'])) {
            $this->imageRepository->deleteImagesByRelatedId($id, 'product');
            foreach ($data['images'] as $image) {
                $this->imageRepository->createImage(['related_id' => $id, 'related_type' => 'product', 'image_url' => $image]);
            }
        }

        if (isset($data['variants'])) {
            $this->productVariantRepository->deleteVariantsByProductId($id);
            foreach ($data['variants'] as $variant) {
                $variant['product_id'] = $id;
                $this->productVariantRepository->createVariant($variant);
            }
        }

        return $this->getProductById($id);
    }

    public function saveDraft(int $id, array $data): ?Product
    {
        $data['draft_content'] = json_encode($data);
        
        $product = $this->productRepository->updateProduct($data, $id);

        if (!$product) {
            return null;
        }

        if (isset($data['images'])) {
            $this->imageRepository->deleteImagesByRelatedId($id, 'product');
            foreach ($data['images'] as $image) {
                $this->imageRepository->createImage(['related_id' => $id, 'related_type' => 'product', 'image_url' => $image]);
            }
        }

        if (isset($data['variants'])) {
            $this->productVariantRepository->deleteVariantsByProductId($id);
            foreach ($data['variants'] as $variant) {
                $variant['product_id'] = $id;
                $this->productVariantRepository->createVariant($variant);
            }
        }

        return $this->getProductById($id);
    }

    public function deleteProduct(int $id): bool
    {
        $this->imageRepository->deleteImagesByRelatedId($id, 'product');
        $this->productVariantRepository->deleteVariantsByProductId($id);
        return $this->productRepository->deleteProduct($id);
    }

    public function updateStatus(int $id, int $status): bool
    {
        return $this->productRepository->updateStatus($id, $status);
    }
}
