<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ns_products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            // You can add more fields here as needed for your product
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ns_products');
    }
};

