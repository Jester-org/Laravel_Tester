@extends('layouts.master')

@section('title', 'Add Category')

@section('content')
    <h1>Add Category</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>
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
        <button type="submit">Add Category</button>
    </form>
    <a href="{{ route('categories.index') }}">Back</a>
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