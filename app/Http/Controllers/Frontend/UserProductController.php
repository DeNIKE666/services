<?php

namespace App\Http\Controllers\Frontend;

use App\Criteria\ViewCriteria;
use App\Models\Service\Service;
use App\Models\User;

use App\Repositories\Service\ServiceRepositoryEloquent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class UserProductController extends Controller
{
    public function show(ServiceRepositoryEloquent $serviceRepositoryEloquent ,$productId)
    {
        $service = $serviceRepositoryEloquent->find($productId);

        if (auth()->user() && auth()->user()->profile_type == 0) :
            $service->increment('views', 1);
        endif;

        return view('frontend.pages.show_sell')->with([
            'service' => $service,
            'other'   => $service->user->services()->limit(2)->get()->except($productId),
        ]);
    }
}
