<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponser
{
    protected function successResponse($data, $message = 'Success', $code = 200): JsonResponse
    {
        return response()->json([
            'status' => 1,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function errorResponse($message, $errorCode, $code = 500): JsonResponse
    {
        return response()->json([
            'status' => 0,
            'message' => $message,
            'error_code' => $errorCode,
        ], $code);
    }
}
