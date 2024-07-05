<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\StoreRepository;
use App\Repositories\PasswordResetRepository;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserService
{
    protected $userRepository;
    protected $storeRepository;
    protected $passwordResetRepository;

    public function __construct(UserRepository $userRepository, StoreRepository $storeRepository, PasswordResetRepository $passwordResetRepository)
    {
        $this->userRepository = $userRepository;
        $this->storeRepository = $storeRepository;
        $this->passwordResetRepository = $passwordResetRepository;
    }

    public function registerUser(array $data): ?User
    {
        return DB::transaction(function () use ($data) {
            $existingUser = $this->userRepository->findUserByEmail($data['email']);
            if ($existingUser) {
                throw new \Exception('User already exists');
            }
            $data['role'] == 1;
            
            $storeData = [
                'store_name' => $data['name'] . "'s Store",
                'address' => $data['address'] ?? null,
                'city_id' => $data['city_id'] ?? null,
                'district_id' => $data['district_id'] ?? null,
            ];

            $store = $this->storeRepository->createStore($storeData);

            if (!$store) {
                throw new \Exception('Failed to create store');
            }

            $data['store_id'] = $store->id;

            $data['password'] = bcrypt($data['password']);

            $user = $this->userRepository->createUser($data);

            if (!$user) {
                throw new \Exception('Failed to create user');
            }

            return $user;
        });
    }

    public function loginUser(array $data): ?User
    {
        return $this->userRepository->loginUser($data);
    }

    public function updateUser($id, array $data): bool
    {
        return $this->userRepository->updateUser($id, $data);
    }

    public function findUserByEmail(string $email): ?User
    {
        return $this->userRepository->findUserByEmail($email);
    }

    public function createPasswordResetToken(string $email): ?string
    {
        $user = $this->userRepository->findUserByEmail($email);
        if (!$user) {
            return null;
        }

        $token = Str::random(60);

        $passwordReset = $this->passwordResetRepository->findByEmail($email);

        if ($passwordReset) {
            $this->passwordResetRepository->updateToken($email, $token);
        } else {
            $this->passwordResetRepository->createToken($email, $token);
        }

        return $token;
    }

    public function checkPasswordResetToken(array $data): bool
    {
        $passwordReset = $this->passwordResetRepository->findByToken($data['token']);
        return $passwordReset !== null;
    }

    public function resetPassword(array $data): bool
    {
        $passwordReset = $this->passwordResetRepository->findByToken($data['token']);
        if (!$passwordReset) {
            return false;
        }

        $user = $this->userRepository->findUserByEmail($passwordReset->email);
        if (!$user) {
            return false;
        }

        $hashedPassword = Hash::make($data['password']);
        $user->password = $hashedPassword;
        $user->save();

        $this->passwordResetRepository->deleteByEmail($passwordReset->email);

        return true;
    }
}
