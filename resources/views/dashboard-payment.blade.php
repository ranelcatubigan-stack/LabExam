<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Payment Management') }}
        </h2>
    </x-slot>

    <div class="py-12">

        {{-- NAV BUTTONS --}}
        <div style="margin-bottom: 20px;">
            <button onclick="window.location.href='/dashboard-order'">Go to Order</button>
            <button onclick="window.location.href='/dashboard'">Go to Rice</button>
        </div>

        <div class="container">

            {{-- PROCESS PAYMENT --}}
            <form action="/dashboard-payment123" method="POST">
    @csrf

    <label>Order:</label>
    <select name="order_id123" required>
        <option value="">Select Order</option>

        @foreach($orders as $order)
            <option value="{{ $order->id }}">
                Order #{{ $order->id }} -
                {{ optional($order->rice)->name ?? 'N/A' }} -
                ₱{{ $order->total_price }} -
                ({{ $order->status }})
            </option>
        @endforeach
    </select>

    <br><br>

    <label>Amount Paid:</label>
    <input type="number" name="amount_paid123" required>

    <br><br>

    <label>Payment Method:</label>
    <input type="text" name="payment_method123" required>

    <br><br>

    <button type="submit">Pay</button>
</form>

            <hr>

            {{-- PAYMENT TABLE --}}
            <table border="1" cellpadding="8">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Rice</th>
                        <th>Amount Paid</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Date</th>

                    </tr>
                </thead>

                <tbody>
                    @forelse($payments as $payment)
                        <tr>
                            <td>#{{ $payment->order_id }}</td>
                            <td>{{ optional($payment->order->rice)->name ?? 'N/A' }}</td>
                            <td>₱{{ $payment->amount_paid }}</td>
                            <td>{{ $payment->payment_method }}</td>
                            <td>{{ $payment->status }}</td>
                            <td>{{ $payment->created_at->format('Y-m-d') }}</td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No payments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>