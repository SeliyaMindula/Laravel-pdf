<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ns_product_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('ns_products')->onDelete('cascade');
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ns_product_attributes');
    }
};

