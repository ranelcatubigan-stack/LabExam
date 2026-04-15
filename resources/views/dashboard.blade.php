<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rice Management') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="container">
            <button onclick="window.location.href='/dashboard-order'">Go to Order</button>
            <button onclick="window.location.href='/dashboard-payment'">Go to Payment</button>

            <form action="/dashboard123" method="POST">
                @csrf

                 <div class="form-group">
                        <label for="name123">Rice Name:</label>
                        <input type="text" id="name123" name="name123">
                </div>

                <div class="form-group">
                        <label for="type123">Rice Type:</label>
                        <input type="text" id="type123" name="type123">
                </div>

                <div class="form-group">
                        <label for="price123">Price:</label>
                        <input type="number" id="price123" name="price123">
                </div>

                <div class="form-group">
                        <label for="quantity123">Quantity:</label>
                        <input type="number" id="quantity123" name="quantity123">
                </div>

                <div class="form-group">
                        <label for="description123">Description:</label>
                        <textarea id="description123" name="description123"></textarea>
                </div>


                <button type="submit" class="btn-submit" onclick="alert('Rice saved successfully!');">Save</button>
        </form>
            <hr>

            <table class="rice-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rstore as $rstores)
                    <tr>
                        <td>{{ $rstores->name }}</td>
                        <td>{{ $rstores->type }}</td>
                        <td>{{ $rstores->price }}</td>
                        <td>{{ $rstores->quantity }}</td>
                        <td>{{ $rstores->description }}</td>
                        <td>
                            <a href="/dashboard-edit/{{ $rstores->id }}">Edit</a>
                            <form action="/dashboard-delete/{{ $rstores->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="alert('Rice deleted successfully!');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

    
        </div>
    </div>
</x-app-layout>
