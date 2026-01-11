<x-layouts.app :title="__('Trash')">
    <div class="min-h-screen p-4 md:p-6" style="background: linear-gradient(to bottom right, #141E30, #35577D);">
        @if(session('success'))
            <div id="successToast" class="toast-notification fixed left-1/2 top-1/2 z-50 animate-pop-in pointer-events-auto w-[calc(100%-2rem)] max-w-md mx-4 sm:mx-auto">
                <div class="relative overflow-hidden rounded-2xl sm:rounded-3xl bg-gradient-to-br from-green-500 via-emerald-500 to-teal-500 p-4 sm:p-6 shadow-2xl shadow-green-500/50">
                    <div class="relative z-10">
                        <div class="flex items-center justify-between gap-2 sm:gap-4">
                            <div class="flex items-center gap-2 sm:gap-4 flex-1 min-w-0">
                                <div class="flex h-12 w-12 sm:h-16 sm:w-16 items-center justify-center rounded-xl sm:rounded-2xl bg-white/20 backdrop-blur-md shadow-lg flex-shrink-0">
                                    <svg class="h-6 w-6 sm:h-10 sm:w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg sm:text-2xl font-bold text-white">Success!</h3>
                                    <p class="mt-1 text-sm sm:text-base text-green-50 break-words">{{ session('success') }}</p>
                                </div>
                            </div>
                            <button onclick="closeToast('successToast')" class="rounded-xl bg-white/20 p-2 sm:p-2.5 text-white transition-all hover:bg-white/30">
                                <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Header -->
        <div class="mb-8 animate-fade-in">
            <h1 class="mb-2 text-4xl font-bold text-slate-900 dark:text-white flex items-center gap-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-red-500 to-rose-600 shadow-lg">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>
                Trash
            </h1>
            <p class="text-slate-600 dark:text-slate-400 ml-16">Manage deleted events and tasks</p>
        </div>

        <!-- Events Trash Section -->
        <div class="mb-6 rounded-2xl bg-white/80 backdrop-blur-xl shadow-2xl dark:bg-slate-800/80 border border-slate-200/50 dark:border-slate-700/50 animate-fade-in">
            <div class="border-b border-slate-200/50 p-6 dark:border-slate-700/50 bg-gradient-to-r from-slate-50/50 to-transparent dark:from-slate-800/50">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                    <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Deleted Events
                </h2>
                <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">{{ $events->total() }} deleted event(s)</p>
            </div>
            <div class="overflow-x-auto p-6 custom-scrollbar">
                @if($events->count() > 0)
                    <table class="w-full">
                        <thead>
                            <tr class="border-b-2 border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/50">
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Title</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Deleted At</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                            @foreach($events as $event)
                            <tr class="group transition-smooth hover:bg-slate-50/50 dark:hover:bg-slate-700/30 hover:shadow-sm animate-fade-in">
                                <td class="px-6 py-4">
                                    <div class="font-semibold text-slate-900 dark:text-white">{{ $event->title }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-xs font-semibold bg-slate-100 text-slate-800 dark:bg-slate-700 dark:text-slate-300">
                                        {{ ucfirst(str_replace('_', ' ', $event->status)) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">
                                    {{ $event->deleted_at->format('M d, Y H:i') }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <form action="{{ route('events.restore', $event->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="group flex items-center gap-1.5 rounded-lg bg-green-50 px-3 py-2 text-xs font-semibold text-green-700 transition-smooth hover:bg-green-100 hover:shadow-md hover:scale-105 dark:bg-green-900/30 dark:text-green-300 dark:hover:bg-green-900/50 btn-press">
                                                <svg class="h-3.5 w-3.5 group-hover:rotate-180 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                </svg>
                                                Restore
                                            </button>
                                        </form>
                                        <form action="{{ route('events.force-delete', $event->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to permanently delete this event? This action cannot be undone.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="group flex items-center gap-1.5 rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-700 transition-smooth hover:bg-red-100 hover:shadow-md hover:scale-105 dark:bg-red-900/30 dark:text-red-300 dark:hover:bg-red-900/50 btn-press">
                                                <svg class="h-3.5 w-3.5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Delete Permanently
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $events->links() }}
                    </div>
                @else
                    <p class="py-8 text-center text-slate-500 dark:text-slate-400">No deleted events</p>
                @endif
            </div>
        </div>

        <!-- Tasks Trash Section -->
        <div class="rounded-2xl bg-white/80 backdrop-blur-xl shadow-2xl dark:bg-slate-800/80">
            <div class="border-b border-slate-200/50 p-6 dark:border-slate-700/50">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Deleted Tasks</h2>
                <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">{{ $tasks->total() }} deleted task(s)</p>
            </div>
            <div class="overflow-x-auto p-6">
                @if($tasks->count() > 0)
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-slate-200 dark:border-slate-700">
                                <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Description</th>
                                <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Assigned To</th>
                                <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Deleted At</th>
                                <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                            @foreach($tasks as $task)
                            <tr class="group transition-colors hover:bg-slate-50/50 dark:hover:bg-slate-700/30">
                                <td class="px-6 py-4">
                                    <div class="font-medium text-slate-900 dark:text-white">{{ $task->description }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-slate-700 dark:text-slate-300">{{ $task->assigned_to }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">
                                    {{ $task->deleted_at->format('M d, Y H:i') }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <form action="{{ route('tasks.restore', $task->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="group flex items-center gap-1.5 rounded-lg bg-green-50 px-3 py-1.5 text-xs font-semibold text-green-700 transition-all hover:bg-green-100 hover:shadow-md dark:bg-green-900/30 dark:text-green-300 dark:hover:bg-green-900/50">
                                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                </svg>
                                                Restore
                                            </button>
                                        </form>
                                        <form action="{{ route('tasks.force-delete', $task->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to permanently delete this task? This action cannot be undone.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="group flex items-center gap-1.5 rounded-lg bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700 transition-all hover:bg-red-100 hover:shadow-md dark:bg-red-900/30 dark:text-red-300 dark:hover:bg-red-900/50">
                                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Delete Permanently
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $tasks->links() }}
                    </div>
                @else
                    <p class="py-8 text-center text-slate-500 dark:text-slate-400">No deleted tasks</p>
                @endif
            </div>
        </div>
    </div>

    <script>
        function closeToast(toastId) {
            const toast = document.getElementById(toastId);
            if (toast) {
                toast.classList.remove('animate-pop-in');
                toast.classList.add('animate-pop-out');
                setTimeout(() => toast.remove(), 300);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const successToast = document.getElementById('successToast');
            if (successToast) {
                setTimeout(() => closeToast('successToast'), 3000);
            }
        });
    </script>

    <style>
        @keyframes pop-in {
            0% { transform: translate(-50%, -50%) scale(0.8); opacity: 0; }
            50% { transform: translate(-50%, -50%) scale(1.05); }
            100% { transform: translate(-50%, -50%) scale(1); opacity: 1; }
        }
        @keyframes pop-out {
            0% { transform: translate(-50%, -50%) scale(1); opacity: 1; }
            100% { transform: translate(-50%, -50%) scale(0.8); opacity: 0; }
        }
        .toast-notification { transform: translate(-50%, -50%); }
        .animate-pop-in { animation: pop-in 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards; }
        .animate-pop-out { animation: pop-out 0.3s ease-in forwards; }
    </style>
</x-layouts.app>

