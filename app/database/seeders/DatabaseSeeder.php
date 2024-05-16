<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'full_name' => 'Mosses608',
            'username' => 'mosses608@gmail.com',
            'password' => '123456789',
        ]);
        User::create([
            'full_name' => 'Paschal Mbowe',
            'username' => 'paschalmbowe@gmail.com',
            'password' => '123456789',
        ]);
    }
}
