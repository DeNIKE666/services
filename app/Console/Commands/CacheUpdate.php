<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Services;
use App\Models\User;
use Illuminate\Console\Command;

class CacheUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'cache update';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        cache()->deleteMultiple(['categories' , 'services' , 'users']);

        \Cache::put('categories' , Category::defaultOrder()->get()->toTree());
        \Cache::put('services' , Services::all());
        \Cache::put('users' , User::all());
    }
}
