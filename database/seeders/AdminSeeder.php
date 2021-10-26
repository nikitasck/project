<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'admin',
            'lastname' => 'admin',
            'email' => 'admin@test.com',
            'country' => 'admin',
            'city' => 'admin',
            'street' => 'admin',
            'house_number' => 'admin',
            'password' => bcrypt('123123123')
        ]);
    }
}
