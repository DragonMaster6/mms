<?php
/**
 * Defines methods and events based on if a Model has a created_by column
 */
namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait HasCreator {
  protected static function booted() {
    static::creating(function($model) {
      $model->user_id = Auth::id();
    });
  }

  public function creator() {
    return $this->belongsTo("App\Models\User");
  }
}

