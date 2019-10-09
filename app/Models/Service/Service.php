<?php

namespace App\Models\Service;

use App\Models\Order;
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
        'short',
        'body',
        'image',
        'amount',
        'user_id',
        'category_id',
        'file',
        'product',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'view', 'status',
    ];

    public function file() {
        return $this->file !== null ? 'storage/' . $this->file : null;
    }

    /**
     * @return string
     */

    public function image() {
        return $this->image !== null ? 'storage/' . $this->image : asset('assets/frontend/img/no_image.png');
    }

    /**
     * @param $value
     * @return string
     */

    public function limitShort($value) {
        return str_limit($this->short , $value , "....");
    }

    /**
     * @param $value
     * @return string
     */

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function services() {
        return $this->belongsToMany(Service::class);
    }

}
