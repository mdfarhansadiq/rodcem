<?php

namespace Database\Seeders;

use App\Models\ServiceImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceImage::Create([
            "company"  => 'co2.jpg',
            "agent"    => 'ag1.jpg',
            "expert"   => 'en1.jpg',
        ]);
    }
}
