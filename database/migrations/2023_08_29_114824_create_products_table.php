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
            // $table->id();
            // $table->string('name');
            // $table->string('slug')->unique();
            // $table->string('sku');
            // $table->tinyText('smallDescription');
            // $table->text('longDescription');
            // $table->unsignedFloat('originalPrice');
            // $table->unsignedFloat('price');
            // $table->integer('quantity')->default(0);
            // $table->integer('discount')->default(NULL);
            // $table->foreignId('brand_id')->constrained()->nullable();
            // $table->unsignedFloat('weight')->nullable();
            // $table->unsignedFloat('note')->default(NULL);
            // $table->enum('trending', ['yes', 'no'])->default('no');
            // $table->enum('status', ['active', 'inactive'])->default('inactive');

            // $table->string('meta_title');
            // $table->string('meta_keyword');
            // $table->string('meta_description');
            // $table->foreignId('category_id')->constrained();
            // $table->timestamps();
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
