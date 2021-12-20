<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $data = [
        //     'name' => 'Suriya Rabalert',
        //     'email' => 'aymexe@gmail.com',
        //     'password' => Hash::make('123456'),
        //     'remember_token' => 'g2sgho44qw',
        // ];

        // User::create($data);


        User::factory(30)->create();
    }
}
