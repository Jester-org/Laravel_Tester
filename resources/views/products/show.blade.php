@extends('layouts.master')

@section('title', 'Show Product')

@section('content')
    <h1>Product: {{ $product->name }}</h1>
    <p><strong>Code:</strong> {{ $product->code }}</p>
    <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
    <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
    <p><strong>Category:</strong> {{ $product->category ? $product->category->name : 'N/A' }}</p>
    <p><strong>Description:</strong> {{ $product->description }}</p>
    <p><strong>Promotion:</strong>
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
    </p>
    @if ($product->image)
        <p><strong>Image:</strong><br><img src="{{ asset('uploads/images/' . $product->image) }}" width="200"></p>
    @endif
    <a href="{{ route('products.index') }}">Back</a>
@endsection