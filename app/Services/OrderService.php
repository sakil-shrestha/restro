<?php
namespace App\Services;
class OrderService{
    public function UpdateStatus($status, $order)
    {
        return $order->update([
            'status'=>$status,
        ]);
    }

}
