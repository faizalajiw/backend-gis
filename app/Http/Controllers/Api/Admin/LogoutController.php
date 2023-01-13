<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //remove token
        $removeToken = $request->user()->tokens()->delete();

        //jika remove token berhasil
        if ($removeToken) {
            return response()->json([
                'success' => true,
                'message' => 'Logout Berhasil',
            ]);
        }
    }
}
