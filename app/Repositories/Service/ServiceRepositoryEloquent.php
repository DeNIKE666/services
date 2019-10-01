<?php

namespace App\Repositories\Service;

use Illuminate\Container\Container as Application;
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

    public function prevDeleteFile($path)
    {
        if (Storage::disk('public')->exists($path))
        {
            Storage::disk('public')->delete($path);
        }

        return $this;
    }


    public function dropFiles()
    {
        Storage::disk('public')->delete([$this->service->image, $this->service->file]);
        return $this;
    }

    public function deleteService()
    {
        return $this->delete($this->service->id);
    }

}
