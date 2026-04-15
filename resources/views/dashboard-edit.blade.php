<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">

            <form action="/dashboard-edit/{{ $rice->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Rice Name:</label>
                    <input type="text" name="name123" value="{{ $rice->name }}">
                </div>

                <div class="form-group">
                    <label>Rice Type:</label>
                    <input type="text" name="type123" value="{{ $rice->type }}">
                </div>

                <div class="form-group">
                    <label>Price:</label>
                    <input type="number" name="price123" value="{{ $rice->price }}">
                </div>

                <div class="form-group">
                    <label>Quantity:</label>
                    <input type="number" name="quantity123" value="{{ $rice->quantity }}">
                </div>

                <div class="form-group">
                    <label>Description:</label>
                    <textarea name="description123">{{ $rice->description }}</textarea>
                </div>

                <button type="submit" class="btn-submit">
                    Save Edit
                </button>
            </form>

        </div>
    </div>
</x-app-layout>