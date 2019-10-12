<?php

namespace App\Http\Controllers\Dashboard;

use App\Events\DialogChat;
use App\Models\Chat;
use App\Models\Dialog;
use App\Models\Message;
use App\Models\Service\Service;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function show() {
        $dialogs = User::find(2);

        dd($dialogs->dialogsUser);

    }
}
