<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name'         => 'BSRM',
            'slug'         => 'bsrm',
            'phone_number' => '01879285047',
            'category'     => '1',
            'email'        => 'bsrm@gmail.com',
            'password'     =>  Hash::make(12345678),
        ]);
        Company::create([
            'name'         => 'CSRM',
            'slug'         => 'csrm',
            'phone_number' => '01879285047',
            'category'     => '4',
            'email'        => 'csrm@gmail.com',
            'password'     =>  Hash::make(12345678),
        ]);
        Company::create([
            'name'         => 'KSRM',
            'slug'         => 'ksrm',
            'category'     => '2',
            'phone_number' => '01879285054',
            'email'        => 'ksrm@gmail.com',
            'password'     =>  Hash::make(12345678),
        ]);
        Company::create([
            'name'         => 'Premier',
            'slug'         => 'premier',
            'category'     => '3',
            'phone_number' => '01879455054',
            'email'        => 'premier@gmail.com',
            'password'     =>  Hash::make(12345678),
        ]);
    }
}
