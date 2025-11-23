<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->decimal('original_price', 12, 2)->nullable();
            $table->decimal('retail_price', 12, 2);
            $table->decimal('markup_rate', 8, 2)->nullable();
            $table->date('effective_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['product_id', 'effective_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pricings');
    }
};
