<?php

namespace App\Exports;

use App\Models\Member;
use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;

class MemberExport implements FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */

    // public function __construct()
    // {
    //     $this->
    // }

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
        $members = Member::with(['billing_address', 'shipping_address'])->get();

		$data = array((object) [
            'Username',
            'Full Name',
            'Billing: First Name',
            'Billing: Last Name',
            'Billing: Country',
            'Billing: Phone Number',
            'Billing: E-mail Address',
            'Shipping: Country',
            'Total Spent',
            'Completed Orders',
            'Total Orders'
        ]);
		$member_length = sizeof($members);
		for ($i = 0; $i < $member_length; $i++) {
            $current_member = $members[$i];

            $where_params = [
                ['member_id', '=', $current_member->id],
                ['last_billing_status', '=', 'paid']
            ];

			$order_length = sizeof($current_member->order);
            $total_spent = Order::where($where_params)
		        // ->when($this->start_date, function ($query) {
                //     $query->whereDate('created_at', '>=', $this->start_date);
                // })
                // ->when($this->end_date, function ($query) {
                //     $query->whereDate('created_at', '<=', $this->end_date);
                // })
                ->when($this->start_date && $this->end_date, function ($query) {
                    $query->whereBetween('created_at', [$this->start_date, $this->end_date]);
                }, function ($query) {
                    if ($this->start_date) {
                        $query->whereDate('created_at', '>=', $this->start_date);
                    }

                    if ($this->end_date) {
                        $query->whereDate('created_at', '<=', $this->end_date);
                    }
                })
                ->sum('total_price');

            $where_params_completed_order = [
				'member_id' => $current_member->id,
				'last_shipping_status' => 'delivered',
				'last_billing_status' => 'paid',
            ];
			$completed_order = Order::where($where_params_completed_order)
                // ->when($this->start_date, function ($query) {
                //     $query->whereDate('created_at', '>=', $this->start_date);
                // })
                // ->when($this->end_date, function ($query) {
                //     $query->whereDate('created_at', '<=', $this->end_date);
                // })
                ->when($this->start_date && $this->end_date, function ($query){
                    $query->whereBetween('created_at', [$this->start_date, $this->end_date]);
                }, function ($query){
                    if ($this->start_date) {
                        $query->whereDate('created_at', '>=', $this->start_date);
                    }

                    if ($this->end_date) {
                        $query->whereDate('created_at', '<=', $this->end_date);
                    }
                })
                // ->whereBetween('created_at', [$this->start_date, $this->end_date])
                ->count();

            $where_params_total_order = [
				'member_id' => $current_member->id,
				'last_billing_status' => 'paid',
            ];
            $total_order = Order::where($where_params_total_order)
                // ->when($this->start_date, function ($query) {
                //     $query->whereDate('created_at', '>=', $this->start_date);
                // })
                // ->when($this->end_date, function ($query) {
                //     $query->whereDate('created_at', '<=', $this->end_date);
                // })
                ->when($this->start_date && $this->end_date, function ($query){
                    $query
                        ->whereBetween('created_at', [$this->start_date, $this->end_date]);
                }, function ($query){
                    if ($this->start_date) {
                        $query->whereDate('created_at', '>=', $this->start_date);
                    }

                    if ($this->end_date) {
                        $query->whereDate('created_at', '<=', $this->end_date);
                    }
                })
                ->count();

			array_push($data, [
				'Username' => $current_member->email,
				'Full Name' => $current_member->first_name . $current_member->last_name,
				'Billing: First Name' => $current_member->billing_address ? $current_member->billing_address->first_name : '',
				'Billing: Last Name' => $current_member->billing_address ? $current_member->billing_address->last_name : '',
				'Billing: Country' => $current_member->billing_address ? $current_member->billing_address->country: '',
				'Billing: Phone Number' => $current_member->billing_address ? $current_member->billing_address->phone_number: '',
				'Billing: E-mail Address' => $current_member->billing_address ? $current_member->billing_address->email: '',
				'Shipping: Country' => $current_member->shipping_address ? $current_member->shipping_address->country: '',
				'Total Spent' => $total_spent ?: 0,
				'Completed Orders' => $completed_order ?: 0,
				'Total Orders' => $total_order ?: 0,
			]);
        }

        return $data;
    }
}
