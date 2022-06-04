<?php

namespace Database\Seeders\Product;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        DB::table('product_categories')->insert(
            [
                'name' => 'Elektronik',
                'description' => $faker->text()
            ],
            [
                'name' => 'Fashion',
                'description' => $faker->text()
            ],
            [
                'name' => 'Otomotif',
                'description' => $faker->text()
            ],
            [
                'name' => 'Gaming',
                'description' => $faker->text()
            ],
            [
                'name' => 'Sport',
                'description' => $faker->text()
            ]
        );
    }
}
