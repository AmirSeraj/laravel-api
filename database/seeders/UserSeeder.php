<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        //
        for ($i=0;$i<5;$i++){
            DB::table('users')->insert([
                'name'=>$faker->name,
                'email'=>$faker->unique()->safeEmail,
                'password'=>bcrypt('secret'),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }
    }
}
