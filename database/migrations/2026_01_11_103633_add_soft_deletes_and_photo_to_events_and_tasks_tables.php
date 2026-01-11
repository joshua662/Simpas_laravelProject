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
        // Add soft deletes and photo to events table
        if (Schema::hasTable('events')) {
            Schema::table('events', function (Blueprint $table) {
                if (!Schema::hasColumn('events', 'deleted_at')) {
                    $table->softDeletes();
                }
                if (!Schema::hasColumn('events', 'photo')) {
                    $table->string('photo')->nullable()->after('location');
                }
            });
        }

        // Add soft deletes and photo to tasks table
        if (Schema::hasTable('tasks')) {
            Schema::table('tasks', function (Blueprint $table) {
                if (!Schema::hasColumn('tasks', 'deleted_at')) {
                    $table->softDeletes();
                }
                if (!Schema::hasColumn('tasks', 'photo')) {
                    $table->string('photo')->nullable()->after('due_date');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove soft deletes and photo from events table
        if (Schema::hasTable('events')) {
            Schema::table('events', function (Blueprint $table) {
                if (Schema::hasColumn('events', 'deleted_at')) {
                    $table->dropSoftDeletes();
                }
                if (Schema::hasColumn('events', 'photo')) {
                    $table->dropColumn('photo');
                }
            });
        }

        // Remove soft deletes and photo from tasks table
        if (Schema::hasTable('tasks')) {
            Schema::table('tasks', function (Blueprint $table) {
                if (Schema::hasColumn('tasks', 'deleted_at')) {
                    $table->dropSoftDeletes();
                }
                if (Schema::hasColumn('tasks', 'photo')) {
                    $table->dropColumn('photo');
                }
            });
        }
    }
};
