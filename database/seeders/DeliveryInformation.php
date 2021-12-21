<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryInformation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_information')->insert([
            'user_id' => 1,
            'delivery_id' => 2,
            'adress_id' => 1,
            'postal_office' => 3
        ]);
    }
}
