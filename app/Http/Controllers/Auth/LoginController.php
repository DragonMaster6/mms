<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
  public function login(Request $request) {
    $request->validate([
      'username' => 'required',
      'secret' => 'required',
    ]);

    $credentials = [
      'email' => $request->get('username'),
      'password' => $request->get('secret'),
    ];
    // [$username, $password] = $request->only(['username', 'secret']);

    if (Auth::attempt($credentials)) {
      return redirect()->route('dashboard');
    } else {
      return back()->withErrors(['login' => 'Access Denied'])
        ->onlyInput('username');
    }
  }
}
