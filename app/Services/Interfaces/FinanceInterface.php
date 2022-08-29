<?php
/**
 * Defines all the methods that make up the finance service
 */
namespace App\Services\Interfaces;

use App\Models\Ledger;
use App\Models\Transaction;

interface FinanceInterface {
  /**
   * Creates a new ledger to hold sections of transactions
   *
   * @param array $values
   */
  public function createLedger(array $values): Ledger;

  /**
   * Deletes a ledger and all of it's sections and transactions
   *
   * @param Ledger $ledger
   * @return void
   */
  public function deleteLedger(Ledger $ledger): void;

  /**
   * Updates a ledger's values 
   *
   * @param Ledger $ledger
   * @param array $values
   * @return void
   */
  public function updateLedger(Ledger $ledger, array $values): void;
}
