<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Service\Service;
use App\Policies\ServicePolicy;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('dashboard.*', function ($view) {
            $view->with([
                'categories' => Category::defaultOrder()->get()->toTree(),
                'user' => auth()->user(),
            ]);
        });

        Blade::directive('money', function ($money) {
            return "<?php echo number_format($money, 2); ?>";
        });
    }
}
