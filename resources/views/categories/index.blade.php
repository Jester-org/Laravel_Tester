@extends('layouts.master')

@section('title', 'Categories')

@section('content')
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}">Add Category</a>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Promotion</th>
            <th>Actions</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
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
                </td>
                <td>
                    <a href="{{ route('categories.show', $category->id) }}">View</a>
                    <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                    <a href="{{ route('categories.delete', $category->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection