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

Route::controller(App\Http\Controllers\LedgerController::class)
  ->prefix('/ledgers')
  ->name('ledgers.')
  ->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/{ledger}', 'show')->name('show');

    // Sections
    Route::controller(App\Http\Controllers\SectionController::class)
      ->prefix('/{ledger}/sections')
      ->name('sections.')
      ->group(function() {
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
      });
  });

Route::redirect('/', '/ledgers');
