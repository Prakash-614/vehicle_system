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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('vehicle_type')->constrained('vehicle_types')->onDelete('cascade');
            $table->string('vehicle_brand');
            $table->string('vehicle-number');
            $table->integer('vehicle_engine_cc');
            $table->string('vehicle_model');
            $table->string('vehicle-year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};