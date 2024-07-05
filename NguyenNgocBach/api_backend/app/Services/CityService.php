<?php

namespace App\Services;

use App\Repositories\CityRepository;
use Illuminate\Support\Collection;

class CityService
{
    protected $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function getAllCity(): Collection
    {
        return $this->cityRepository->all();
    }
}
