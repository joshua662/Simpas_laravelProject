<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tasks Export</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #141E30;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            color: #141E30;
        }
        .header p {
            margin: 5px 0;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Tasks Report</h1>
        <p>Generated on: {{ now()->format('F d, Y H:i:s') }}</p>
        <p>Total Tasks: {{ $tasks->count() }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Description</th>
                <th>Assigned To</th>
                <th>Due Date</th>
                <th>Event</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->assigned_to }}</td>
                    <td>{{ $task->due_date ? $task->due_date->format('M d, Y') : 'N/A' }}</td>
                    <td>{{ $task->event ? $task->event->title : 'Unassigned' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center;">No tasks found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>

