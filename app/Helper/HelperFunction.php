<?php

namespace App\Helper;
use Mail;
use App\Models\Order;

class HelperFunction
{
    public function isJsonString($string)
    {
        if (json_decode($string) == null) {
            return false;
        } else {
            return true;
        }
    }

    public function getCurrentDate()
    {
        $now = new \DateTime("now", new \DateTimeZone('Asia/Jakarta'));
        $now = $now->format('Y-m-d H:i:s');

        return $now;
    }

    public function sendEmail ($data,$view) {
        Mail::send($view, $data , function($message)use($data)
        {
            $message->from(
                'no-reply@brandedtermurah.com',
                'Branded Termurah'
            );
            $message->to($data['email']);
            $message->subject($data['subject']);
        });    

        return true; 

    }

    public function invoiceNumberGenerator() //YYYYMMDDXXXX
    {
        try {
            $now = new \DateTime("now", new \DateTimeZone('Asia/Jakarta'));
            $date = $now->format('Ymd');
    
            $from = date($now->format('Y-m-d' . ' 00:00:00'));
            $to = date($now->format('Y-m-d' . ' 23:59:59'));
    
            $orderCount = Order::whereBetween('created_at', [$from, $to])->count();
            if ($orderCount < 10000) {
                $orderCount = (string) $orderCount + 1;
                while (strlen($orderCount) < 4) {
                    $orderCount = '0' . $orderCount;
                }
            }
            $invoiceNumber = (string) $date . $orderCount;

            // $slug = $invoiceNumber;
            // $checkSlug = Order::where(['invoice_number' => $slug])->first();
            // $i = 1;
            // $slug_change = $slug;
            // $while_check = 0;
            // //dd($checkSlug);exit;
            // if($checkSlug){
            //     do{
            //         if($checkSlug){
            //             $orderCount = Order::whereBetween('created_at', [$from, $to])->count();
            //             if ($orderCount < 10000) {
            //                 $orderCount = (string) $orderCount + 1;
            //                 while (strlen($orderCount) < 4) {
            //                     $orderCount = '0' . $orderCount;
            //                 }
            //             }
            //             $invoiceNumber = (string) $date . $orderCount;
            
            //             $slug_change = $invoiceNumber;
            //             $while_check = 0;
            //         }else{
            //             $while_check = 1;
            //         }
            //         $checkSlug = Order::where(['invoice_number' => $slug_change])->first();
                    
            //     }while($while_check == 0);
                
            //     $slug = $slug_change;
            // }

    
            if($orderCount > 500){
                $orderCount = $orderCount - 500;
            }
            $data['invoice_number'] = $invoiceNumber;
            $data['kode_unik'] = $orderCount;
            return $data;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
