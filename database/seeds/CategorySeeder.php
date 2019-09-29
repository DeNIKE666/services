<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CategorySeeder extends Seeder
{
    protected $faker;

    public function __construct(Faker $faker)
    {
        $this->faker = $faker;
    }

    public function run()
    {
        factory(Category::class, 10)->create()->each(function ($category) {
            $category->children()->create([
                'title' => $this->faker->jobTitle,
                'image' => $this->faker->imageUrl(),
            ]);
        });
    }
}
