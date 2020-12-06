<?php

namespace Database\Seeders;

use App\Models\Article;
use Faker\Generator;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        //
        Article::factory(10)->create();
    }
}
