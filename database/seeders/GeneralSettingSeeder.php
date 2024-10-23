<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralSetting::Create([
            'email'              =>'rodcem.com@gmail.com',
            'email_secoend'      =>'info@rodcem.com',
            'phone'              =>'01319594929',
            'phone_secoend'      =>'01817276857',
            'address'            =>'Treasure Islan (3rd Floor), 42-43, Siddeshwari Circular Road, Shantinagar, Dhaka-1217',
            'facebook'           =>'https://www.facebook.com/Rodcembd/',
            'instagram'          =>'#',
            'twitter'            =>'#',
            'youtube'            =>'#',
            'footer_description' =>'We are an online platform. We have been working with an online construction business for the last 3 years.',
        ]);
    }
}
