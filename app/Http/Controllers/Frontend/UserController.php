<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function showSeller($login)
    {
        $user = User::whereLogin($login)->first();

        $reviews = $user->reviews()->orderBy('created_at' , 'desc')->paginate(5);

        return view('frontend.pages.user')->with([
            'user' => $user,
            'reviews' => $reviews,
        ]);
    }
}
