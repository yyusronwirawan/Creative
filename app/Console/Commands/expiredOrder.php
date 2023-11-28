<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\Product_variant;
use App\Models\Product;
use App\Models\Order_billing_detail;
use App\Models\Bank;
use App\Helper\HelperFunction;
use Mail;

class expiredOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expired:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'change status to expired order';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->helperFunction = new HelperFunction();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $whereParams[] = ['last_billing_status', '=', 'waiting_for_payment'];
            $whereParams[] = ['expiry_date', '<=', date('Y-m-d H:i:s')];
            $order = Order::where($whereParams)->with(['order_details','order_billing_address'])->get();

            if(count($order)>0){
                foreach ($order as $list) {
                    $table = new Order_billing_detail;
                    $table->billing_status = 'expired';
                    $table->message = 'order expired';
                    $table->order_id = $list->id;
                    $table->save();

                    foreach ($list->order_details as $val) {
                        Product_variant::where([
                            'id' => $val->product_variant_id
                        ])->increment(
                            'stock', $val->product_quantity
                        );

                        Product::where([
                            'id' => $val->product_id
                        ])->increment(
                            'stock', $val->product_quantity
                        );
                    }

                    $data = array(
                        'order' => $list,
                        'email' => $list->order_billing_address->email,
                        'subject'=>'Branded Termurah - Order Expired',
                        'status'=>'order_expired',
                        'tracking_message'=>'Your order has been expired',
                        'bank'=>Bank::get(),
                    );

                    Mail::send('email.email_order_confirmation', $data , function($message)use($data)
                    {
                        $message->from(
                            'no-reply@brandedtermurah.com',
                            'Branded Termurah'
                        );
                        $message->to($data['email']);
                        $message->subject($data['subject']);
                    });    

                }
                
            }

    }
}
