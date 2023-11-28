<?php

namespace App\Observers;

use App\Models\Order_shipping_detail;
use App\Models\Order;

class Order_shipping_detail_observer
{
    /**
     * Handle the Order_shipping_detail "created" event.
     *
     * @param  \App\Order_shipping_detail  $orderShippingDetail
     * @return void
     */
    public function created(Order_shipping_detail $orderShippingDetail)
    {
        Order::where([
            'id' => $orderShippingDetail['order_id']
        ])->update([
            'last_shipping_status' => $orderShippingDetail['shipping_status']
        ]);
    }

    /**
     * Handle the Order_shipping_detail "updated" event.
     *
     * @param  \App\Order_shipping_detail  $orderShippingDetail
     * @return void
     */
    public function updated(Order_shipping_detail $orderShippingDetail)
    {
        //
    }

    /**
     * Handle the Order_shipping_detail "deleted" event.
     *
     * @param  \App\Order_shipping_detail  $orderShippingDetail
     * @return void
     */
    public function deleted(Order_shipping_detail $orderShippingDetail)
    {
        //
    }

    /**
     * Handle the Order_shipping_detail "restored" event.
     *
     * @param  \App\Order_shipping_detail  $orderShippingDetail
     * @return void
     */
    public function restored(Order_shipping_detail $orderShippingDetail)
    {
        //
    }

    /**
     * Handle the Order_shipping_detail "force deleted" event.
     *
     * @param  \App\Order_shipping_detail  $orderShippingDetail
     * @return void
     */
    public function forceDeleted(Order_shipping_detail $orderShippingDetail)
    {
        //
    }
}
