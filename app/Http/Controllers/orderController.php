<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Exception;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index()
    {
        $orders = Order::with('table', 'customer', 'orderItems')->get();

        return view('order.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validation=$request->validate([
            'status' => 'required|in:pending,preparing,ready,served,completed,cancelled'
        ]);
        try {
            $order->update([
                'status' => $validation['status'],
            ]);
            return response()->json([
                'status' => true,
                'message' => 'status updated successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to update status',
            ], 500);
        }
    }
}
