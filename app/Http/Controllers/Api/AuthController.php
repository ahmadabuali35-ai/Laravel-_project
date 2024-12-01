<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Http\Responses\ApiResponse;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $authService
    ) {}

    public function register(RegisterRequest $request): JsonResponse
    {
        $payload = $this->authService->register($request->validated());

        return ApiResponse::success(
            $this->authPayload($payload),
            'User registered successfully.',
            201
        );
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $payload = $this->authService->login($request->validated());

        if ($payload === null) {
            return ApiResponse::error('Invalid credentials.', null, 401);
        }

        return ApiResponse::success(
            $this->authPayload($payload),
            'Login successful.'
        );
    }

    public function logout(Request $request): JsonResponse
    {
        $this->authService->logout();

        return ApiResponse::success(null, 'Logged out successfully.');
    }

    public function me(Request $request): JsonResponse
    {
        return ApiResponse::success(
            new UserResource($request->user()),
            'Profile retrieved successfully.'
        );
    }

    /**
     * @param  array{user: \App\Models\User, token: string, token_type: string}  $payload
     * @return array<string, mixed>
     */
    private function authPayload(array $payload): array
    {
        return [
            'user' => new UserResource($payload['user']),
            'access_token' => $payload['token'],
            'token_type' => $payload['token_type'],
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
        ];
    }
}
