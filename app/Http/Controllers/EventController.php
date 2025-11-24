<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Task;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with('tasks')->latest()->paginate(5);
        $totalEvents = Event::count();
        
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:pending,in_progress,completed,cancelled',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        Event::create($validated);

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
        ]);

        $event->update($validated);

        return redirect()->route('dashboard')->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        try {
            $eventTitle = $event->title;
            $taskCount = $event->tasks()->count();
            
            $event->delete();

            $message = "Event '{$eventTitle}' has been deleted successfully.";
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
}
