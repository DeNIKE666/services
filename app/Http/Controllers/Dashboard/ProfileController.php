<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Profile;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class ProfileController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        return view('dashboard.profile.index');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */

    public function logout() {
        auth()->logout();
        return redirect()->route('dashboard');
    }

    /**
     * @param Profile $avatar
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Profile $profile) {

        $profile->updateUser();

        if ($profile->hasFile('avatar')) {
            $profile->updateAvatar();
        }

        return redirect()->route('profile')->with('success', 'Информация профиля обновлена');
    }
}
