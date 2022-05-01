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
Route::redirect('/', '/login');

Route::get('/login', function() {
  return Inertia::render('auth/login');
})->name('login-page');

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])
  ->name('auth.login');

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])
  ->name('auth.logout');

Route::get('/register', function() {
  return Inertia::render('auth/register');
})->name('register-page');

Route::post('/register', [App\Http\Controllers\Auth\LoginController::class, 'register'])
  ->name('auth.register');


// Authenticated user Routes
Route::middleware('auth')->group(function() {
  Route::get('/dashboard', function() { 
    return Inertia::render('dashboard');
  })->name('dashboard');

  // Ledger Routes 
  Route::controller(App\Http\Controllers\LedgerController::class)
    ->prefix('/ledger')
    ->name('ledger.')
    ->group(function() {
    Route::get('/', 'index')->name('page');
  });
});
