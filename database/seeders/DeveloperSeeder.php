<?php

namespace Database\Seeders;

use App\Models\SuperAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       SuperAdmin::Create([
            'name'         => 'Developer',
            'email'        => 'developer@gmaill.com',
            'phone_number' => '01879285037',
            'password'     => bcrypt('tanvir135')
       ]);
    }
}
