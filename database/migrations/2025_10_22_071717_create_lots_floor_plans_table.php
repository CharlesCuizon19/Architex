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
        Schema::create('lots_floor_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lots_id');
            $table->string('floor_plan');
            $table->timestamps();

            $table->foreign('lots_id')->references('id')->on('lots')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lots_floor_plans');
    }
};
