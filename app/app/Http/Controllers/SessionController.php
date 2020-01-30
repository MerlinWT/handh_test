<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | User session Controller
    |--------------------------------------------------------------------------
    */

    /**
     * Generate session token
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateToken(Request $request) {
        $login = $request->input('login');
        $password = $request->input('password');
        $token = '';

        if ($login == 'admin' && $password == 'root') {
            $timestamp = strval(time());
            $token = md5("{$login}{$password}{$timestamp}");
        }

        return response()->json([
            'token' => $token
        ]);
    }

}
