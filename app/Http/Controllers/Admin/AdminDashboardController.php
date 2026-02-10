<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{

    public function getStatistics()
    {
        $productsNumber = Product::count();
        // $categoriesNumber = Category::count();
        $customersNumber = User::where('role', 'user')->count();
        $ordersNumber = Order::count();
        $totalRevenue = DB::table('order_items')->select(DB::raw('SUM(quantity * unit_price) as total'))->value('total');
        return ['productsNumber' => $productsNumber , 'customersNumber' => $customersNumber, 'ordersNumber' => $ordersNumber, 'totalRevenue' => $totalRevenue ?? 0];
    }

    public function getRecentActivities(){
        $lastProduct = Product::latest()->first();
        $lastOrders = Order::latest()->take(2)->get();
        $lastCustomer = User::where('role', 'user')->latest()->first();
        return ['lastProduct' => $lastProduct, 'lastOrders' => $lastOrders, 'lastCustomer' => $lastCustomer];
    }

    public function index()
    {
        $states = $this->getStatistics();
        $activities = $this->getRecentActivities();
        // dd($states);
        return view('dashboard', compact('states' , 'activities'));
    }
}
