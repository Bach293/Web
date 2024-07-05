<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CityResource;
use App\Services\CityService;
use Illuminate\Http\JsonResponse;
use App\Traits\ApiResponser;

class CityController extends Controller
{
    use ApiResponser;

    public function __construct(protected readonly CityService $cityService)
    {
    }

    public function index(): JsonResponse
    {
        try {
            $cities = $this->cityService->getAllCity();

            return $this->successResponse(CityResource::collection($cities), 'City retrieved successfully');
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }
}
