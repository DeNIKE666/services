<?php

use App\TagService;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(Users::class);
         $this->call(CategorySeeder::class);
         $this->call(ServiceSeeder::class);
    }
}
