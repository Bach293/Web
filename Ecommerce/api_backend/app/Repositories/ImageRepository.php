<?php

namespace App\Repositories;

use App\Models\Image;

interface ImageRepository
{
    public function createImage(array $data): Image;
    public function updateImage(array $data, $id): bool;
    public function deleteImage($id): bool;
    public function deleteImagesByRelatedId($relatedId, $relatedType): bool;
}
