<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use App\Traits\ApiResponser;

class CategoryController extends Controller
{
    use ApiResponser;

    public function __construct(protected readonly CategoryService $categoryService)
    {
    }

    public function index(): JsonResponse
    {
        try {
            $categories = $this->categoryService->getAllCategories();

            return $this->successResponse(CategoryResource::collection($categories), 'Category retrieved successfully');
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }
}
