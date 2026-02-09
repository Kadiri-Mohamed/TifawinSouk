<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $products = Product::all();
          $categories = Category::all();
         return view('client.products.index', compact('products','categories'));
    }

 

 
    public function show(Product $product)
    {
      return view('client.products.show', compact('product'));
    }

   
}
