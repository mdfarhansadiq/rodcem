<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUs::Create([
            'title'       =>'What We Are?',
            'description' =>'<div>We are an online platform. Our platform name is RodCem.Com Limited. We have been working with an online construction business for the last 3 years.<br><br>&nbsp;We help sell the company\'s products to consumers. We have been selling construction materials of any company in all parts of Bangladesh for the past 3 years.&nbsp;<br><br>We connect companies directly with buyers and provide services according to their needs. We have an ecosystem website and a mobile app. We have a very strong network all over Bangladesh.<br><br></div><h1>Our Goal&nbsp;</h1><div><br></div><div>Our goal is to solve the problems faced by construction people and make it easy for the consumer to build his home. We work on advertising campaigns for companies. Our app has a news segment where construction news updates can be found. We help construction product manufacturing companies to grow their business by branding them.</div>',
            'image'       =>'default.jpg',
        ]);
    }
}
