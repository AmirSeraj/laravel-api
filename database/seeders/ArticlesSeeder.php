<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        for ($i=0;$i<10;$i++){
            DB::table('articles')->insert([
                'user_id'=>$faker->numberBetween(1,5),
                'title'=>$faker->text,
                'body'=>$faker->paragraph(),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }
    }
}
