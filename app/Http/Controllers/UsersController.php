<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = DB::table("users")->paginate(3);
        
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        return redirect('/users');
    }

    public function show($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        if (!$user) {
            abort(404, 'User not found');
        }
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        if ($password == "") {
            DB::table('users')->where('id', $id)->update([
                'name' => $name,
                'email' => $email,
            ]);
        } else {
            DB::table('users')->where('id', $id)->update([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
            ]);
        }
        return redirect('/users');
    }

    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('/users');
    }
}