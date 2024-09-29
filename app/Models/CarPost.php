<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarPost extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'identify',
        'title',
        'price',
        'car_model_id',
        'transmission',
        'body_type',
        'fule_type',
        'current_color',
        'seat',
        'state',
        'current_mileage',
        'registration_date',
        'registration_type',
        'spare_key',
        'service_book',
        'principal_warranty',
        'principal_warranty_exp_date',
        'user_id',
    ];

    use HasFactory;

    public function user()
    {
        // return $this->belongsTo('App\Models\User', 'id', 'user_id');
        return $this->belongsTo('App\Models\User');
    }

    public function carModel()
    {
        // return $this->belongsTo('App\Models\CarModel', 'id', 'car_model_id');
        return $this->belongsTo('App\Models\CarModel');
    }

    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    public function setRegistrationDateAttribute($value) {
        if (!empty($value)) {
            $this->attributes['registration_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        } else {
            $this->attributes['registration_date'] = null;
        }
    }

    public function getRegistrationDateAttribute() {
        if (!empty($this->attributes['registration_date'])) {
            return Carbon::createFromFormat('Y-m-d', $this->attributes['registration_date'])->format('d/m/Y');
        }
        
    }

    // public function setPrincipalWarranty($value) {
    //     var_dump($value);exit;
    //     if (!empty($value)) {
    //         $this->attributes['principal_warranty'] = 1;
    //     } else {
    //         $this->attributes['principal_warranty'] = 0;
    //     }
    // }

    public function setPrincipalWarrantyExpDateAttribute($value) {
        if (!empty($value)) {
            $this->attributes['principal_warranty_exp_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        } else {
            $this->attributes['principal_warranty_exp_date'] = null;
        }
    }

    public function getPrincipalWarrantyExpDateAttribute() {
        if (!empty($this->attributes['principal_warranty_exp_date'])) {
            return Carbon::createFromFormat('Y-m-d', $this->attributes['principal_warranty_exp_date'])->format('d/m/Y');
        }
    }
}
