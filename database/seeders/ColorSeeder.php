<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            'color' => 'White'
        ]);
        DB::table('colors')->insert([
            'color' => 'Grey'
        ]);
        DB::table('colors')->insert([
            'color' => 'Black'
        ]);
    }
}
