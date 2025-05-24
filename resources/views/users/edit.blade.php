@extends('layouts.master')

@section('title', 'Edit User')

@section('content')
    <div class="container">
        <h3>Edit User</h3>
        <form action="{{ url('/edituser', $user->id) }}" method="POST" class="form-grid">
            @csrf
            @method('PUT') <!-- Add this for update requests -->

            <div class="row mb-3">
                <div class="col-md-1">
                    <label for="name" class="form-label">Name:</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user -> name}}">
                </div>
                <div class="col-md-1">
                    <label for="email" class="form-label">Email:</label>
                </div>
                <div class="col-md-3">
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user -> email }}">
                </div>
                <div class="col-md-1">
                    <label for="password" class="form-label">Password:</label>
                </div>
                <div class="col-md-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="keep blank for no update">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
