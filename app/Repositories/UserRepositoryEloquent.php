<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Monolog\Handler\IFTTTHandler;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\UserRepository;
use App\Models\User;
use App\Validators\UserValidator;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    protected $storage = 'public';

    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @return $this
     */

    public function deleteAvatar()
    {
        if (\request()->hasFile('avatar')) {
            Storage::disk($this->storage)->delete(\request()->user()->avatar);
        }

        return $this;
    }

    /**
     * @return $this
     */

    public function updateAvatar()
    {
        \request()->hasFile('avatar') ?
            $this->avatar = \request()->file('avatar')->store('avatars', 'public') :
            $this->avatar = \request()->user()->avatar;
        return $this;
    }
}
