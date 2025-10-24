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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lot_id');
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('telephone_number')->nullable();
            $table->decimal('total', 12, 2)->nullable();
            $table->decimal('amount_paid', 12, 2)->default(0);
            $table->string('payment_method');
            $table->enum('status', ['paid', 'unpaid', 'partial'])->default('unpaid');
            $table->string('checkout_id')->nullable();
            $table->string('checkout_url')->nullable();
            $table->timestamps();

            $table->foreign('lot_id')->references('id')->on('lots')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
