<?php

namespace App\Repositories;

use App\Models\City;
use Illuminate\Support\Collection;

class CityRepositoryEloquent implements CityRepository
{
    public function model()
    {
        return City::class;
    }
    public function all(): Collection
    {
        return $this->model()::all();
    }
}
