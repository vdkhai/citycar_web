<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarBrand extends Model
{
    protected $fillable = [
        'name',
        // 'logo',
    ];

    use SoftDeletes;

    use HasFactory;

    public function carModels()
    {
        return $this->hasMany('App\Models\CarModel');
    }

    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function (CarBrand $carBrand) {
            $carBrand->carModels()->delete();
            $carBrand->image()->delete();
        });
    }
}
