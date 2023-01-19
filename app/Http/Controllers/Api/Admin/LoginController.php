<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        //jika validation gagal
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //jika benar, maka cari user by email dari request "email"
        $user = User::where('email', $request->email)->first();

        //jika password dari user and password dari request tidak sama
        if (!$user || !Hash::check($request->password, $user->password)) {
            
            //return status code "400" dan login gagal
            return response()->json([
                'success' => false,
                'message' => 'Password yang anda masukkan salah.',
            ], 400);
        }

        //return user berhasil login dan create token
        return response()->json([
            'success' => true,
            'message' => 'Login Berhasil!',
            'user'    => $user,
            'token'   => $user->createToken('authToken')->accessToken    
        ], 200);
    }
}
