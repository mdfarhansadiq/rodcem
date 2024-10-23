<?php

namespace Database\Seeders;

use App\Models\ExpertCategory;
use Illuminate\Database\Seeder;

class ExpertCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExpertCategory::Create([
            'name'  => 'Civil Engineer',
            'slug'  => 'civil-engineer',
        ]);
        ExpertCategory::Create([
            'name'  => 'Architect Engineer',
            'slug'  => 'architect-engineer',
        ]);
        ExpertCategory::Create([
            'name'  => 'Electrical Engineer',
            'slug'  => 'electrical-engineer',
        ]);
    }
}
