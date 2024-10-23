<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        ProductCategory::Create([
            'name'  => 'Rod',
            'slug'  => 'rod',
            'image' => 'default.png',
        ]);
        ProductCategory::Create([
            'name'  => 'Cement',
            'slug'  => 'cement',
            'image' => 'default.png',
        ]);
        ProductCategory::Create([
            'name'  => 'Pipe',
            'slug'  => 'pipe',
            'image' => 'default.png',
        ]);
        ProductCategory::Create([
            'name'  => 'Steel',
            'slug'  => 'steel',
            'image' => 'default.png',
        ]);
        ProductCategory::Create([
            'name'  => 'Brick',
            'slug'  => 'brick',
            'image' => 'default.png',
        ]);
    }
}
