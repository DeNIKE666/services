<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\User;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository
{
    protected $user;

    public function model()
    {
        return User::class;
    }

    /**
     * @param User $user
     * @return $this
     */

    public function userFind(User $user) {
        $this->user = $user;
        return $this;
    }

    /**
     * @param Request $request
     * @return false|string
     */

    public function updateAvatar(Request $request)
    {
        $disk = Storage::disk($this->storage);

        if ($disk->exists($this->user->avatar)) {
            $disk->delete($this->user->avatar);
        }

        return $disk->putFile('avatars/' . $this->user->login , $request->file('avatar'));
    }
}
