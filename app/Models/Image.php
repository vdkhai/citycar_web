<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    use HasFactory;

    protected $fillable = ['path'];

    public function imageable()
    {
        return $this->morphTo('App\Models\CarBrand');
    }

    public function url() {
        return Storage::url($this->path);
    }
}
