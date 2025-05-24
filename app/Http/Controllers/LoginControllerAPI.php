<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginControllerAPI extends Controller
{
    public function login(Request $request)
    {
        $usernameOrEmail = $request->input('txtname');
        $password = $request->input('txtpass');

        // Check by name OR email
        $user = DB::table('users')
            ->where('name', $usernameOrEmail)
            ->orWhere('email', $usernameOrEmail)
            ->first();

        if ($user && Hash::check($password, $user->password)) {
            return response()->json(['user' => $user], 200);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
}
