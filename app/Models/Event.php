<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    protected $fillable = [
        'title',
        'status',
        'date',
        'location',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    /**
     * Get all tasks for this event
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Get the count of tasks for this event
     */
    public function getTaskCountAttribute(): int
    {
        // Use already loaded relationship if available to avoid N+1 queries
        if ($this->relationLoaded('tasks')) {
            return $this->tasks->count();
        }
        
        return $this->tasks()->count();
    }
}
