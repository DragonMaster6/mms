<?php

namespace App\Models\Finance;

use App\Traits\HasCreator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
  use HasCreator, HasFactory;

  protected $guarded = [];
}
