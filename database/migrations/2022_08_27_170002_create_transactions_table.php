<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')
              ->constrained()
              ->cascadeOnUpdate()
              ->cascadeOnDelete();
            $table->string('title')->comment('What this transaction represents');
            $table->unsignedInteger('value')->comment('Value is in cents');
            $table->dateTime('date')->comment('When the transaction transpired on Bank');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
