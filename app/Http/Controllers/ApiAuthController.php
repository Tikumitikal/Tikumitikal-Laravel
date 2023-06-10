<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Contracts\HasApiTokens;

class ApiAuthController extends Controller
{
    //register
    public function register(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|string|',
            'password' => 'required|string',
            'no_hp' => 'required',
        ]);
        $cekemail = User::where('email', $data['email'])->first();

        if ($cekemail) {
            return response()->json([
                'message' => 'Email sudah terdaftar',
            ], 400);
        } else {
            $idrole = Role::firstOrCreate(['nama' => 'user']);
            $user = User::create([
                'nama' => $data['nama'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'id_role' => $idrole->id,
                'no_hp' => $data['no_hp'],
            ]);
            return response()->json([
                'message' => "Berhasil Register",
                'user' => $user,
            ], 200);
        }
    }
    //login
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $data['email'])->first();
        if (!$user) {
            return response([
                'message' => 'incorrect email'
            ], 401);
        }
        if (!Hash::check($data['password'], $user->password)) {
            return response([
                'message' => 'incorrect password'
            ], 401);
        }
        $token = $user->createToken('apiToken')->plainTextToken;

        $res = [
            'message' => "login successfull",
            'user' => $user,
            'token' => $token
        ];

        return response($res, 200);
    }
    public function userlogin()
    {
        $user = request()->user();
        $res = [
            'message' => "success",
            'user' => $user,
        ];
        return response($res, 200);
    }
    //logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json('Logged Out');
    }
}
