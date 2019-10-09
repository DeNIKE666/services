<?php

namespace App\Models;

use App\Models\Service\Service;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Order extends Model implements Transformable
{
    use TransformableTrait;

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

    public function userSeller() {
        return $this->hasOne(User::class , 'id' , 'user_seller');
    }

    public function existsReview() {
        return $this->hasOne(Review::class , 'order_id');
    }

}
