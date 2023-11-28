<?php

namespace App\Observers;

use App\Models\Order_billing_detail;
use App\Models\Order;

class Order_billing_detail_observer
{
    /**
     * Handle the Order_billing_detail "created" event.
     *
     * @param  \App\Order_billing_detail  $orderBillingDetail
     * @return void
     */
    public function created(Order_billing_detail $orderBillingDetail)
    {
        Order::where([
            'id' => $orderBillingDetail['order_id']
        ])->update([
            'last_billing_status' => $orderBillingDetail['billing_status']
        ]);
    }

    /**
     * Handle the Order_billing_detail "updated" event.
     *
     * @param  \App\Order_billing_detail  $orderBillingDetail
     * @return void
     */
    public function updated(Order_billing_detail $orderBillingDetail)
    {
        //
    }

    /**
     * Handle the Order_billing_detail "deleted" event.
     *
     * @param  \App\Order_billing_detail  $orderBillingDetail
     * @return void
     */
    public function deleted(Order_billing_detail $orderBillingDetail)
    {
        //
    }

    /**
     * Handle the Order_billing_detail "restored" event.
     *
     * @param  \App\Order_billing_detail  $orderBillingDetail
     * @return void
     */
    public function restored(Order_billing_detail $orderBillingDetail)
    {
        //
    }

    /**
     * Handle the Order_billing_detail "force deleted" event.
     *
     * @param  \App\Order_billing_detail  $orderBillingDetail
     * @return void
     */
    public function forceDeleted(Order_billing_detail $orderBillingDetail)
    {
        //
    }
}
