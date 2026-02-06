<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $carts=Cart::all();
        return view('client.carts.index',compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.carts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request-> validate([
         'user_id' => 'required|exists:users,id',
        
    ]);

      try {
            $data = $request->all();
            Cart::create($data);

            return redirect()->route('client.carts.index')
                ->with('success', 'Cart created successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'An error occurred while creating the cart.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
      return view('client.carts.show', compact('cart'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        return view('client.carts.edit', compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        $request->validate([
          'user_id' => 'required|exists:users,id',
        ]);


        try {
            $cart->update($request->all());
            return redirect()->route('client.carts.index')->with('success', 'Cart updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while updating the cart');
        }
    }
  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        try {
            $cart->delete();

            return redirect()->route('client.carts.index')
                ->with('success', 'Cart deleted successfully.');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'An error occurred while deleting the cart.');
        }
    }

}