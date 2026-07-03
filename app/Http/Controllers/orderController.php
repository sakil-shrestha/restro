<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Services\OrderService;
use Exception;
use Illuminate\Http\Request;

class orderController extends Controller
{

    protected $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    public function index()
    {
        $orders = Order::with('table', 'customer', 'orderItems')->get();

        return view('order.index', compact('orders'));
    }

    public function updateStatus(OrderRequest $request, Order $order)
    {
        $validation = $request->validate([
            'status' => 'required|in:pending,preparing,ready,served,completed,cancelled'
        ]);
        try {
            // $order->update([
            //     'status' => $validation['status'],
            // ]);
            $this->orderService->updateStatus($validation['status'],$order);
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
