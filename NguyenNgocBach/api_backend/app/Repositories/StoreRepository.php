<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;
use App\Models\Store;

/**
 * Interface StoreRepository.
 *
 * @package namespace App\Repositories;
 */
interface StoreRepository extends RepositoryInterface
{
    public function createStore(array $data): ?Store;
    public function findStoreById($id): ?Store;
    public function updateStore(array $data, $id): ?Store;
}
