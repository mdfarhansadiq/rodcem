<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\SuperAdmin;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DivisionSeeder::class,
            DistrictSeeder::class,
            UpazilaSeeder::class,
            UnionSeeder::class,
            CompanyCategorySeeder::class,
            CompanySeeder::class,
            AgentSeeder::class,
            ExpertCategorySeeder::class,
            EngineerSeeder::class,
            UserSeeder::class,
            ProductCategorySeeder::class,
            GeneralSettingSeeder::class,
            AboutUsSeeder::class,
            PrivacySeeder::class,
            OrderTimeSettingSeeder::class,
            SubscriptionTypeSeeder::class,
        ]);

        SuperAdmin::create([
            'name'         => 'Super Admin',
            'email'        => 'super@admin.com',
            'phone_number' => '01911111111',
            'password'     => bcrypt('12345678')
        ]);
    }
}
