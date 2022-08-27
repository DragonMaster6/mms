<?php
/**
 * An Implementation of the FinanceInterface
 */
namespace App\Services;

use App\Models\Transaction;
use App\Services\Interfaces\FinanceInterface;

class FinanceService implements FinanceInterface {
  /**
   * @inheritdoc
   */
  public function createTransaction(array $values): Transaction {
    return Transaction::create($values);
  }

}
