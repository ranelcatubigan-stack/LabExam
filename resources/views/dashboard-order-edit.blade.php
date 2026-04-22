<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">


            {{-- UPDATE ORDER FORM --}}
            <form action="/dashboard-order-update/{{ $order->id }}" method="POST">
                @csrf
                @method('PUT')

                {{-- RICE SELECT --}}
                <label>Rice:</label>
                <select name="rice_id" required>
                    <option value="">Select Rice</option>

                    @foreach($rstore as $rice)
                        <option value="{{ $rice->id }}"
                            {{ $order->rice_id == $rice->id ? 'selected' : '' }}>
                            {{ $rice->name }} - ₱{{ $rice->price }}
                        </option>
                    @endforeach
                </select>

                {{-- QUANTITY --}}
                <label>Quantity:</label>
                <input type="number"
                       name="quantity"
                       value="{{ $order->quantity }}"
                       required>

                <button type="submit">
                    Update Order
                </button>
            </form>

        </div>
    </div>
</x-app-layout>