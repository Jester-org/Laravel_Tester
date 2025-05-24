@extends('layouts.master')

@section('title', 'User')

@section('content')
<div class="container mx-auto my-4 p-4 bg-white shadow-md rounded">
    <h1 class="text-3xl font-bold mb-4">User Table</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <a class="btn btn-primary mb-2.5" href="/adduser">Add New Users</a>
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="align-middle">{{$user -> id}}</td>
                    <td class="align-middle">{{$user -> name}}</td>
                    <td class="align-middle">{{$user -> email}}</td>
                    <td class="align-middle text-center">
                        <a href="/edituserform/{{ $user -> id}}" class="btn btn-primary btn-sm mr-2">Edit</a>
                        <a href="/deleteuser/{{ $user -> id }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$users -> links()}}
    </div>
</div>
@endsection
