<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

  /**
   * Handles the requset to log out the current user 
   */
  public function logout() {
    Auth::logout();

    return redirect()->route('login-page');
  }
  /**
   * Handles the creation of a new user 
   */
  public function register(Request $request) {
    // Validation 
    $request->validate([
      'username' => 'required',
      'firstname' => 'required|string',
      'lastname' => 'required|string',
      'email' => 'required|unique:App\Models\User,email',
      'password' => 'required|min:5',
      'pass_confirm' => 'required|same:password',
    ]);

    // Create the new user 
    User::create([
      'name' => $request->get('username'),
      'first_name' => $request->get('firstname'),
      'last_name' => $request->get('lastname'),
      'email' => $request->get('email'),
      'password' => Hash::make($request->get('password')),
    ]);


    return redirect()->route('login-page')->with('message', 'Successfully created the account');
  }
}
