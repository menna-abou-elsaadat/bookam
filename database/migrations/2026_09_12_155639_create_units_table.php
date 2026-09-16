<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('code_number')->nullable();
            $table->text('address')->nullable();
            $table->text('city')->nullable();
            $table->text('country')->nullable();
            $table->text('area')->nullable();
            $table->enum('payment_status', ['fully_paid', 'installments']);
            $table->double('total_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
