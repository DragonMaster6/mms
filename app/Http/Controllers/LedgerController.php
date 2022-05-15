<?php

namespace App\Http\Controllers;

use App\Models\Finance\Ledger;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Inertia\Inertia;

class LedgerController extends Controller {

  /**
   * Handles the request to view a list of the current user's ledgers
   */
  public function index() {
    return Inertia::render('ledger/index', [
      'ledgers' => Ledger::whereUserId(Auth::id())->get(),
      // 'ledgers' => collect([Ledger::make([
      //   'name' => 'test',
      //   'user_id' => 1,
      // ])])
    ]);
  }

  /**
   * Handles the request to create a new ledger
   */
  public function store(Request $request) {
    $request->validate([
      'name' => 'required|string'
    ]);

    Ledger::create($request->all());

    // return Redirect::route('ledger.show');
    return redirect()->route('ledger.page', ['message' => 'Successfully created ledger']);
  }
}
