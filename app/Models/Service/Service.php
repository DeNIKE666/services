<?php

namespace App\Models\Service;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Traits\TransformableTrait;
use Prettus\Repository\Contracts\Transformable;

/**
 * Class Service.
 *
 * @package namespace App\Models\Service;
 */
class Service extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'title',
        'body',
        'image',
        'amount',
        'user_id',
        'category_id',
        'expired_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    /**
     * @param $value
     * @return string
     */

    public function image() {
        return $this->image !== null ? 'storage/' . $this->image :
                       asset('assets/frontend/img/no_image.png');
    }

    public function limitBody($value) {
        return str_limit($this->body , $value , "....");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function user() {
        return $this->hasOne('App\Models\User' , 'id' , 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function categories() {
        return $this->hasOne('App\Models\Category' , 'id' , 'category_id');
    }

}
