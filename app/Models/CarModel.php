<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarModel extends Model
{
    protected $fillable = [
        'title',
        'car_brand_id',
    ];

    use SoftDeletes;

    use HasFactory;

    public function carBrand()
    {
        // return $this->belongsTo('App\Models\CarBrand', 'id', 'car_brand_id');
        return $this->belongsTo('App\Models\CarBrand');
    }

    public function carPosts()
    {
        return $this->hasMany('App\Models\CarPost');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function (CarModel $carModel) {
            $carModel->carPosts()->delete();
        });
    }
}
