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
            Schema::table('events', function (Blueprint $table) {
                // Drop old columns if they exist
                $columnsToDrop = ['date', 'location'];
                foreach ($columnsToDrop as $column) {
                    if (Schema::hasColumn('events', $column)) {
                        $table->dropColumn($column);
                    }
                }
            });
            
            // Rename title to name using raw SQL (if title exists and name doesn't)
            if (Schema::hasColumn('events', 'title') && !Schema::hasColumn('events', 'name')) {
                \DB::statement('ALTER TABLE `events` CHANGE `title` `name` VARCHAR(255) NOT NULL');
            }
        }
        
        // Update tasks table
        if (Schema::hasTable('tasks')) {
            // Drop foreign key constraint if it exists
            try {
                \DB::statement('ALTER TABLE `tasks` DROP FOREIGN KEY `tasks_event_id_foreign`');
            } catch (\Exception $e) {
                // Foreign key might not exist or have different name, try alternative
                try {
                    \DB::statement('ALTER TABLE `tasks` DROP FOREIGN KEY `simpas_db/tasks_event_id_foreign`');
                } catch (\Exception $e2) {
                    // Ignore if foreign key doesn't exist
                }
            }
            
            Schema::table('tasks', function (Blueprint $table) {
                // Drop old columns if they exist
                $columnsToDrop = ['description', 'assigned_to', 'due_date'];
                foreach ($columnsToDrop as $column) {
                    if (Schema::hasColumn('tasks', $column)) {
                        $table->dropColumn($column);
                    }
                }
            });
            
            // Make event_id required (not nullable) and recreate foreign key with CASCADE
            if (Schema::hasColumn('tasks', 'event_id')) {
                \DB::statement('ALTER TABLE `tasks` MODIFY `event_id` BIGINT UNSIGNED NOT NULL');
                \DB::statement('ALTER TABLE `tasks` ADD CONSTRAINT `tasks_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE');
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Note: This rollback recreates the old structure
        // Update events table
        if (Schema::hasTable('events')) {
            Schema::table('events', function (Blueprint $table) {
                // Rename name back to title if name exists
                if (Schema::hasColumn('events', 'name') && !Schema::hasColumn('events', 'title')) {
                    $table->renameColumn('name', 'title');
                }
                
                // Re-add date column
                if (!Schema::hasColumn('events', 'date')) {
                    $table->date('date')->nullable();
                }
                
                // Re-add location column
                if (!Schema::hasColumn('events', 'location')) {
                    $table->string('location')->nullable();
                }
            });
        }
        
        // Update tasks table
        if (Schema::hasTable('tasks')) {
            Schema::table('tasks', function (Blueprint $table) {
                // Re-add description column
                if (!Schema::hasColumn('tasks', 'description')) {
                    $table->text('description')->nullable();
                }
                
                // Re-add assigned_to column
                if (!Schema::hasColumn('tasks', 'assigned_to')) {
                    $table->string('assigned_to')->nullable();
                }
                
                // Re-add due_date column
                if (!Schema::hasColumn('tasks', 'due_date')) {
                    $table->date('due_date')->nullable();
                }
                
                // Make event_id nullable again
                if (Schema::hasColumn('tasks', 'event_id')) {
                    $table->foreignId('event_id')->nullable()->change();
                }
            });
        }
    }
};
