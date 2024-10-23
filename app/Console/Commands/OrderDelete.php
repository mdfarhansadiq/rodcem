<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;

class OrderDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Order Delete';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // info('task scheduling');
        // $orders = Order::where('status', 'generated')->get();
        // $orders = Order::where('status', '!=', 'payment_done')->orWhere('status', '!=', 'company_payment_receive')->orWhere('status', '!=', 'deliver')->orWhere('status', '!=', 'product_receive')->get();
        $orders = Order::where('status','generated')->orWhere('status', 'pending')->orWhere('status','cancel_by_admin')->orWhere('status','cancel_by_agent')->orWhere('status','approve_by_admin')->orWhere('status','approve_by_company')->orWhere('status','cancel_by_company')->orWhere('status','user_cancel')->orWhere('status','user_confirm')->get();
        if(count($orders) !=0)
        {
            info('task scheduling');
            foreach($orders as $order)
            {
                foreach($order->order_details as $details)
                {
                    $details->delete();
                }
    
                $order->order_location->delete();
    
                if($order->order_cancel)
                {
                    $order->order_cancel->delete();
                }
    
                if($order->client)
                {
                    $order->client->delete();
                }
    
                if($order->payment_slip)
                {
                    $order->payment_slip->delete();
                }

                $order->delete();
            }
        }
        return Command::SUCCESS;
    }
}
