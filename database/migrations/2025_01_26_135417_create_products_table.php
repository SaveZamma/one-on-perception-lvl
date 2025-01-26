<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/* Created using the command `php artisan make:migration create_products_table`
 * To run the migration use `php artisan migrate`. Since this project is
 * connected to Supabase, when migrating, the new table will appear directly on
 * Supabase.
 * It is possible to rollback a migration with `php artisan migrate:rollback`.
 * The tables created with the migration will disappear from Supabase.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps(); // created_at updated_at
            $table->string('name');
            $table->string('description');
            $table->double('price');
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
