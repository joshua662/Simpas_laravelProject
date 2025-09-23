<x-layouts.app :title="__('Dashboard')">
    <div style="max-width:800px; margin:40px auto; background:rgba(255,255,255,0.9); border-radius:12px; padding:28px; box-shadow:0 10px 30px rgba(2,6,23,0.08);">
        <h1 style="margin:0 0 8px; font-size:28px; color:#1f2937;">Welcome back 👋</h1>
        <p style="margin:0 0 16px; color:#374151;">Here’s a simple dashboard to get you started.</p>

        <div style="display:flex; gap:10px; flex-wrap:wrap;">
            <a href="{{ route('dashboard') }}" style="background:#2563eb; color:#fff; padding:10px 14px; border-radius:8px; text-decoration:none;">Refresh</a>
            <a href="{{ route('settings.profile') }}" style="background:#0ea5e9; color:#fff; padding:10px 14px; border-radius:8px; text-decoration:none;">Profile Settings</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="background:#ef4444; color:#fff; padding:10px 14px; border-radius:8px; text-decoration:none;">Log out</a>
        </div>

        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display:none;">
            @csrf
        </form>
    </div>
</x-layouts.app>
