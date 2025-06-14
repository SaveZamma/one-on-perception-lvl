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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('imagePath');
            $table->foreignId('shop_id')->constrained('shops')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedInteger('quantity')->default(0);
            $table->float('price')->default(0);
            $table->char('currency', 3);
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
        Schema::dropIfExists('products');
    }
};
