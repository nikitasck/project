<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('storages')->insert([
            'storage_size' => '64'
        ]);
        DB::table('storages')->insert([
            'storage_size' => '128'
        ]);
        DB::table('storages')->insert([
            'storage_size' => '256'
        ]);
    }
}
