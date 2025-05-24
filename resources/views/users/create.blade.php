@extends('layouts.master')

@section('title', 'Add User')

@section('content')
    <div class="container">
        <h3>Add User</h3>
        <form action="{{ url('/adduser') }}" method="POST" class="form-grid">
            @csrf

            <div class="row mb-3">
                <div class="col-md-1">
                    <label for="name" class="form-label">Name:</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="col-md-1">
                    <label for="email" class="form-label">Email:</label>
                </div>
                <div class="col-md-3">
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="col-md-1">
                    <label for="password" class="form-label">Password:</label>
                </div>
                <div class="col-md-3">
                    <input type="password" name="password" id="password" class="form-control">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection
