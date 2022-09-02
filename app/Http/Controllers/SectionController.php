<?php

namespace App\Http\Controllers;

use App\Models\Ledger;
use App\Services\FinanceService;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SectionController extends Controller {
  private $finance_service;

  public function __construct() {
    $this->finance_service = new FinanceService();
  }
  /**
   * Handles the request to view the section creation form
   */
  public function create(Ledger $ledger) {
    return Inertia::render('sections/create', ['ledger' => $ledger]);
  }
}
