<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'assigned_to',
        'due_date',
        'event_id',
    ];

    protected $casts = [
        'due_date' => 'date',
    ];

    /**
     * Get the event that owns this task
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get the count of active tasks (due date is today or in the future)
     * 
     * @return int
     */
    public static function getActiveTasksCount(): int
    {
        return self::where('due_date', '>=', now()->startOfDay())->count();
    }

    /**
     * Calculate the completion rate percentage
     * 
     * @param int|null $totalTasks Optional total tasks count to avoid recalculation
     * @return float
     */
    public static function getCompletionRate(?int $totalTasks = null): float
    {
        $total = $totalTasks ?? self::count();
        
        if ($total === 0) {
            return 0.0;
        }

        $completedTasks = self::where('due_date', '<', now()->startOfDay())->count();
        
        return round(($completedTasks / $total) * 100, 1);
    }

    /**
     * Get the count of overdue tasks (due date is in the past)
     * 
     * @param bool $unassignedOnly If true, only count tasks without an event
     * @return int
     */
    public static function getOverdueTasksCount(bool $unassignedOnly = false): int
    {
        $query = self::where('due_date', '<', now()->startOfDay());
        
        if ($unassignedOnly) {
            $query->whereNull('event_id');
        }
        
        return $query->count();
    }

    /**
     * Get all overdue tasks
     * 
     * @param bool $unassignedOnly If true, only get tasks without an event
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getOverdueTasks(bool $unassignedOnly = false)
    {
        $query = self::with('event')->where('due_date', '<', now()->startOfDay());
        
        if ($unassignedOnly) {
            $query->whereNull('event_id');
        }
        
        return $query->orderBy('due_date', 'asc')->get();
    }

    /**
     * Get all active tasks
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getActiveTasks()
    {
        return self::with('event')
            ->where('due_date', '>=', now()->startOfDay())
            ->orderBy('due_date', 'asc')
            ->get();
    }

    /**
     * Get the count of events for this task (should be 0 or 1)
     */
    public function getEventCountAttribute(): int
    {
        return $this->event_id ? 1 : 0;
    }
}
