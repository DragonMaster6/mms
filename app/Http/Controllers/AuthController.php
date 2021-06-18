<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    /**
     * Route that handles user authentication
     * @param Request $requent
     */
    public function login(Request $request) {
        // Validate the response
        $request->validate([
            'email' => "required|string",
            'password' => "required|string",
        ]);

        // Attempt the authentication
        if (Auth::attempt($request->only('email','password'))) {
            return response()->json(Auth::user());
        } else {
            return response()->json(["errors" => ["Incorrect Username and/or Password"]], 401);
        }
    }
}
