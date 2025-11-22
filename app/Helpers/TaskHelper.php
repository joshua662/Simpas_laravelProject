<?php

namespace App\Helpers;

use App\Models\Task;

class TaskHelper
{
    /**
     * Get active tasks count
     * 
     * @return int
     */
    public static function activeTasksCount(): int
    {
        return Task::getActiveTasksCount();
    }

    /**
     * Get completion rate percentage
     * 
     * @return float
     */
    public static function completionRate(): float
    {
        return Task::getCompletionRate();
    }

    /**
     * Get overdue tasks count
     * 
     * @param bool $unassignedOnly
     * @return int
     */
    public static function overdueTasksCount(bool $unassignedOnly = false): int
    {
        return Task::getOverdueTasksCount($unassignedOnly);
    }

    /**
     * Get all active tasks
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function activeTasks()
    {
        return Task::getActiveTasks();
    }

    /**
     * Get all overdue tasks
     * 
     * @param bool $unassignedOnly
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function overdueTasks(bool $unassignedOnly = false)
    {
        return Task::getOverdueTasks($unassignedOnly);
    }
}

