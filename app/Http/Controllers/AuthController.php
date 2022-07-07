<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'registerPengguna', 'registerPelanggan']]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|min:5',
        ]);

        $credentials = $request->only('username', 'password');

        $token = Auth::attempt($credentials);

        if(!$token) {
            return response()->json([
                'success' => false,
                'status' => 'error',
                'msg' => 'Unauthorized'
            ], 401);
        }

        $user = Auth::user();

        return response()->json([
            'success' => true,
            'user' => $user,
            'token' => $token
        ], 200);
    }

    public function registerPengguna(Request $request)
    {
        $rules = [
            'no_pelanggan' => 'required|string|min:6|unique:users|exists:info_pelanggan,nomor_sl',
            'username' =>  'required|string',
            'password' => 'required|string|confirmed|min:6',
            'no_telp' => 'required|string|min:10|unique:users',
        ];

        $validator = Validator::make($request->all(), $rules, $messages = [
            'no_pelanggan.unique' => 'No. Pelanggan sudah terdaftar',
            'no_pelanggan.exists' => 'No. Pelanggan tidak ada',
            'no_telp.unique' => 'No. Telp sudah terdaftar'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'msg' => $validator->errors()
            ]);
        }

        $user = User::create([
            'no_pelanggan' => $request->no_pelanggan,
            'username' => $request->username,
            'password' => $request->password,
            'no_telp' => $request->no_telp,
            'status' => 0
        ]);

        $token = Auth::login($user);
        return response()->json([
            'success' => true,
            'msg' => 'User created successfully',
            'user' => $user,
            'token' => $token
        ], 200);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'success' => true,
            'msg' => 'Successfully logged out'
        ]);
    }
}
