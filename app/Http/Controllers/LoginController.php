<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function authenticate(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = DB::table('users')->where('name', $username)->first();
        if ($user && Hash::check($password, $user->password)) {
            $request->session()->put([
                'ID' => $user->id,
                'NAME' => $user->name
            ]);
            return redirect('/');
        } else {
            $request->session()->flash("status", "Invalid Username or Password");
            return redirect('/login');
        }
    }
    
    public function userLogout (Request $request) {
        $request->session()->flush();
        return redirect('/login');
    }
}
