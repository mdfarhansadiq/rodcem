<?php

namespace Database\Seeders;

use App\Models\Headline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeadlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Headline::Create([
            'content' => 'Welcome To Rodcem! We Provide Complete Solution of construction. You will find everything in construction at Rodsam.'
        ]);
    }
}
