<?php

namespace Database\Seeders;

use Database\Seeders\Product\ProductCategorySeeder;
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
        $this->call([
            UserSeeder::class,
            ProductCategorySeeder::class
        ]);
        $this->call(CitiesTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(SubdistrictsTableSeeder::class);
    }
}
