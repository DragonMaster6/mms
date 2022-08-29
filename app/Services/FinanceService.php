<?php
/**
 * An Implementation of the FinanceInterface
 */
namespace App\Services;

use App\Models\Ledger;
use App\Models\Transaction;
use App\Services\Interfaces\FinanceInterface;

class FinanceService implements FinanceInterface {
  /**
   * @inheritdoc
   */
  public function createLedger(array $values): Ledger {
    return Ledger::create($values);
  }

  /**
   * @inheritdoc
   */
  public function deleteLedger(Ledger $ledger): void {
    try {
      $ledger->delete();
    }
    catch (\Exception $e) {
      throw new \Exception("Unable to delete ledger ($ledger->id): $e->getMessage()");
    }
  }

  /**
   * @inheritdoc
   */
  public function updateLedger(Ledger $ledger, array $values): void {
    try {
      $ledger->fill($values)->save();
    }
    catch(\Exception $e) {
      throw new \Exception("Unable to update Ledger($ledger->id): $e->getMessage()");
    }
  }
}
