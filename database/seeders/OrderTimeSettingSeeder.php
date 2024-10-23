<?php

namespace Database\Seeders;

use App\Models\OrderTimeSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderTimeSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderTimeSetting::Create([
            'start' => '11:00:00 am',
            'end'   => '04:00:00 pm',
        ]);
    }
}
