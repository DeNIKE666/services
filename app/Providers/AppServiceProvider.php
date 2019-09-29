<?php

namespace App\Providers;


use App\Criteria\ServicesFrontendLastCriteria;
use App\Models\Category;
use App\Models\Services;

use App\Repositories\Service\ServiceRepositoryEloquent as Repository;

use Illuminate\Support\ServiceProvider;
use Prettus\Repository\Providers\RepositoryServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        $this->app->register(RepositoryServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Repository $repository)
    {
        \View::composer('frontend.pages.index', function ($view) use ($repository) {
            $view->with([
                'categories' => Category::defaultOrder()->get()->toTree(),
                'servicesCount' => $repository->count(),
                'lastDate' => $repository->orderBy('created_at' , 'desc')->first()->created_at->diffForHumans(),
                'services' => $repository->pushCriteria(ServicesFrontendLastCriteria::class)->get(),
            ]);
        });

        \View::composer('dashboard.*', function ($view) {
            $view->with([
                'categories' => Category::defaultOrder()->get()->toTree(),
                'user' => auth()->user(),
            ]);
        });

    }
}
