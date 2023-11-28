<?php

namespace App\Exports;

use App\Models\Member;
use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrderShippingExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $month = null;

    public function __construct($month) {
       $this->check = $month;
    }

    public function view(): View
    {
        $orders = Order::with(['order_details', 'order_billing_address', 'order_shipping_address'])
            ->whereIn('id',$this->check)->get();
            //SSdd($orders);
        $data = array();
        $i=1;$j=1;
        foreach($orders as $list){
            
            
            if ($i % 2 == 0) {

                $data[$i-1][1] = $list;
                
            }else{
                $data[$i][0] = $list; 
                
            }
            $i++;
            
        }
        return view('exports.packaging', [
            'orders' => $data
        ]);
    }

   

}
