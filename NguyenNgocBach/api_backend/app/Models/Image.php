<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'related_id',
        'related_type',
        'image_url',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'related_id')->where('related_type', 'product');
    }
}
