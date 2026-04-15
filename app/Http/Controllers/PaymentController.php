<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;

class PaymentController extends Controller
{

    public function index()
    {
        $payments = Payment::with('order.rice')->get();
        $orders = Order::with('rice')->get();

        return view('dashboard-payment', [
            'payments' => $payments,
            'orders' => $orders
        ]);
    }

   public function store(Request $request)
{
    $request->validate([
        'order_id123' => 'required|exists:orders,id',
        'amount_paid123' => 'required|numeric|min:0',
        'payment_method123' => 'required|string',
    ]);

    $order = Order::findOrFail($request->order_id123);

    $totalPaid = Payment::where('order_id', $order->id)
    ->sum('amount_paid');

$newTotalPaid = $totalPaid + $request->amount_paid123;

$totalPrice = $order->total_price;

if ($newTotalPaid >= $totalPrice) {
    $status = 'Paid';
    $orderStatus = 'Paid';
} else {
    $status = 'Unpaid';
    $orderStatus = 'Unpaid';
}

    $order->status = $orderStatus;
    $order->save();

    Payment::create([
        'order_id' => $order->id,
        'amount_paid' => $request->amount_paid123,
        'payment_method' => $request->payment_method123,
        'status' => $status,
    ]);

    return redirect('/dashboard-payment')->with('success', 'Payment recorded!');
}

}