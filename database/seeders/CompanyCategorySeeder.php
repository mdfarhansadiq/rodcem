<?php

namespace Database\Seeders;

use App\Models\CompanyCategory;
use Illuminate\Database\Seeder;

class CompanyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyCategory::Create([
            'name'  => 'Rod',
            'slug'  => 'rod',
        ]);

        CompanyCategory::Create([
            'name'  => 'Cement',
            'slug'  => 'cement',
        ]);

        CompanyCategory::Create([
            'name'  => 'Electronics',
            'slug'  => 'electronics',
        ]);

        CompanyCategory::Create([
            'name'  => 'Electrical',
            'slug'  => 'electrical',
        ]);

        CompanyCategory::Create([
            'name'  => 'Paint',
            'slug'  => 'paint',
        ]);
    }
}
