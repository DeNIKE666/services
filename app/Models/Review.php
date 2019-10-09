<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'seller_id',
        'user_id',
        'text',
        'answer',
    ];

    protected $dates = [
        'created_at' , 'updated-at',
    ];

    public function user() {
        return $this->hasOne(User::class , 'id' , 'user_id');
    }
}
