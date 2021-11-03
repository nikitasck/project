<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category' => 'Phone'
        ]);
        DB::table('categories')->insert([
            'category' => 'Laptop'
        ]);
        DB::table('categories')->insert([
            'category' => 'Headphones'
        ]);
        DB::table('categories')->insert([
            'category' => 'Sofa'
        ]);
        DB::table('categories')->insert([
            'category' => 'Table'
        ]);
    }
}
