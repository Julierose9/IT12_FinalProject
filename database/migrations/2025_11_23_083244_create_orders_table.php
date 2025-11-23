<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // cashier/employee who processed the order; nullable if processed by non-employee user
            $table->foreignId('employee_id')->nullable()->constrained('employees')->nullOnDelete();

            $table->timestamp('order_datetime')->useCurrent();
            $table->enum('order_status', ['Pending','Completed','Cancelled'])->default('Pending');
            $table->decimal('sub_total', 12, 2)->default(0);
            $table->string('discount_type')->nullable(); // e.g., Senior, PWD, Promo
            $table->decimal('discount_rate', 8, 2)->nullable();
            $table->decimal('discount_amount', 12, 2)->nullable();
            $table->decimal('grand_total', 12, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
