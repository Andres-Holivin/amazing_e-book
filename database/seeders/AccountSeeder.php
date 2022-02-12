<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id'=>'1',
            'gender_id'=>'1',
            "first_name"=>"hello",
            "middle_name"=>"hello",
            "last_name"=>"hello",
            "email"=>"hello@gmail.com",
            'password'=>Hash::make('123456789'),
            "display_picture_link"=>"",
            "delete_flag"=>"0",
            "modified_by"=>""
        ]);
        DB::table('users')->insert([
            'role_id'=>'2',
            'gender_id'=>'1',
            "first_name"=>"hello123",
            "middle_name"=>"hello123",
            "last_name"=>"hello123",
            "email"=>"hello123@gmail.com",
            'password'=>Hash::make('123456789'),
            "display_picture_link"=>"",
            "delete_flag"=>"0",
            "modified_by"=>""
        ]);
    }
}
