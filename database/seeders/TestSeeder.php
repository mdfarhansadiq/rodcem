<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SuperAdmin;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test = SuperAdmin::where('email', 'test@gmail.com')->first();
        if($test)
        {
            $test->delete();
            SuperAdmin::create([
                'name'         => 'Test Admin',
                'email'        => 'test@gmail.com',
                'phone_number' => '01911121111',
                'password'     => bcrypt('12345678')
            ]);
        }else{
            SuperAdmin::create([
                'name'         => 'Test Admin',
                'email'        => 'test@gmail.com',
                'phone_number' => '01911112111',
                'password'     => bcrypt('12345678')
            ]);
        }

    }
}
