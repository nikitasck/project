<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('adress')->insert([
            'user_id' => 1,
            'country' => 'Ukraine',
            'city' => 'Dnipro',
            'street' => 'Slobozhanskyi avenue',
            'house_number' => 1
        ]);
    }
}
