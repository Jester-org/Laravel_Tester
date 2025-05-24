@extends('layouts.master')

@section('title', 'Products')

@section('content')
    <h1>Products</h1>
    <a href="{{ route('products.create') }}">Add Product</a>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Code</th>
            <th>Price</th>
            <th>Category</th>
            <th>Promotion</th>
            <th>Actions</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->code }}</td>
                <td>${{ number_format($product->price, 2) }}</td>
                <td>{{ $product->category ? $product->category->name : 'N/A' }}</td>
                <td>
                    @if ($product->promotion)
                        {{ $product->promotion->name }} ({{ $product->promotion->type }}: 
                        @if ($product->promotion->type == 'buy_x_get_y_free')
                            {{ $product->promotion->free_item }}
                        @else
                            {{ $product->promotion->value }}
                        @endif)
                    @else
                        None
                    @endif
                </td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}">View</a>
                    <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                    <a href="{{ route('products.delete', $product->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
