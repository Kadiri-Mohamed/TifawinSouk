<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        $orderItems = OrderItem::paginate(10);
        return view('admin.orderItems.index', compact('orderItems'));
    }
    public function getOrderItems(Order $order)
    {
        $orderItems = $order->orderItems;
        return view('admin.orderItems.index', compact('orderItems'));
    }
}
