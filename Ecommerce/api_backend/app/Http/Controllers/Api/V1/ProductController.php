<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Http\Resources\V1\ProductResourceStore;
use App\Http\Resources\V1\ProductResourceCustomer;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductStatusRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    use ApiResponser;

    public function __construct(protected readonly ProductService $productService)
    {
    }

    // Public function
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->get('per_page', 10);
            $products = $this->productService->getAllProducts($perPage);

            return $this->successResponse(ProductResourceStore::collection($products), 'Products retrieved successfully');
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }

    // Public function
    public function total(): JsonResponse
    {
        try {
            $total = $this->productService->getTotalProducts();

            return $this->successResponse($total, 'Products total retrieved successfully');
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }

    // Public function
    public function show($id): JsonResponse
    {
        try {
            $product = $this->productService->getProductById($id);

            if (!$product) {
                return $this->errorResponse('Product not found', 'NOT_FOUND', 404);
            }

            return $this->successResponse(new ProductResourceCustomer($product));
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }

    // Protected function
    public function indexShop(Request $request): JsonResponse
    {
        try {
            $perPage = $request->get('per_page', 10);
            $products = $this->productService->getAllProducts($perPage, Auth::user()->store_id);

            return $this->successResponse(ProductResourceStore::collection($products), 'Products retrieved successfully');
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }

    // Protected function
    public function totalShop(Request $request): JsonResponse
    {
        try {
            $total = $this->productService->getTotalProducts(Auth::user()->store_id);

            return $this->successResponse($total, 'Products total retrieved successfully');
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }

    // Public function
    public function showShop($id): JsonResponse
    {
        try {
            $product = $this->productService->getProductByIdAndStoreId($id, Auth::user()->store_id);

            if (!$product) {
                return $this->errorResponse('Product not found', 'NOT_FOUND', 404);
            }

            return $this->successResponse(new ProductResourceStore($product));
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }

    // Protected function
    public function store(ProductRequest $request): JsonResponse
    {
        try {
            $product = $this->productService->createProduct($request->validated(), Auth::user()->store_id);

            if (!$product) {
                return $this->errorResponse('Product not found', 'NOT_FOUND', 404);
            }

            return $this->successResponse(new ProductResourceStore($product), 'Product created successfully', 201);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }

    // Protected function
    public function createDraft(ProductRequest $request): JsonResponse
    {
        try {
            $product = $this->productService->createDraft($request->validated(), Auth::user()->store_id);

            if (!$product) {
                return $this->errorResponse('Product not found', 'NOT_FOUND', 404);
            }

            return $this->successResponse(new ProductResourceStore($product), 'Product created draft successfully', 201);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }

    // Protected function
    public function update(ProductRequest $request, $id): JsonResponse
    {
        try {
            $product = $this->productService->updateProduct($id, $request->validated());

            if (!$product) {
                return $this->errorResponse('Product not found', 'NOT_FOUND', 404);
            }

            return $this->successResponse(new ProductResourceStore($product), 'Product updated successfully');
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }

    // Protected function
    public function saveDraft(ProductRequest $request, $id): JsonResponse
    {
        try {
            $product = $this->productService->saveDraft($id, $request->validated());

            if (!$product) {
                return $this->errorResponse('Product not found', 'NOT_FOUND', 404);
            }

            return $this->successResponse(new ProductResourceStore($product), 'Product draft saved successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }

    // Protected function
    public function destroy($id): JsonResponse
    {
        try {
            $success = $this->productService->deleteProduct($id);

            if (!$success) {
                return $this->errorResponse('Product not found', 'NOT_FOUND', 404);
            }

            return $this->successResponse(null, 'Product deleted successfully');
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }

    // Protected function
    public function updateStatus(UpdateProductStatusRequest $request, $id): JsonResponse
    {
        try {
            $validated = $request->validated();
            $status = $validated['status'];
            $product = $this->productService->updateStatus($id, $status);
            
            if (!$product) {
                return $this->errorResponse('Product not found', 'NOT_FOUND', 404);
            }

            return $this->successResponse($product, 'Product status updated successfully');
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }
}
