<?php

namespace App\Http\Controllers;

use App\Models\Ledger;
use App\Services\FinanceService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LedgerController extends Controller {
  public $finance_service;

  public function __construct() {
    $this->finance_service = new FinanceService();
  }

  public function index() {
    return Inertia::render('ledgers/index', [
      'ledgers' => Ledger::get(),
    ]);
  }
}
