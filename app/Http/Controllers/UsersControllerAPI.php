<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersControllerAPI extends Controller
{
    public function getUser()
    {
        return User::all();
    }

    public function addUser(Request $request)
    {
        return User::create([
            'name' => $request->txtname,
            'email' => $request->txtemail,
            'password' => bcrypt($request->txtpass),
        ]);
    }

    // PATCH for update
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->name = $request->txtname;
            $user->email = $request->txtemail;
            if ($request->filled('txtpass')) {
                $user->password = bcrypt($request->txtpass);
            }
            $user->save();
            return response()->json(['message' => 'Updated']);
        }
        return response()->json(['message' => 'User not found'], 404);
    }

    // DELETE for delete
    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['message' => 'Deleted']);
        }
        return response()->json(['message' => 'User not found'], 404);
    }
}
