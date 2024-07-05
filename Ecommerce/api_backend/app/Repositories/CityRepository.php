<?php

namespace App\Repositories;
use Illuminate\Support\Collection;
use App\Models\City;

interface CityRepository
{
    public function all(): Collection;
}
