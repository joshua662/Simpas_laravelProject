// ...existing code...
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome — {{ config('app.name') }}</title>
    <style>
        body { font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; background: linear-gradient(135deg,#fff7ed,#fffbeb); color:#1f2937; padding:40px; }
        .card { max-width:800px; margin:40px auto; background:rgba(255,255,255,0.9); border-radius:12px; padding:28px; box-shadow:0 10px 30px rgba(2,6,23,0.08); }
        h1 { margin:0 0 8px; font-size:32px; }
        p { margin:0 0 12px; color:#374151; }
        .cta { margin-top:20px; display:flex; gap:10px; }
        .btn { background:#2563eb; color:#fff; padding:10px 14px; border-radius:8px; text-decoration:none; }
    </style>
</head>
<body>
    <div class="card">
        <h1>🌞 Warm Welcome to {{ config('app.name', 'Laravel') }}!</h1>
        <p>We’re glad you’re here. Enjoy exploring the project.</p>
        <div class="cta">
            <a class="btn" href="{{ url('/') }}">Go to Home</a>
            <a class="btn" href="{{ url('/welcome') }}">Refresh</a>
        </div>
    </div>
</body>
</html>