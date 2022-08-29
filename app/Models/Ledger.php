<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    use HasFactory;

    protected $guarded = [];

    //////////////////////////////
    // Relationship Definitions //
    //////////////////////////////
    /**
     * Points to all the sections within this ledger
     */
    public function sections() {
      return $this->hasMany(Section::class);
    }
}
