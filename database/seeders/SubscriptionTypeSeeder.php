<?php

namespace Database\Seeders;

use App\Models\SubscriptionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubscriptionType::Create([
            'name' => 'Free',
        ]);
        SubscriptionType::Create([
            'name' => 'One Month',
        ]);
        SubscriptionType::Create([
            'name' => 'Six Month',
        ]);
        SubscriptionType::Create([
            'name' => 'One Year',
        ]);
    }
}
