<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Inertia\Inertia;

class LedgerController extends Controller {

  /**
   * Handles the request to view a list of the current user's ledgers
   */
  public function index() {
    return Inertia::render('ledger/index');
  }
}
