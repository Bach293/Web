<?php

namespace App\Repositories;

use App\Models\Image;

class ImageRepositoryEloquent implements ImageRepository
{
    public function createImage(array $data): Image
    {
        return Image::create($data);
    }

    public function updateImage(array $data, $id): bool
    {
        $image = Image::find($id);
        return $image ? $image->update($data) : false;
    }

    public function deleteImage($id): bool
    {
        $image = Image::find($id);
        return $image ? $image->delete() : false;
    }

    public function deleteImagesByRelatedId($relatedId, $relatedType): bool
    {
        return Image::where('related_id', $relatedId)->where('related_type', $relatedType)->delete();
    }
}
