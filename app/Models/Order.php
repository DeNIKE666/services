<?php

namespace App\Models;

use App\Models\Service\Service;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_seller',
        'user_buy',
        'service_id',
        'status',
    ];

    public function service() {
        return $this->hasOne(Service::class, 'id' , 'service_id');
    }

    public function userBuyed() {
        return $this->hasOne(User::class , 'id' , 'user_buy');
    }

}
