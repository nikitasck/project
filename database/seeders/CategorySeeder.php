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
            'category' => 'Phones'
        ]);
        DB::table('categories')->insert([
            'category' => 'Laptops'
        ]);
        DB::table('categories')->insert([
            'category' => 'Headphones'
        ]);
        DB::table('categories')->insert([
            'category' => 'Sofas'
        ]);
        DB::table('categories')->insert([
            'category' => 'Tables'
        ]);
    }
}
