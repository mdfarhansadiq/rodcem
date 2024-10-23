<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<=100; $i++)
        {

           $oreder = Order::Create([
                'same_order_uid'    => 1254857+$i,
                'agent_id'          => 2,
                'company_id'        => 1 ,
                'customer_id'       => 1 ,
                'note'              => 'This is order note. This is order note. This is order note',
                'delivery_date'     =>  '2023-04-01',
                'status'            =>  'payment_done',
            ]);

            OrderDetail::Create([
                'order_id'      =>$oreder->id,
                'product_id'    => 1 ,
                'company_id'    => 1,
                'agent_id'      => 2,
                'quantity'      => 5,
                'price'         => 5000,
                'agent_price'   => 6000,
            ]);
        }
    }
}
