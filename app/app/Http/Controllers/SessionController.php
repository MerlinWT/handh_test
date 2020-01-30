<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'login' => 'required|max:10',
            'password' => 'required|max:15',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

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
