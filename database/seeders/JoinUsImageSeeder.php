<?php

namespace Database\Seeders;

use App\Models\JoinUsImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JoinUsImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       JoinUsImage::Create([
            "agent"   => 'agentRegister.jpg',
            "expert"  => 'expertRegister.jpg',
       ]);
    }
}
