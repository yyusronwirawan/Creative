<?php

namespace App\Exports;

use App\Models\Member;
use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;

class OrderExport implements FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $start_date;
    protected $end_date;

    public function setDuration(string $start_date, string $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        
        return $this;
    }

    public function array(): array
    {
        $orders = Order::with(['order_details', 'order_billing_address', 'order_shipping_address'])
            ->when($this->start_date, function ($query) {
                $query->whereDate('created_at', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                $query->whereDate('created_at', '<=', $this->end_date);
            })->get();

        // Order ID	Order Total	Order Subtotal	Order Discount	Coupon Code	Payment Gateway	Order Status	Order Date	Billing: Full Name	Billing: Phone Number	Billing: E-mail Address	Shipping: Country	CapitaStar Code	Order Items: Product Name	Order Items: Quantity	Order Items: Total

		$data = array((object) [
            'Order ID',
            'Invoice Number',
            'Order Total',
            'Order Subtotal',
            'Order Discount',
            'Coupon Code',
            'Order Status',
            'Order Date',
            'Billing: Full Name',
            'Billing: Phone Number',
            'Billing: E-mail Address',
            'Shipping',
            'Shipping Fee',
            'Order Items: Product Name',
            'Order Items: Quantity',
            'Order Items: Total',
        ]);

		$order_length = sizeof($orders);
		for ($i = 0; $i < $order_length; $i++) {
            $current_order = $orders[$i];

            $order_status = '';
            if ($current_order->last_billing_status == 'unpaid') {
                $order_status = 'Pending Payment';
            } else if ($current_order->last_shipping_status == 'failed') {
                $order_status = 'Failed';
            } else if ($current_order->last_shipping_status == 'returned') {
                $order_status = 'Returned';
            } else if ($current_order->last_shipping_status == 'delivering') {
                $order_status = 'On Delivery';
            } else if ($current_order->last_shipping_status == 'loading_goods') {
                $order_status = 'Loading Goods';
            } else if ($current_order->last_shipping_status == 'checkout') {
                $order_status = 'Checkout';
            } else if ($current_order->last_shipping_status == 'delivered') {
                $order_status = 'Completed';
            } else if ($current_order->last_shipping_status == 'order_confirmed') {
                $order_status = 'Order Confirmed';
            } else if ($current_order->last_shipping_status == 'partners_sorting_centre') {
                $order_status = 'Partners Sorting Centre';
            }

            $bill_status='';
            if ($current_order->last_billing_status == 'paid'){
                                               $bill_status= "Paid";
            }else if ($current_order->last_billing_status == 'failed'){
                                               $bill_status= "Failed";
            }else if ($current_order->last_billing_status == 'unpaid'){
                                               $bill_status= "Abandoned Cart";
            }else if ($current_order->last_billing_status == 'waiting_for_payment'){
                                               $bill_status= "Waiting for payment";
            }else if ($current_order->last_billing_status == 'cancel'){
                                               $bill_status= "Cancelled";
            }else if ($current_order->last_billing_status == 'expired'){
                                               $bill_status= "Expired";
             }else if ($current_order->last_billing_status == 'payment_confirmation'){
                                               $bill_status= "Payment Confirmation";
                                           }
            

            $order_product = '';
            $order_quantity = 0;
            $order_detail_length = sizeof($current_order->order_details);
            for ($j = 0; $j < $order_detail_length; $j++) {
                $current_order_detail = $current_order->order_details[$j];
                $order_product .= $current_order_detail->product_variant_name.', ';
                $order_quantity = $order_quantity + $current_order_detail->product_quantity;
            }

            // dd((float) number_format($current_order_detail->product_variant_price * $current_order_detail->product_quantity, 2, '.', ''));
                array_push($data, [
                    'Order ID' => $current_order->id,
                    'Invoice Number' => (string) $current_order->invoice_number,
                    'Order Total' => $current_order->total_price,
                    'Order Subtotal' => $current_order->sub_total,
                    'Order Discount' => $current_order->discount_price ? $current_order->discount_price : 0,
                    'Coupon Code' => $current_order->promo_code ? $current_order->promo_code : ''   ,
                    'Order Status' => $order_status,
                    'Order Date' => $current_order->created_at->format('d F Y H:i'),
                    'Billing: Full Name' => $current_order->order_billing_address->first_name . $current_order->order_billing_address->last_name,
                    'Billing: Phone Number' => $current_order->order_billing_address->phone_number,
                    'Billing: E-mail Address' => $current_order->order_billing_address->email,
                    'Shipping' => $current_order->order_shipping_address->province,
                    'Shipping Fee' => $current_order->shipping_fee,
                    'Order Items: Product Name' => substr($order_product, 0, -2),
                    'Order Items: Quantity' => $order_quantity,
                    'Order Items: Total' => (float) number_format($current_order->sub_total, 2, '.', ''),
                ]);
            
        }

        return $data;
    }

}
