<?php
/**
 * Defines all the methods that make up the finance service
 */
namespace App\Services\Interfaces;

use App\Models\Transaction;

interface FinanceInterface {
  /**
   * Creates a single Transaction instance
   *
   * @param array $values
   * @return Transaction
   */
  public function createTransaction(array $values): Transaction;

  /**
   * Modifies a transaction instance
   *
   * @param Transaction $transaction
   * @param array $values
   * @throws \Exception
   * @return void
   */
  public function updateTransaction(Transaction $transaction, $values): void;
  
}
