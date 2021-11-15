<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery')->insert([
            'name' => 'Nova pochta'
        ]
        );

        DB::table('delivery')->insert([
            'name' => 'Ukr pochta'
        ]);

        DB::table('delivery')->insert([
            'name' => 'Meest'
        ]);

        DB::table('delivery')->insert([
            'name' => 'DHL'
        ]);
    }
}
