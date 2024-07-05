<?php

namespace App\Repositories;
use Illuminate\Support\Collection;
use App\Models\District;

interface DistrictRepository
{
    public function all(): Collection;
}
