<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderItemController extends Controller
{
    /**
     * Store a newly created order and order items.
     */
    public function store()
{
    $user = auth()->user();
    $cart = $user->cart;

    if (!$cart || $cart->cartItems->isEmpty()) {
        return back()->with('error', 'Your cart is empty');
    }

    DB::beginTransaction();

    try {
        $order = Order::create([
            'user_id' => $user->id,
            'status' => 'pending',
            'is_paid' => false,
            'shipping_address' => $user->address ?? null,
        ]);

        foreach ($cart->cartItems as $item) {
            $order->orderItems()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'unit_price' => $item->price, 
            ]);
        }

        $cart->cartItems()->delete();

        DB::commit();

        return redirect()->route('orders.show', $order)
            ->with('success', 'Order placed successfully');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', $e->getMessage());
    }
}
}
