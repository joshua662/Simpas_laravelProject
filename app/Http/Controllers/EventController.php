<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Task;
use App\Helpers\SearchFilterHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Event::with('tasks');

        // Search functionality - Search by title, location
        $query = SearchFilterHelper::applySearch(
            $query,
            $request->input('search'),
            ['title', 'location']
        );

        // Filter by status (category)
        $query = SearchFilterHelper::applyFilter(
            $query,
            $request->input('status'),
            'status'
        );

        $events = $query->latest()->paginate(5)->withQueryString();
        $totalEvents = Event::count();
        
        // Get unassigned tasks for the dropdown in event creation form
        $unassignedTasks = Task::whereNull('event_id')->get();
        
        // Get all tasks for edit form (to show currently assigned task)
        $allTasks = Task::all();
        
        // Use the new Task model methods
        $totalTasks = Task::count();
        $activeTasks = Task::getActiveTasksCount();
        
        // Get actual task lists for modals
        $activeTasksList = Task::getActiveTasks();
        
        // Additional statistics
        $pendingEvents = Event::where('status', 'pending')->count();
        $inProgressEvents = Event::where('status', 'in_progress')->count();
        $completedEvents = Event::where('status', 'completed')->count();
        $cancelledEvents = Event::where('status', 'cancelled')->count();
        
        // Upcoming events (next 7 days)
        $upcomingEvents = Event::whereNotNull('date')
            ->where('date', '>=', now())
            ->where('date', '<=', now()->addDays(7))
            ->orderBy('date', 'asc')
            ->take(5)
            ->get();
        
        // Recent events
        $recentEvents = Event::latest()->take(5)->get();
        
        // Tasks by status
        $tasksWithEvents = Task::whereNotNull('event_id')->count();
        $tasksWithoutEvents = Task::whereNull('event_id')->count();

        return view('dashboard', compact(
            'events', 
            'unassignedTasks',
            'allTasks',
            'totalEvents', 
            'activeTasks', 
            'pendingEvents',
            'inProgressEvents',
            'completedEvents',
            'cancelledEvents',
            'upcomingEvents',
            'recentEvents',
            'tasksWithEvents',
            'tasksWithoutEvents',
            'totalTasks',
            'activeTasksList'
        ));
    }

    /**
     * Export events to PDF
     */
    public function exportPdf(Request $request)
    {
        $query = Event::with('tasks');

        // Apply same search and filters as index using helper
        $query = SearchFilterHelper::applySearch(
            $query,
            $request->input('search'),
            ['title', 'location']
        );

        $query = SearchFilterHelper::applyFilter(
            $query,
            $request->input('status'),
            'status'
        );

        $events = $query->latest()->get();

        $pdf = Pdf::loadView('exports.events-pdf', compact('events'));
        $filename = 'events_' . now()->format('Y-m-d_His') . '.pdf';
        
        return $pdf->download($filename);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:pending,in_progress,completed,cancelled',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'task_id' => 'nullable|exists:tasks,id',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('events', 'public');
        }

        $event = Event::create([
            'title' => $validated['title'],
            'status' => $validated['status'],
            'date' => $validated['date'],
            'location' => $validated['location'],
            'photo' => $photoPath,
        ]);

        // Assign task to event if selected
        if (!empty($validated['task_id'])) {
            Task::where('id', $validated['task_id'])->update(['event_id' => $event->id]);
        }

        return redirect()->route('dashboard')->with('success', 'Event created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:pending,in_progress,completed,cancelled',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'task_id' => 'nullable|exists:tasks,id',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'remove_photo' => 'nullable|boolean',
        ]);

        // Handle photo removal
        if ($request->has('remove_photo') && $request->remove_photo == '1') {
            // Delete old photo if exists
            if ($event->photo && Storage::disk('public')->exists($event->photo)) {
                Storage::disk('public')->delete($event->photo);
            }
            $validated['photo'] = null;
        }
        // Handle photo upload
        elseif ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($event->photo && Storage::disk('public')->exists($event->photo)) {
                Storage::disk('public')->delete($event->photo);
            }
            $photoPath = $request->file('photo')->store('events', 'public');
            $validated['photo'] = $photoPath;
        }

        $event->update([
            'title' => $validated['title'],
            'status' => $validated['status'],
            'date' => $validated['date'],
            'location' => $validated['location'],
            'photo' => $validated['photo'] ?? $event->photo,
        ]);

        // Unassign current tasks from this event
        Task::where('event_id', $event->id)->update(['event_id' => null]);

        // Assign new task to event if selected
        if (!empty($validated['task_id'])) {
            Task::where('id', $validated['task_id'])->update(['event_id' => $event->id]);
        }

        return redirect()->route('dashboard')->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage (soft delete).
     */
    public function destroy(Event $event)
    {
        try {
            $eventTitle = $event->title;
            $taskCount = $event->tasks()->count();
            
            $event->delete(); // Soft delete

            $message = "Event '{$eventTitle}' has been moved to trash.";
            if ($taskCount > 0) {
                $message .= " {$taskCount} associated task(s) have been unassigned.";
            }

            return redirect()->route('dashboard')
                ->with('success', $message);
        } catch (\Exception $e) {
            return redirect()->route('dashboard')
                ->with('error', 'Failed to delete event. Please try again.');
        }
    }

    /**
     * Restore a soft deleted event.
     */
    public function restore($id)
    {
        $event = Event::withTrashed()->findOrFail($id);
        $event->restore();

        return redirect()->route('trash.index')
            ->with('success', "Event '{$event->title}' has been restored successfully.");
    }

    /**
     * Permanently delete an event.
     */
    public function forceDelete($id)
    {
        $event = Event::withTrashed()->findOrFail($id);
        
        // Delete photo if exists
        if ($event->photo && Storage::disk('public')->exists($event->photo)) {
            Storage::disk('public')->delete($event->photo);
        }

        $eventTitle = $event->title;
        $event->forceDelete();

        return redirect()->route('trash.index')
            ->with('success', "Event '{$eventTitle}' has been permanently deleted.");
    }
}
