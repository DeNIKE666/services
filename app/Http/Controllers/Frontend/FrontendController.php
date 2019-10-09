<?php

namespace App\Http\Controllers\Frontend;

use App\Criteria\ServicesFrontendLastCriteria;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Service\ServiceRepositoryEloquent;
use App\Repositories\UserRepositoryEloquent;
use Illuminate\Http\Request;

class FrontendController extends Controller {

    public function index(UserRepositoryEloquent $user, ServiceRepositoryEloquent $service)
    {
        return view('frontend.pages.index')->with([
            'categories' => Category::defaultOrder()->get()->toTree(),
            'lastDate' => $service->orderBy('created_at', 'desc')->first()->created_at->diffForHumans() ?? 'Нет данных',
            'services' => $service->pushCriteria(ServicesFrontendLastCriteria::class)->get(),
            'users' => $user->all(),
        ]);
    }

    public function info()
    {
        return view('frontend.pages.info');
    }
}
