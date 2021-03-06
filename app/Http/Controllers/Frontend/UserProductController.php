<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Service\Service;

use App\Models\User;
use App\Repositories\Service\ServiceRepositoryEloquent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProductController extends Controller
{
    public function show(ServiceRepositoryEloquent $serviceRepositoryEloquent, $productId)
    {
        $service  = $serviceRepositoryEloquent->find($productId);

        $amount = $service->orderService->sum(function ($order) {
            return $order->service->amount;
        });

        if (auth()->user() && auth()->user()->profile_type == 0) :
            $service->increment('views', 1);
        endif;

        return view('frontend.pages.show_sell')->with([
            'service' => $service,
            'amount' => $amount,
        ]);
    }

}
