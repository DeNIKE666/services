<?php

namespace App\Models;

use App\Models\Service\Service;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Contracts\Transformable;

use Prettus\Repository\Traits\TransformableTrait;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'name', 'login', 'profile_type' ,'email', 'avatar', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function avatar() {
        return $this->avatar !== null
            ? Storage::url($this->avatar) : asset('assets/frontend/img/noavatar.png');
    }

    public function services() {
        return $this->hasMany(Service::class , 'user_id');
    }

    public function summarySellAmount()
    {
        return collect($this->services()
            ->whereStatus(1)->pluck('amount'))->sum();
    }

    public function reviews() {
        return $this->hasMany(Review::class , 'seller_id' , 'id');
    }
}
