<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Task;
use Carbon\Carbon;

class EventTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Events
        $event1 = Event::create([
            'title' => 'Annual Tech Conference 2025',
            'status' => 'in_progress',
            'date' => Carbon::now()->addDays(30),
            'location' => 'San Francisco Convention Center',
        ]);

        $event2 = Event::create([
            'title' => 'Product Launch Event',
            'status' => 'pending',
            'date' => Carbon::now()->addDays(45),
            'location' => 'New York City',
        ]);

        $event3 = Event::create([
            'title' => 'Team Building Workshop',
            'status' => 'completed',
            'date' => Carbon::now()->subDays(10),
            'location' => 'Mountain View Resort',
        ]);

        $event4 = Event::create([
            'title' => 'Client Meeting',
            'status' => 'pending',
            'date' => Carbon::now()->addDays(15),
            'location' => 'Downtown Office',
        ]);

        $event5 = Event::create([
            'title' => 'Holiday Party',
            'status' => 'cancelled',
            'date' => Carbon::now()->addDays(60),
            'location' => 'Grand Hotel',
        ]);

        // Create Tasks with relationships
        Task::create([
            'title' => 'Prepare presentation slides for keynote',
            'description' => 'Prepare presentation slides for keynote',
            'assigned_to' => 'John Doe',
            'due_date' => Carbon::now()->addDays(25),
            'event_id' => $event1->id,
        ]);

        Task::create([
            'title' => 'Book venue and catering services',
            'description' => 'Book venue and catering services',
            'assigned_to' => 'Jane Smith',
            'due_date' => Carbon::now()->addDays(20),
            'event_id' => $event1->id,
        ]);

        Task::create([
            'title' => 'Send invitations to all attendees',
            'description' => 'Send invitations to all attendees',
            'assigned_to' => 'Mike Johnson',
            'due_date' => Carbon::now()->addDays(10),
            'event_id' => $event1->id,
        ]);

        Task::create([
            'title' => 'Finalize product demo script',
            'description' => 'Finalize product demo script',
            'assigned_to' => 'Sarah Williams',
            'due_date' => Carbon::now()->addDays(40),
            'event_id' => $event2->id,
        ]);

        Task::create([
            'title' => 'Coordinate with marketing team',
            'description' => 'Coordinate with marketing team',
            'assigned_to' => 'David Brown',
            'due_date' => Carbon::now()->addDays(35),
            'event_id' => $event2->id,
        ]);

        Task::create([
            'title' => 'Prepare meeting agenda',
            'description' => 'Prepare meeting agenda',
            'assigned_to' => 'Emily Davis',
            'due_date' => Carbon::now()->addDays(12),
            'event_id' => $event4->id,
        ]);

        // Create unassigned tasks (no event_id)
        Task::create([
            'title' => 'Update company website',
            'description' => 'Update company website',
            'assigned_to' => 'Tom Wilson',
            'due_date' => Carbon::now()->addDays(7),
            'event_id' => null,
        ]);

        Task::create([
            'title' => 'Review quarterly reports',
            'description' => 'Review quarterly reports',
            'assigned_to' => 'Lisa Anderson',
            'due_date' => Carbon::now()->addDays(5),
            'event_id' => null,
        ]);

        Task::create([
            'title' => 'Organize team lunch',
            'description' => 'Organize team lunch',
            'assigned_to' => 'Robert Taylor',
            'due_date' => Carbon::now()->addDays(3),
            'event_id' => null,
        ]);
    }
}
