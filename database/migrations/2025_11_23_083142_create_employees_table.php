<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('EmployeeFName');
            $table->string('EmployeeLName');
            $table->string('EmployeeMName')->nullable();
            $table->string('EmployeeContactNum')->nullable();
            $table->enum('EmployeeRole', ['Cashier','SalesPerson','InventoryManager','Owner'])->default('SalesPerson');
            $table->enum('EmployeeStatus', ['Active','Inactive'])->default('Active');
            $table->date('hire_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
