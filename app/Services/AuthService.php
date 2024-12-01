<?php

namespace App\Services;

use App\Models\User;

class AuthService
{
    /**
     * @param  array{name: string, email: string, password: string}  $data
     * @return array{user: User, token: string, token_type: string}
     */
    public function register(array $data): array
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        $token = auth('api')->login($user);

        return [
            'user' => $user,
            'token' => $token,
            'token_type' => 'Bearer',
        ];
    }

    /**
     * @param  array{email: string, password: string}  $credentials
     * @return array{user: User, token: string, token_type: string}|null
     */
    public function login(array $credentials): ?array
    {
        $token = auth('api')->attempt($credentials);

        if (! $token) {
            return null;
        }

        return [
            'user' => auth('api')->user(),
            'token' => $token,
            'token_type' => 'Bearer',
        ];
    }

    public function logout(): void
    {
        auth('api')->logout();
    }
}
