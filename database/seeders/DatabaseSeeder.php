<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        $this->call([
            AdminSeeder::class,
            RoleSeeder::class,
            CategorySeeder::class,
            ColorSeeder::class,
            StorageSeeder::class,
            SizeSeeder::class,
            AdressSeeder::class,
            DeliverySeeder::class
    ]);

    }
}
