<?php

namespace Database\Seeders;

use App\Models\Expert;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EngineerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Expert::create([
            'name'         => 'Eng Al Farhad',
            'slug'         => 'al-farhad',
            'phone_number' => '01879285047',
            'designation'  => '1',
            'email'        => 'alfarhad@gmail.com',
            'password'     =>  Hash::make(12345678),
        ]);
        Expert::create([
            'name'         => 'Eng Tanvir',
            'slug'         => 'tanvir',
            'phone_number' => '01879285454',
            'designation'  => '2',
            'email'        => 'tanvir@gmail.com',
            'password'     =>  Hash::make(12345678),
        ]);
        Expert::create([
            'name'         => 'Eng Jony',
            'slug'         => 'jony',
            'phone_number' => '01874555054',
            'designation'  => '3',
            'email'        => 'jony@gmail.com',
            'password'     =>  Hash::make(12345678),
        ]);
    }
}
