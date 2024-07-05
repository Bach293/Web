<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserResource;
use App\Mail\ResetPasswordMail;
use App\Services\UserService;
use App\Services\StoreService;
use Illuminate\Http\JsonResponse;
use App\Traits\ApiResponser;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\CheckResetTokenRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    use ApiResponser;

    public function __construct(protected readonly UserService $userService, protected readonly StoreService $storeService)
    {
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $data['role'] = 1;

            $user = $this->userService->registerUser($data);

            if (!$user) {
                return $this->errorResponse('User registration failed', 'ERROR_CODE', 500);
            }

            return $this->successResponse(new UserResource($user), 'Register successful', 201);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }

    public function login(LoginRequest $request): JsonResponse
    {
        try {
            $user = $this->userService->loginUser($request->validated());
            if (!$user) {
                return $this->errorResponse('Invalid credentials', 'UNAUTHORIZED', 401);
            }

            $token = $user->createToken($user->name)->plainTextToken;
            $request->session()->regenerate();

            $data = [
                "user" => new UserResource($user),
                "token" => $token,
            ];

            return $this->successResponse($data, 'Login successful', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }

    public function logout(Request $request): JsonResponse
    {
        try {
            $user = $request->user();
            $user->currentAccessToken()->delete();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return $this->successResponse('Logout successful', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }

    public function forgotPassword(ForgotPasswordRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $token = $this->userService->createPasswordResetToken($data['email']);

            if (!$token) {
                return $this->errorResponse('User not found', 'NOT_FOUND', 404);
            }

            $frontendUrl = 'http://localhost:8080' . '/reset-password?token=' . $token;

            Log::info('Frontend URL: ' . $frontendUrl);
            Mail::to($data['email'])->send(new ResetPasswordMail($frontendUrl));

            return $this->successResponse('Reset link sent successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }

    public function resetPassword(ResetPasswordRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            $resetStatus = $this->userService->resetPassword($data);

            if (!$resetStatus) {
                return $this->errorResponse('Invalid token or email', 'ERROR_CODE', 500);
            }
            return $this->successResponse('Password reset successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }

    public function checkResetToken(CheckResetTokenRequest $request): JsonResponse
    {
        try {
            $isValid = $this->userService->checkPasswordResetToken($request->validated());

            if (!$isValid) {
                return $this->errorResponse('Invalid token', 'INVALID_TOKEN', 400);
            }

            return $this->successResponse('Token is valid', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'ERROR_CODE', 500);
        }
    }
}
