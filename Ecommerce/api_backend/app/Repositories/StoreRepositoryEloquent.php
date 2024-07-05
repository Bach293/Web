<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\StoreRepository;
use App\Models\Store;
use Illuminate\Support\Collection;

/**
 * Class StoreRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class StoreRepositoryEloquent extends BaseRepository implements StoreRepository
{
    public function model()
    {
        return Store::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function createStore(array $data): ?Store
    {
        return $this->create($data);
    }

    public function findStoreById($id): ?Store
    {
        return $this->model->with(['city', 'district'])->find($id);
    }

    public function updateStore(array $data, $id): ?Store
    {
        $store = $this->find($id);
        return $store ? $store->update($data) : null;
    }
}
