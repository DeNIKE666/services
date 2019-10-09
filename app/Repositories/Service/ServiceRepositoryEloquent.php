<?php

namespace App\Repositories\Service;

use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;
use App\Models\Service\Service;

class ServiceRepositoryEloquent extends BaseRepository implements  CacheableInterface
{

    protected $cacheMinutes = 10;

    protected $cacheOnly = ['all'];

    protected $service;

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

    public function serviceFind(Service $service) {
        $this->service = $service;
        return $this;
    }

    public function dropFiles()
    {
        Storage::delete([$this->service->image, $this->service->file, $this->service->product]);
        return $this;
    }

    public function deleteService()
    {
        return $this->delete($this->service->id);
    }

}
