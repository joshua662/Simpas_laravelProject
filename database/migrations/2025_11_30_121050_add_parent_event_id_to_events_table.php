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
        Schema::table('events', function (Blueprint $table) {
            if (!Schema::hasColumn('events', 'parent_event_id')) {
                $table->foreignId('parent_event_id')->nullable()->after('location')->constrained('events')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            if (Schema::hasColumn('events', 'parent_event_id')) {
                $table->dropForeign(['parent_event_id']);
                $table->dropColumn('parent_event_id');
            }
        });
    }
};
