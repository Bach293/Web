<?php

namespace App\Services;

use App\Repositories\StoreRepository;
use App\Repositories\UserRepository;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class StoreService
{
    protected $storeRepository;
    protected $userRepository;

    public function __construct(StoreRepository $storeRepository, UserRepository $userRepository)
    {
        $this->storeRepository = $storeRepository;
        $this->userRepository = $userRepository;
    }

    public function createStore(array $data): int
    {
        $storeData = [
            'store_name' => $data['name'],
            'address' => $data['address'],
            'city_id' => $data['city_id'],
            'district_id' => $data['district_id'],
            'image_url' => $data['image_url'] ?? null,
        ];

        $store = $this->storeRepository->createStore($storeData);
        return $store ? $store->id : null;
    }

    public function getStoreById(int $id): ?Store
    {
        return $this->storeRepository->findStoreById($id);
    }

    public function updateStore(int $id, array $data): bool
    {
        $userData = [
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'gender' => $data['gender'],
        ];

        $storeData = [
            'store_name' => $data['store_name'],
            'address' => $data['address'],
            'city_id' => $data['city_id'],
            'district_id' => $data['district_id'],
            'image_url' => $data['image_url'],
        ];

        $userUpdated = $this->userRepository->updateUser(Auth::user()->id, $userData);
        $storeUpdated = $this->storeRepository->updateStore($storeData, $id);

        return $userUpdated && $storeUpdated;
    }
}
