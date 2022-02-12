<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class EBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 0; $i < 12; $i++){
            DB::table('e_books')->insert([
                'title'=> $faker->name(),
                'author'=> $faker->name(),
                "description"=>$faker->name()
            ]);
        }
    }
}
