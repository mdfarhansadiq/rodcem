<?php

namespace Database\Seeders;

use App\Models\Agent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agent::create([
            'name'         => 'Agent',
            'slug'         => 'agent',
            'phone_number' => '01879285037',
            'email'        => 'agent@gmail.com',
            'password'     => Hash::make(12345678),
        ]);
    }
}
