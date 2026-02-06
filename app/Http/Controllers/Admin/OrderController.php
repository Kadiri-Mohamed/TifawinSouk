<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order){
        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, Order $order){
        $order->status = $request->status;
        $order->save();
        return redirect()->route('admin.orders.index')->with('success', 'Order status updated successfully');
    }

    public function destroy(Order $order){
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully');
    }

}
