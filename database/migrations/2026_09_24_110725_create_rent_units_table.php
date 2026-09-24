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
        Schema::create('rent_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade');
            $table->enum('rent_type', array_column(\App\Enums\RentType::cases(), 'value'));
            $table->string('tenant_phone')->nullable();
            $table->text('tenant_id_card_front')->nullable();
            $table->text('tenant_id_card_back')->nullable();
            $table->decimal('rent_amount', 10, 2);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->enum('payment_status', ['pending', 'paid', 'late'])->default('pending');
            $table->integer('number_of_adults')->default(0);
            $table->integer('number_of_children')->default(0);
            $table->double('total_amount', 10, 2);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_units');
    }
};
