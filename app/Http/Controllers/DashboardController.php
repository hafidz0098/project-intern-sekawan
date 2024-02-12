<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index(){
        $total_order = Order::all()->count();
        $order_pending = Order::where('status', 'pending')->count();
        $order_approved = Order::where('status', 'approved')->count();
        return view('dashboard.index', [
            'view_total_order' => $total_order,
            'view_order_pending' => $order_pending,
            'view_order_approved' => $order_approved,
        ]);
    }
    
}
