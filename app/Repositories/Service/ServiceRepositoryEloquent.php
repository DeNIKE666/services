<?php

namespace App\Repositories\Service;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;
use App\Models\Service\Service;

class ServiceRepositoryEloquent extends BaseRepository implements  CacheableInterface
{

    protected $cacheMinutes = 90;

    protected $cacheOnly = ['all'];

    use CacheableRepository;

    protected $fieldSearchable = [
        'title' => 'like',
        'amount' => '>',
    ];

    public function model()
    {
        return Service::class;
    }

    public function boot()
    {
        $this->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
    }

    public function deleteImage($image) {
        \Storage::disk('public')->delete($image);
        return $this;
    }

    public function deleteService($id)
    {
        return $this->delete($id);
    }

}
