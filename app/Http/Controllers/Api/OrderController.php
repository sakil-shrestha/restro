<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function order(Request $request)
    {

        $customer=Customer::Create([
            'name'=>$request->customer_name,
            'email'=>$request->customer_email,
            'address'=>$request->customer_address,
            'phone'=>$request->customer_contact,
        ]);

       $order=Order::Create([
        'table_id'=>$request->table_id,
        // 'customer_id'=>$request->input('customer_id',null),
        'customer_id'=>$customer->id,
        'waiter_id'=>$request->input('waiter_id',null),
        'notes'=>$request->notes,
       ]);

       foreach($request->items as $item)
       {
        OrderItem::create([
            'order_id'=>$order->id,
            'menu_item_id'=>$item['menu_item_id'],
            'quantity'=>$item['quantity'],
            'price'=>$item['price'],
        ]);
       }

       Log::info('order Created',$request->all());
        return response()->json([
            'status'=>true,
            'message'=>'Order Placed Successfully',
        ]);
    }
}
