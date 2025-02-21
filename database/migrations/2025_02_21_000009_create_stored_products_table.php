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
        Schema::create('stored_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('storage_id')->constrained('storages')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedInteger('quantity')->default(0);
            $table->float('price')->default(0);
            $table->boolean('new')->default(true);
            $table->boolean('visible')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stored_products');
    }
};
