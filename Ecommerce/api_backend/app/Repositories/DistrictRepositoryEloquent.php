<?php

namespace App\Repositories;

use App\Models\District;
use Illuminate\Support\Collection;

class DistrictRepositoryEloquent implements DistrictRepository
{
    public function model()
    {
        return District::class;
    }
    public function all(): Collection
    {
        return $this->model()::all();
    }
}
