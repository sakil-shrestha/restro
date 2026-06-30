<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index()
    {
        $orders=Order::with('table','customer','orderItems')->get();
       
        return view('order.index',compact('orders'));
    }
}
