<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Service\Service;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProductController extends Controller
{
    public function show($productId)
    {
        return view('frontend.pages.show_sell')->with([
            'service' => Service::findOrFail($productId),
        ]);
    }
}
