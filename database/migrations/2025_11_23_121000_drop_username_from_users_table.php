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
        if (Schema::hasColumn('users', 'username')) {
            Schema::table('users', function (Blueprint $table) {
                // Drop unique index if exists (name may vary by DB)
                if (Schema::hasColumn('users', 'username')) {
                    // Use raw statement to drop index safely for common setups
                    try {
                        $table->dropUnique(['username']);
                    } catch (\Throwable $e) {
                        // ignore if index name differs or not present
                    }
                }

                $table->dropColumn('username');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->after('name');
        });
    }
};
