<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Kendaraan;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.order.index',[
            'orders' => Order::orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.order.create', [
            'drivers' => Driver::all(),
            'kendaraans' => Kendaraan::all(),
            'users' => User::where('role', 'approver')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kendaraan' => 'required',
            'driver' => 'required',
            'approver' => 'required',
        ]);

        $validatedData['status'] = 'pending';

        $order = Order::create($validatedData);

        return redirect('/dashboard/order')->with('success', 'Pemesanan berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('dashboard.order.edit',[             
            'order' => $order,
            'drivers' => Driver::all(),
            'kendaraans' => Kendaraan::all(),
            'users' => User::where('role', 'approver')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        Order::destroy($order->id);
        return redirect('/dashboard/order')->with('success', 'Order has been deleted!');
    }
}
