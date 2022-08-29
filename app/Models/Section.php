<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model {
    use HasFactory;

    const TYPE_EXPENSE = 'expense';
    const TYPE_INCOME = 'income';

    protected $guarded = [];

    //////////////////////////////
    // Accessor/Mutator Methods //
    //////////////////////////////
    /**
     * Converts cents into dollars
     */
    protected function budget(): Attribute {
      return Attribute::make(
        get: fn ($value) => $value / 100,
        set: fn ($value) => $value * 100
      );
    }

    //////////////////////////////
    // Relationship Definitions //
    //////////////////////////////
    /**
     * Returns a list of all the transactions that reside in a Section
     */
    public function transactions() {
      return $this->hasMany(Transaction::class);
    }
}
