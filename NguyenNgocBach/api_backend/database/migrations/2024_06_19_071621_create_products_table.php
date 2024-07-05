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
            $table->string('name', 50);
            $table->string('sku', 100)->nullable();
            $table->string('slug', 255)->nullable();
            $table->text('description')->nullable();
            $table->decimal('discount_amount', 8, 2)->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('status')->nullable();
            $table->text('draft_content')->nullable();
            $table->integer('stock_quantity')->nullable();
            $table->string('trademark', 100)->nullable();
            $table->string('warranty_period', 100)->nullable();
            $table->string('type', 50)->nullable();
            $table->string('ship_from', 100)->nullable();
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('cascade');
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
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
