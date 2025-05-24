@extends('layouts.master')

@section('title', 'Edit Product')

@section('content')
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" value="{{ $product->name }}" required>
        <label>Quantity:</label>
        <input type="number" name="quantity" value="{{ $product->quantity }}" min="0">
        <label>Price:</label>
        <input type="number" name="price" value="{{ $product->price }}" step="0.01" min="0">
        <label>Code:</label>
        <input type="text" name="code" value="{{ $product->code }}">
        <label>Image:</label>
        <input type="file" name="image">
        <label>Category:</label>
        <select name="category_id">
            <option value="">None</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        <label>Description:</label>
        <textarea name="description">{{ $product->description }}</textarea>
        <label>Promotion:</label>
        <select name="promotion_id" id="promotion_id">
            <option value="">None</option>
            @foreach ($promotions as $promotion)
                <option value="{{ $promotion->id }}" data-type="{{ $promotion->type }}" {{ $product->promotion_id == $promotion->id ? 'selected' : '' }}>{{ $promotion->name }} ({{ $promotion->type }})</option>
            @endforeach
        </select>
        <div id="promotion_value_field" style="display: {{ $product->promotion && in_array($product->promotion->type, ['percentage_discount', 'fixed_amount_discount']) ? 'block' : 'none' }};">
            <label>Promotion Value:</label>
            <input type="number" name="promotion_value" step="0.01" min="0" value="{{ $product->promotion ? $product->promotion->value : '' }}">
        </div>
        <div id="promotion_free_item_field" style="display: {{ $product->promotion && $product->promotion->type == 'buy_x_get_y_free' ? 'block' : 'none' }};">
            <label>Free Item:</label>
            <input type="text" name="promotion_free_item" value="{{ $product->promotion ? $product->promotion->free_item : '' }}">
        </div>
        <button type="submit">Update Product</button>
    </form>
    <a href="{{ route('products.index') }}">Back</a>
    <script>
        document.getElementById('promotion_id').addEventListener('change', function() {
            const type = this.options[this.selectedIndex].dataset.type;
            const valueField = document.getElementById('promotion_value_field');
            const freeItemField = document.getElementById('promotion_free_item_field');
            valueField.style.display = type === 'percentage_discount' || type === 'fixed_amount_discount' ? 'block' : 'none';
            freeItemField.style.display = type === 'buy_x_get_y_free' ? 'block' : 'none';
        });
    </script>
@endsection