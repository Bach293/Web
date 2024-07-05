<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\DistrictResource;
use App\Services\DistrictService;
use Illuminate\Http\JsonResponse;
use App\Traits\ApiResponser;

class DistrictController extends Controller
{
    use ApiResponser;

    public function __construct(protected readonly DistrictService $districtService)
    {
    }

    public function index(): JsonResponse
    {
        try {
            $districts = $this->districtService->getAllDistrict();

            return $this->successResponse(DistrictResource::collection($districts), 'District retrieved successfully');
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }
}
