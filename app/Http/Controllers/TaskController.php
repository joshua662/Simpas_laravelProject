<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Event;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('event')->latest()->paginate(5);

        return view('tasks', compact('tasks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string',
            'assigned_to' => 'required|string|max:255',
            'due_date' => 'required|date',
        ]);

        // Set title from description (truncate if too long for title field)
        $validated['title'] = strlen($validated['description']) > 255 
            ? substr($validated['description'], 0, 252) . '...' 
            : $validated['description'];

        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'description' => 'required|string',
            'assigned_to' => 'required|string|max:255',
            'due_date' => 'required|date',
        ]);

        // Set title from description (truncate if too long for title field)
        $validated['title'] = strlen($validated['description']) > 255 
            ? substr($validated['description'], 0, 252) . '...' 
            : $validated['description'];

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        try {
            $taskDescription = $task->description;
            $task->delete();

            return redirect()->route('tasks.index')
                ->with('success', "Task '{$taskDescription}' has been deleted successfully.");
        } catch (\Exception $e) {
            return redirect()->route('tasks.index')
                ->with('error', 'Failed to delete task. Please try again.');
        }
    }
}
