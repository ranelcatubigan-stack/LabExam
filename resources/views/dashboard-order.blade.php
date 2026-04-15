<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Order Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <button onclick="window.location.href='/dashboard-payment'">Go to Payment</button>
            <button onclick="window.location.href='/dashboard'">Go to Rice</button>
        <div class="container">

        

            {{-- CREATE ORDER --}}
            <form action="/dashboard-order123" method="POST">
                @csrf

                <label>Rice:</label>
                <select name="rice_id" required>
                    <option value="">Select Rice</option>

                    @foreach($rstore as $rice)
                        <option value="{{ $rice->id }}">
                            {{ $rice->name }} - ₱{{ $rice->price }}
                        </option>
                    @endforeach
                </select>

                <label>Quantity:</label>
                <input type="number" name="quantity" required>

                <button type="submit">Save Order</button>
            </form>

            <hr>

            {{-- ORDERS TABLE --}}
            <table border="1" cellpadding="8">
                <thead>
                    <tr>
                        <th>Rice</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->rice->name ?? 'N/A' }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>₱{{ $order->total_price }}</td>

                        <td>
                            {{-- FIXED EDIT ROUTE (IMPORTANT) --}}
                            <a href="/dashboard-order-edit/{{ $order->id }}">
                                Edit
                            </a>

                            {{-- DELETE ORDER --}}
                            <form action="/dashboard-order-delete/{{ $order->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>