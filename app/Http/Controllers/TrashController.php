<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Task;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    /**
     * Display a listing of all trashed records.
     */
    public function index()
    {
        $events = Event::onlyTrashed()->with('tasks')->latest('deleted_at')->paginate(10, ['*'], 'events_page');
        $tasks = Task::onlyTrashed()->with('event')->latest('deleted_at')->paginate(10, ['*'], 'tasks_page');

        return view('trash', compact('events', 'tasks'));
    }
}
