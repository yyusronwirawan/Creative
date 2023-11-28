<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\Product_variant;
use App\Models\Product;
use App\Models\Member_need_stock;
use App\Helper\HelperFunction;
use Mail;

class notifStock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notif:stock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email to member that stock is ready';

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
            $stock = Member_need_stock::get();

            if(count($stock)>0){
                foreach ($stock as $list) {
                    $check = Product_variant::where('id',$list->product_variant_id)->first();
                    if($check->stock > 0){
                        
                        $data = array(
                            'email' => $list->email,
                            'subject'=>'Branded Termurah - Product Back in Stock',
                            'status'=>'back_stock',
                        );

                        Mail::send('email.email_back_in_stock', $data , function($message)use($data)
                        {
                            $message->from(
                                'no-reply@brandedtermurah.com',
                                'Branded Termurah'
                            );
                            $message->to($data['email']);
                            $message->subject($data['subject']);
                        }); 
                        Member_need_stock::where('id',$list->id)->delete();
                    }

                }
                
            }

    }
}
