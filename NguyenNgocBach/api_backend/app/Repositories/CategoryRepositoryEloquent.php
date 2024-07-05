<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryRepositoryEloquent implements CategoryRepository
{
    public function model()
    {
        return Category::class;
    }
    public function all(): Collection
    {
        return $this->model()::all();
    }
}
