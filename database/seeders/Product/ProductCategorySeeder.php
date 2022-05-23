<?php

namespace Database\Seeders\Product;

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product\ProductCategory::factory(5)
            ->has(\App\Models\Product\ProductCategory::factory(5), 'children')
            ->create();
    }
}
