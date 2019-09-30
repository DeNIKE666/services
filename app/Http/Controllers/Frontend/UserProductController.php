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

        $otherService = $serviceRepositoryEloquent->scopeQuery(function ($scope) use ($service) {
            return $scope->where('user_id' , [$service->user->id])->limit(3);
        })->get();

        if (auth()->user()->profile_type == 0) {
            $service->increment('views', 1);
        }

        return view('frontend.pages.show_sell')->with([
            'service' => $service,
            'other'  => $otherService->except($productId),
        ]);
    }
}
