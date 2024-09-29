<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;

class User extends Authenticatable
{
    use SoftDeletes;

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function carPosts()
    {
        return $this->hasMany('App\Models\CarPost');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function (User $user) {
            $user->carPosts()->delete();
        });
    }

    public function getCreatedAtAttribute() {
        if (!empty($this->attributes['created_at'])) {
            return Carbon::createFromFormat('Y-m-d H:m:s', $this->attributes['created_at'])->format('H:m:s d/m/Y');
        }
    }

    public function getUpdatedAtAttribute() {
        if (!empty($this->attributes['updated_at'])) {
            return Carbon::createFromFormat('Y-m-d H:m:s', $this->attributes['updated_at'])->format('H:m:s d/m/Y');
        }
    }
}
