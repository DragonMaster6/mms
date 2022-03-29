<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('transactions', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->foreignId('section_id')->constrained()->onDelete('cascade');
      $table->unsignedBigInteger('amount')->comment('Monetary stored in cents');
      $table->string('description');
      $table->dateTime('transaction_date');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('transactions');
  }
};
