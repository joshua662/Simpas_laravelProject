<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Event;
use App\Helpers\SearchFilterHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Task::with('event');

        // Search functionality - Search by description, assigned_to (name/email), title
        $query = SearchFilterHelper::applySearch(
            $query,
            $request->input('search'),
            ['description', 'assigned_to', 'title']
        );

        // Filter by event_id (category) with special handling for 'unassigned'
        $query = SearchFilterHelper::applyFilter(
            $query,
            $request->input('event_id'),
            'event_id',
            [
                'unassigned' => function($q) {
                    return $q->whereNull('event_id');
                }
            ]
        );

        $tasks = $query->latest()->paginate(5)->withQueryString();

        // Get all events for filter dropdown
        $events = Event::all();

        return view('tasks', compact('tasks', 'events'));
    }

    /**
     * Export tasks to PDF
     */
    public function exportPdf(Request $request)
    {
        $query = Task::with('event');

        // Apply same search and filters as index using helper
        $query = SearchFilterHelper::applySearch(
            $query,
            $request->input('search'),
            ['description', 'assigned_to', 'title']
        );

        $query = SearchFilterHelper::applyFilter(
            $query,
            $request->input('event_id'),
            'event_id',
            [
                'unassigned' => function($q) {
                    return $q->whereNull('event_id');
                }
            ]
        );

        $tasks = $query->latest()->get();

        $pdf = Pdf::loadView('exports.tasks-pdf', compact('tasks'));
        $filename = 'tasks_' . now()->format('Y-m-d_His') . '.pdf';
        
        return $pdf->download($filename);
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
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        // Set title from description (truncate if too long for title field)
        $validated['title'] = strlen($validated['description']) > 255 
            ? substr($validated['description'], 0, 252) . '...' 
            : $validated['description'];

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('tasks', 'public');
        }

        $validated['photo'] = $photoPath;
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
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'remove_photo' => 'nullable|boolean',
        ]);

        // Set title from description (truncate if too long for title field)
        $validated['title'] = strlen($validated['description']) > 255 
            ? substr($validated['description'], 0, 252) . '...' 
            : $validated['description'];

        // Handle photo removal
        if ($request->has('remove_photo') && $request->remove_photo == '1') {
            // Delete old photo if exists
            if ($task->photo && Storage::disk('public')->exists($task->photo)) {
                Storage::disk('public')->delete($task->photo);
            }
            $validated['photo'] = null;
        }
        // Handle photo upload
        elseif ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($task->photo && Storage::disk('public')->exists($task->photo)) {
                Storage::disk('public')->delete($task->photo);
            }
            $photoPath = $request->file('photo')->store('tasks', 'public');
            $validated['photo'] = $photoPath;
        } else {
            $validated['photo'] = $task->photo;
        }

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage (soft delete).
     */
    public function destroy(Task $task)
    {
        try {
            $taskDescription = $task->description;
            $task->delete(); // Soft delete

            return redirect()->route('tasks.index')
                ->with('success', "Task '{$taskDescription}' has been moved to trash.");
        } catch (\Exception $e) {
            return redirect()->route('tasks.index')
                ->with('error', 'Failed to delete task. Please try again.');
        }
    }

    /**
     * Restore a soft deleted task.
     */
    public function restore($id)
    {
        $task = Task::withTrashed()->findOrFail($id);
        $task->restore();

        return redirect()->route('trash.index')
            ->with('success', "Task '{$task->description}' has been restored successfully.");
    }

    /**
     * Permanently delete a task.
     */
    public function forceDelete($id)
    {
        $task = Task::withTrashed()->findOrFail($id);
        
        // Delete photo if exists
        if ($task->photo && Storage::disk('public')->exists($task->photo)) {
            Storage::disk('public')->delete($task->photo);
        }

        $taskDescription = $task->description;
        $task->forceDelete();

        return redirect()->route('trash.index')
            ->with('success', "Task '{$taskDescription}' has been permanently deleted.");
    }
}
