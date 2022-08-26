<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    //////////////////////
    // Accessor Methods //
    //////////////////////
    /**
     * Converts the monetary value into dollars
     */
    protected function value(): Attribute {
      return Attribute::make(
        get: fn ($value) => $value/100,
        set: fn($value) => $value * 100
      );
    }
}
