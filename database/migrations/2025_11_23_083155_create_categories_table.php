<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('CategoryName')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }

    public function run()
    {
    DB::table('categories')->insert([
        ['CategoryName' => 'Beauty', 'created_at' => now(), 'updated_at' => now()],
        ['CategoryName' => 'Accessories', 'created_at' => now(), 'updated_at' => now()],
        ['CategoryName' => 'School Supplies', 'created_at' => now(), 'updated_at' => now()],
        ['CategoryName' => 'Jewelry', 'created_at' => now(), 'updated_at' => now()],
        ['CategoryName' => 'Bags', 'created_at' => now(), 'updated_at' => now()],
        ['CategoryName' => 'RTW', 'created_at' => now(), 'updated_at' => now()],
    ]);
}
};
