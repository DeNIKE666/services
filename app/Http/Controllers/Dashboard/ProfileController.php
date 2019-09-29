<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Repositories\UserRepositoryEloquent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    protected $user;

    public function __construct(UserRepositoryEloquent $user)
    {
        $this->user = $user;
    }

    public function index(Request $request) {

        if ($request->isMethod('post')) {

            $request->validate([
                'name' => ['required'],
                'email' => ['required'],
            ]);

           $avatar = $this->user->deleteAvatar()->updateAvatar();

            $request->user()->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'profile_type' => $request->input('profile_type'),
                'password' => $request->input('password') ? bcrypt($request->input('password')) : $request->user()->password,
                'avatar' => $avatar->avatar,
            ]);

            return redirect()->route('profile')->with('success' , 'Вы изменили информацию своего профиля');
        }

        return view('dashboard.profile.index');
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('dashboard');
    }
}
