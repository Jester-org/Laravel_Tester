@extends('layouts.master')

@section('title', 'Add Product')

@section('content')
    <h1>Add Product</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Quantity:</label>
        <input type="number" name="quantity" min="0">
        <label>Price:</label>
        <input type="number" name="price" step="0.01" min="0">
        <label>Code:</label>
        <input type="text" name="code">
        <label>Image:</label>
        <input type="file" name="image">
        <label>Category:</label>
        <select name="category_id">
            <option value="">None</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <label>Description:</label>
        <textarea name="description"></textarea>
        <label>Promotion:</label>
        <select name="promotion_id" id="promotion_id">
            <option value="">None</option>
            @foreach ($promotions as $promotion)
                <option value="{{ $promotion->id }}" data-type="{{ $promotion->type }}">{{ $promotion->name }} ({{ $promotion->type }})</option>
            @endforeach
        </select>
        <div id="promotion_value_field" style="display: none;">
            <label>Promotion Value:</label>
            <input type="number" name="promotion_value" step="0.01" min="0">
        </div>
        <div id="promotion_free_item_field" style="display: none;">
            <label>Free Item:</label>
            <input type="text" name="promotion_free_item">
        </div>
        <button type="submit">Add Product</button>
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