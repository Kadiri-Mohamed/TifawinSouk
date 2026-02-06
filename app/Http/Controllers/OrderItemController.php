<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'unit_price' => 'required',
        ]);

        try {
            OrderItem::create($validatedData);
            return redirect()->back()->with('success', 'Order item created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error creating order item: ' . $e->getMessage());
        }
    }
    public function index()
    {
        $orderItems = OrderItem::paginate(10);
        return view('order_items.index', compact('orderItems'));
    }
    public function getOrderItems(Order $order)
    {
        $orderItems = $order->orderItems;
        return view('order_items.index', compact('orderItems'));
    }
}
