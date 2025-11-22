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
        return $this->tasks()->count();
    }
}
