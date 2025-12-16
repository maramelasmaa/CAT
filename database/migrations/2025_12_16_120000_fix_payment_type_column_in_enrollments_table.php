<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->string('payment_type', 20)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasTable('enrollments')) {
            return;
        }

        if (Schema::getConnection()->getDriverName() !== 'mysql') {
            return;
        }

        $invalidCount = DB::table('enrollments')
            ->whereNotIn('payment_type', ['on_campus', 'bank_transfer'])
            ->count();

        if ($invalidCount > 0) {
            return;
        }

        Schema::table('enrollments', function (Blueprint $table) {
            $table->enum('payment_type', ['on_campus', 'bank_transfer'])->change();
        });
    }
};
