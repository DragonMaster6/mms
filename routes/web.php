<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', function() {
  return Inertia::render('auth/login');
})->name('login-page');

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])
  ->name('auth.login');

Route::get('/register', function() {
  return Inertia::render('auth/register');
})->name('register-page');


// Authenticated user Routes
Route::middleware('auth')->group(function() {
  Route::get('/dashboard', function() { 
    return Inertia::render('dashboard');
  })->name('dashboard');
});
