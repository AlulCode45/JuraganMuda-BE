<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login(Request $request)
    {
        $user = User::where('nisn', $request->nisn)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return response()->json([
                    'user' => $user,
                    'token' => 'Bearer ' . Auth::user()->createToken('juraganAPP')->plainTextToken
                ], 200);
            }
        } else {
            return  $this->errRes('Username / Password Mungkin ada yang salah', 401);
        }
    }
    function me()
    {
        return $this->successRes(data: Auth::user(), msg: "Ambil data sukses", code: 200);
    }
}
