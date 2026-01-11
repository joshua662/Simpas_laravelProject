<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Events Export</title>
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
        <h1>Events Report</h1>
        <p>Generated on: {{ now()->format('F d, Y H:i:s') }}</p>
        <p>Total Events: {{ $events->count() }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Date</th>
                <th>Location</th>
                <th>Tasks Count</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $event->status)) }}</td>
                    <td>{{ $event->date ? $event->date->format('M d, Y') : 'N/A' }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->task_count }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">No events found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>

