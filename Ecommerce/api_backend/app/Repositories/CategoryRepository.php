<?php

namespace App\Repositories;
use Illuminate\Support\Collection;
use App\Models\Category;

interface CategoryRepository 
{
    public function all(): Collection;
}
