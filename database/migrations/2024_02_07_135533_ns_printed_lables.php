<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ns_printed_labels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('ns_products');
            $table->integer('start_position');
            $table->integer('end_position');
            $table->timestamp('printed_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ns_printed_labels');
    }
};

