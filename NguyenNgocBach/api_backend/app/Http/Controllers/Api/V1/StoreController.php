<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\StoreService;
use Illuminate\Http\Request;
use App\Http\Resources\V1\StoreResource;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreRequest;

class StoreController extends Controller
{
    use ApiResponser;

    protected $storeService;

    public function __construct(StoreService $storeService)
    {
        $this->storeService = $storeService;
    }

    public function show(): JsonResponse
    {
        try {
            $store = $this->storeService->getStoreById(Auth::user()->store_id);

            if (!$store) {
                return $this->errorResponse('Store not found', 'NOT_FOUND', 404);
            }

            return $this->successResponse(new StoreResource($store));
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }

    public function update(StoreRequest $request): JsonResponse
    {
        try {
            $store = $this->storeService->updateStore(Auth::user()->store_id, $request->validated());

            if (!$store) {
                return $this->errorResponse('Store not found', 'NOT_FOUND', 404);
            }

            return $this->successResponse(new StoreResource($store), 'Store updated successfully');
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }
}
