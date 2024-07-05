<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'city_name',
    ];

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function stores()
    {
        return $this->hasMany(Store::class);
    }
}
