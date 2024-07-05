<?php

namespace App\Services;

use App\Repositories\DistrictRepository;
use Illuminate\Support\Collection;

class DistrictService
{
    protected $districtRepository;

    public function __construct(DistrictRepository $districtRepository)
    {
        $this->districtRepository = $districtRepository;
    }

    public function getAllDistrict(): Collection
    {
        return $this->districtRepository->all();
    }
}
