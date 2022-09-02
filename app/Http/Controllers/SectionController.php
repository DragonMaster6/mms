<?php

namespace App\Http\Controllers;

use App\Models\Ledger;
use App\Models\Section;
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
    return Inertia::render('sections/create', [
      'ledger' => $ledger,
      'type_options' => [Section::TYPE_EXPENSE, Section::TYPE_INCOME],
    ]);
  }

  /**
   * Handles the request to create a section
   */
  public function store(Request $request, Ledger $ledger) {
    // Validate the form
    $request->validate([
      'title' => 'required',
      'budget' => 'required|numeric',
      'type' => 'required',
    ]);

    // Attach the new section to the ledger
    try {
      $this->finance_service->createSection($ledger, [
        'title' => $request->get('title'),
        'budget' => $request->get('budget'),
        'type' => $request->get('type'),
      ]);
    }
    catch (\Exception $e) {
      return back()->withErrors(['fatal' => $e->getMessage()]);
    }

    return redirect(route('ledgers.show', $ledger));
  }
}
