<?php

namespace Database\Seeders;

use App\Models\Privacy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrivacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Privacy::Create([
            'privacy' => '<h1>Agent ship cancellation target reason.</h1><ul><li>If there is no shop or office.</li><li>If there is no computer and printer.</li><li>Placing or displaying products of any company other than Rodcem in the store.</li><li>If the minimum target is not met.</li><li>Failure to pay subscription fees.</li></ul><div><br></div><h1>What does it take to become an agent of Rodcem.com?</h1><div><br></div><ul><li>Must have own or rented shop or office of minimum 300 square feet in own area. Must have a shop rent agreement in the applicant\'s name. The tenancy of the shop should be at least two years.</li><li>The shop must be well equipped and there must be signboards on the shop.</li><li>No display of goods except construction materials shall be maintained in the shop.</li><li>Shop or office should have a high spread internet connection. Must have at least one computer and one printer.</li><li>&nbsp;Shop or office should be branded with the specified design by the company.</li><li>6 months subscription fee of Rodcem.com app is BDT 18000 to be paid in advance</li></ul><h1>Agent ship cancellation target reason.</h1><ul><li>If there is no shop or office.</li><li>If there is no computer and printer.</li><li>Placing or displaying products of any company other than Rodcem in the store.</li><li>If the minimum target is not met.</li><li>Failure to pay subscription fees.</li></ul><div><br><br></div>'
        ]);
    }
}
