<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Auth::user()->cart;
        $items = $cart ? $cart->items()->with('product')->get() : collect([]);

        return view('cart.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        try {
            $cart = Auth::user()->cart ?? Auth::user()->cart()->create();

            $product = Product::findOrFail($validated['product_id']);

            $cartItem = $cart->items()->where('product_id', $validated['product_id'])->first();

            if ($cartItem) {
                $cartItem->increment('quantity', $validated['quantity']);
            } else {
                $cart->items()->create([
                    'product_id' => $validated['product_id'],
                    'quantity' => $validated['quantity'],
                    'price' => $product->price,
                ]);
            }

            return back();
        } catch (\Exception $e) {
            return back()->with($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CartItem $cartItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CartItem $cartItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CartItem $cartItem)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        try {
            $cartItem->update(['quantity' => $validated['quantity']]);
            return back();
        } catch (\Exception $e) {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartItem $cartItem)
    {
        try {
            $cartItem->delete();
            return back();
        } catch (\Exception $e) {
            return back();
        }
    }
}
