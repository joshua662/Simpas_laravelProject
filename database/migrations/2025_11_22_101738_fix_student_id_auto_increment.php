<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Modify student_id to be auto-incrementing
        DB::statement('ALTER TABLE `students` MODIFY `student_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert student_id to not be auto-incrementing
        DB::statement('ALTER TABLE `students` MODIFY `student_id` BIGINT UNSIGNED NOT NULL');
    }
};
