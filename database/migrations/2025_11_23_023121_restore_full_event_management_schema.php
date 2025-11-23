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
        // Update events table
        if (Schema::hasTable('events')) {
            // Rename name to title if needed
            if (Schema::hasColumn('events', 'name') && !Schema::hasColumn('events', 'title')) {
                \DB::statement('ALTER TABLE `events` CHANGE `name` `title` VARCHAR(255) NOT NULL');
            }
            
            Schema::table('events', function (Blueprint $table) {
                // Add date column if it doesn't exist (nullable first, then we can update)
                if (!Schema::hasColumn('events', 'date')) {
                    $table->date('date')->nullable()->after('status');
                }
                
                // Add location column if it doesn't exist
                if (!Schema::hasColumn('events', 'location')) {
                    $table->string('location')->nullable()->after('date');
                }
            });
        }
        
        // Update tasks table
        if (Schema::hasTable('tasks')) {
            // Drop existing foreign key if it exists
            try {
                \DB::statement('ALTER TABLE `tasks` DROP FOREIGN KEY `tasks_event_id_foreign`');
            } catch (\Exception $e) {
                try {
                    \DB::statement('ALTER TABLE `tasks` DROP FOREIGN KEY `simpas_db/tasks_event_id_foreign`');
                } catch (\Exception $e2) {
                    // Ignore if doesn't exist
                }
            }
            
            Schema::table('tasks', function (Blueprint $table) {
                // Add description column if it doesn't exist
                if (!Schema::hasColumn('tasks', 'description')) {
                    $table->text('description')->nullable()->after('id');
                }
                
                // Add assigned_to column if it doesn't exist
                if (!Schema::hasColumn('tasks', 'assigned_to')) {
                    $table->string('assigned_to')->nullable()->after('description');
                }
                
                // Add due_date column if it doesn't exist
                if (!Schema::hasColumn('tasks', 'due_date')) {
                    $table->date('due_date')->nullable()->after('assigned_to');
                }
            });
            
            // Rename title to description using raw SQL
            if (Schema::hasColumn('tasks', 'title') && !Schema::hasColumn('tasks', 'description')) {
                \DB::statement('ALTER TABLE `tasks` CHANGE `title` `description` TEXT NOT NULL');
            }
            
            // Make event_id nullable and update foreign key to SET NULL
            if (Schema::hasColumn('tasks', 'event_id')) {
                \DB::statement('ALTER TABLE `tasks` MODIFY `event_id` BIGINT UNSIGNED NULL');
                \DB::statement('ALTER TABLE `tasks` ADD CONSTRAINT `tasks_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE SET NULL');
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert events table
        if (Schema::hasTable('events')) {
            Schema::table('events', function (Blueprint $table) {
                if (Schema::hasColumn('events', 'date')) {
                    $table->dropColumn('date');
                }
                if (Schema::hasColumn('events', 'location')) {
                    $table->dropColumn('location');
                }
            });
            
            if (Schema::hasColumn('events', 'title') && !Schema::hasColumn('events', 'name')) {
                \DB::statement('ALTER TABLE `events` CHANGE `title` `name` VARCHAR(255) NOT NULL');
            }
        }
        
        // Revert tasks table
        if (Schema::hasTable('tasks')) {
            try {
                \DB::statement('ALTER TABLE `tasks` DROP FOREIGN KEY `tasks_event_id_foreign`');
            } catch (\Exception $e) {
                // Ignore
            }
            
            Schema::table('tasks', function (Blueprint $table) {
                if (Schema::hasColumn('tasks', 'description')) {
                    $table->dropColumn('description');
                }
                if (Schema::hasColumn('tasks', 'assigned_to')) {
                    $table->dropColumn('assigned_to');
                }
                if (Schema::hasColumn('tasks', 'due_date')) {
                    $table->dropColumn('due_date');
                }
            });
            
            if (Schema::hasColumn('tasks', 'description') && !Schema::hasColumn('tasks', 'title')) {
                \DB::statement('ALTER TABLE `tasks` CHANGE `description` `title` VARCHAR(255) NOT NULL');
            }
            
            if (Schema::hasColumn('tasks', 'event_id')) {
                \DB::statement('ALTER TABLE `tasks` MODIFY `event_id` BIGINT UNSIGNED NOT NULL');
                \DB::statement('ALTER TABLE `tasks` ADD CONSTRAINT `tasks_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE');
            }
        }
    }
};
