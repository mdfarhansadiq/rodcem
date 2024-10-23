<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = array(
            array('id' => '1','division_id' => '1','name' => 'Comilla'),
            array('id' => '2','division_id' => '1','name' => 'Feni'),
            array('id' => '3','division_id' => '1','name' => 'Brahmanbaria'),
            array('id' => '4','division_id' => '1','name' => 'Rangamati'),
            array('id' => '5','division_id' => '1','name' => 'Noakhali'),
            array('id' => '6','division_id' => '1','name' => 'Chandpur'),
            array('id' => '7','division_id' => '1','name' => 'Lakshmipur'),
            array('id' => '8','division_id' => '1','name' => 'Chattogram'),
            array('id' => '9','division_id' => '1','name' => 'Coxsbazar'),
            array('id' => '10','division_id' => '1','name' => 'Khagrachhari'),
            array('id' => '11','division_id' => '1','name' => 'Bandarban'),
            array('id' => '12','division_id' => '2','name' => 'Sirajganj'),
            array('id' => '13','division_id' => '2','name' => 'Pabna'),
            array('id' => '14','division_id' => '2','name' => 'Bogura'),
            array('id' => '15','division_id' => '2','name' => 'Rajshahi'),
            array('id' => '16','division_id' => '2','name' => 'Natore'),
            array('id' => '17','division_id' => '2','name' => 'Joypurhat'),
            array('id' => '18','division_id' => '2','name' => 'Chapainawabganj'),
            array('id' => '19','division_id' => '2','name' => 'Naogaon'),
            array('id' => '20','division_id' => '3','name' => 'Jashore'),
            array('id' => '21','division_id' => '3','name' => 'Satkhira'),
            array('id' => '22','division_id' => '3','name' => 'Meherpur'),
            array('id' => '23','division_id' => '3','name' => 'Narail'),
            array('id' => '24','division_id' => '3','name' => 'Chuadanga'),
            array('id' => '25','division_id' => '3','name' => 'Kushtia'),
            array('id' => '26','division_id' => '3','name' => 'Magura'),
            array('id' => '27','division_id' => '3','name' => 'Khulna'),
            array('id' => '28','division_id' => '3','name' => 'Bagerhat'),
            array('id' => '29','division_id' => '3','name' => 'Jhenaidah'),
            array('id' => '30','division_id' => '4','name' => 'Jhalakathi'),
            array('id' => '31','division_id' => '4','name' => 'Patuakhali'),
            array('id' => '32','division_id' => '4','name' => 'Pirojpur'),
            array('id' => '33','division_id' => '4','name' => 'Barisal'),
            array('id' => '34','division_id' => '4','name' => 'Bhola'),
            array('id' => '35','division_id' => '4','name' => 'Barguna'),
            array('id' => '36','division_id' => '5','name' => 'Sylhet'),
            array('id' => '37','division_id' => '5','name' => 'Moulvibazar'),
            array('id' => '38','division_id' => '5','name' => 'Habiganj'),
            array('id' => '39','division_id' => '5','name' => 'Sunamganj'),
            array('id' => '40','division_id' => '6','name' => 'Narsingdi'),
            array('id' => '41','division_id' => '6','name' => 'Gazipur'),
            array('id' => '42','division_id' => '6','name' => 'Shariatpur'),
            array('id' => '43','division_id' => '6','name' => 'Narayanganj'),
            array('id' => '44','division_id' => '6','name' => 'Tangail'),
            array('id' => '45','division_id' => '6','name' => 'Kishoreganj'),
            array('id' => '46','division_id' => '6','name' => 'Manikganj'),
            array('id' => '47','division_id' => '6','name' => 'Dhaka'),
            array('id' => '48','division_id' => '6','name' => 'Munshiganj'),
            array('id' => '49','division_id' => '6','name' => 'Rajbari'),
            array('id' => '50','division_id' => '6','name' => 'Madaripur'),
            array('id' => '51','division_id' => '6','name' => 'Gopalganj'),
            array('id' => '52','division_id' => '6','name' => 'Faridpur'),
            array('id' => '53','division_id' => '7','name' => 'Panchagarh'),
            array('id' => '54','division_id' => '7','name' => 'Dinajpur'),
            array('id' => '55','division_id' => '7','name' => 'Lalmonirhat'),
            array('id' => '56','division_id' => '7','name' => 'Nilphamari'),
            array('id' => '57','division_id' => '7','name' => 'Gaibandha'),
            array('id' => '58','division_id' => '7','name' => 'Thakurgaon'),
            array('id' => '59','division_id' => '7','name' => 'Rangpur'),
            array('id' => '60','division_id' => '7','name' => 'Kurigram'),
            array('id' => '61','division_id' => '8','name' => 'Sherpur'),
            array('id' => '62','division_id' => '8','name' => 'Mymensingh'),
            array('id' => '63','division_id' => '8','name' => 'Jamalpur'),
            array('id' => '64','division_id' => '8','name' => 'Netrokona')
        );

        DB::table('districts')->insert($districts);
    }
}
