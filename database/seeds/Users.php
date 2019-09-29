<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 10)->create();

        $users->first()->update([
            'login' => 'denike',
            'email' => 'wotdenike@gmail.com',
        ]);
    }
}
