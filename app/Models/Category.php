<?php

namespace App\Models;

use App\Models\Service\Service;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait;

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'icon',
        'image',
    ];

    /**
     * @param $value
     */

    public function countParent($id)
    {
        return \DB::table('categories')
            ->join('services', 'category_id', '=', 'categories.id')
            ->whereIn('category_id' , [$this->descendantsOf($id)->pluck('id')])
            ->count();
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value, '-');
    }


    /**\
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function services()
    {
        return $this->hasMany(Service::class , 'category_id');
    }

}
