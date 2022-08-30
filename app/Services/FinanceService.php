<?php
/**
 * An Implementation of the FinanceInterface
 */
namespace App\Services;

use App\Models\Ledger;
use App\Models\Section;
use App\Models\Transaction;
use App\Services\Interfaces\arary;
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
  public function createSection(Ledger $ledger, array $values): Section {
    return $ledger->sections()->create($values);
  }

  /**
   * @inheritdoc
   */
  public function createTransaction(Section $section, array $values): Transaction {
    return $section->transactions()->create($values);
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

  /**
   * @inheritdoc
   */
  public function updateSection(Section $section, array $values): void {
    try {
      $section->fill($values)->save();
    }
    catch(\Exception $e) {
      throw new \Exception("Unable to update Section ($section->id): $e->getMessage()");
    }
  }

  /**
   * @inheritdoc
   */
  public function updateTransaction(Transaction $transaction, array $values): void {
    try {
      $transaction->fill($values)->save();
    }
    catch (\Exception $e) {
      throw new \Exception("Unable to update Transaction($transaction->id): $e->getMessage()");
    }
  }
}
