<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rice;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('rice')->get();
        $rstore = Rice::all();

        return view('dashboard-order', compact('orders', 'rstore'));
    }

    public function store(Request $request)
    {
        $rice = Rice::findOrFail($request->rice_id);

        $total = $rice->price * $request->quantity;

        Order::create([
            'rice_id' => $rice->id,
            'quantity' => $request->quantity,
            'total_price' => $total,
        ]);

        return redirect('/dashboard-order');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $rstore = Rice::all();

        return view('dashboard-order-edit', compact('order', 'rstore'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $rice = Rice::findOrFail($request->rice_id);

        $total = $rice->price * $request->quantity;

        $order->update([
            'rice_id' => $rice->id,
            'quantity' => $request->quantity,
            'total_price' => $total,
            
        ]);

        return redirect('/dashboard-order');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect('/dashboard-order');
    }
}