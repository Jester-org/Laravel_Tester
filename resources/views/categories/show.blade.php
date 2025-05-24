@extends('layouts.master')

@section('title', 'Show Category')

@section('content')
    <h1>Category: {{ $category->name }}</h1>
    <p><strong>Description:</strong> {{ $category->description }}</p>
    <p><strong>Promotion:</strong>
        @if ($category->promotion)
            {{ $category->promotion->name }} ({{ $category->promotion->type }}: 
            @if ($category->promotion->type == 'buy_x_get_y_free')
                {{ $category->promotion->free_item }}
            @else
                {{ $category->promotion->value }}
            @endif)
        @else
            None
        @endif
    </p>
    <h2>Products</h2>
    <ul>
        @foreach ($category->products as $product)
            <li>{{ $product->name }} (Price: ${{ number_format($product->price, 2) }})</li>
        @endforeach
    </ul>
    <a href="{{ route('categories.index') }}">Back</a>
@endsection