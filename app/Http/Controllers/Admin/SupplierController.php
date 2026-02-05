<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $supplier=Supplier::all();
       return view('supplier.index',compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required|numeric',
        'city' => 'nullable'
    ]);

    $data = $request->all();
    Supplier::create($data);
    return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    $supplier = Supplier::findOrFail($id);
    return view('suppliers.show', compact('supplier')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $supplier=Supplier::findOrFail($id);
        return view('suppliers.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
         $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required|numeric',
        'city' => 'nullable'
    ]);


    $supplier = Supplier::findOrFail($id);
    $supplier->update($request->all());
    return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('suppliers.index');
    }
}
