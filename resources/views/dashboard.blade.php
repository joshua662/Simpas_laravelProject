<x-layouts.app :title="__('Dashboard')">
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 p-4 md:p-6">
        <!-- Toast Notification Backdrop -->
        <div id="toastBackdrop" class="fixed inset-0 z-40 hidden bg-black/50 backdrop-blur-sm transition-opacity"></div>

        <!-- Toast Notification Container - Centered -->
        <div id="toastContainer" class="fixed inset-0 z-50 flex items-center justify-center pointer-events-none"></div>

        @if(session('success'))
            <div id="successToast" class="toast-notification fixed left-1/2 top-1/2 z-50 animate-pop-in pointer-events-auto w-[calc(100%-2rem)] max-w-md mx-4 sm:mx-auto">
                <div class="relative overflow-hidden rounded-2xl sm:rounded-3xl bg-gradient-to-br from-green-500 via-emerald-500 to-teal-500 p-4 sm:p-6 shadow-2xl shadow-green-500/50">
                    <!-- Animated Background Circles -->
                    <div class="absolute right-0 top-0 h-24 w-24 sm:h-32 sm:w-32 -translate-y-6 sm:-translate-y-8 translate-x-6 sm:translate-x-8 rounded-full bg-white/10"></div>
                    <div class="absolute bottom-0 left-0 h-16 w-16 sm:h-24 sm:w-24 translate-y-4 sm:translate-y-6 -translate-x-4 sm:-translate-x-6 rounded-full bg-white/5"></div>
                    
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
                            <button onclick="closeToast('successToast')" class="rounded-xl bg-white/20 p-2 sm:p-2.5 text-white transition-all hover:bg-white/30 active:bg-white/40 active:scale-95 touch-manipulation flex-shrink-0" aria-label="Close notification">
                                <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div id="errorToast" class="toast-notification fixed left-1/2 top-1/2 z-50 animate-pop-in pointer-events-auto w-[calc(100%-2rem)] max-w-md mx-4 sm:mx-auto">
                <div class="relative overflow-hidden rounded-2xl sm:rounded-3xl bg-gradient-to-br from-red-500 via-rose-500 to-pink-500 p-4 sm:p-6 shadow-2xl shadow-red-500/50">
                    <!-- Animated Background Circles -->
                    <div class="absolute right-0 top-0 h-24 w-24 sm:h-32 sm:w-32 -translate-y-6 sm:-translate-y-8 translate-x-6 sm:translate-x-8 rounded-full bg-white/10"></div>
                    <div class="absolute bottom-0 left-0 h-16 w-16 sm:h-24 sm:w-24 translate-y-4 sm:translate-y-6 -translate-x-4 sm:-translate-x-6 rounded-full bg-white/5"></div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center justify-between gap-2 sm:gap-4">
                            <div class="flex items-center gap-2 sm:gap-4 flex-1 min-w-0">
                                <div class="flex h-12 w-12 sm:h-16 sm:w-16 items-center justify-center rounded-xl sm:rounded-2xl bg-white/20 backdrop-blur-md shadow-lg flex-shrink-0">
                                    <svg class="h-6 w-6 sm:h-10 sm:w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg sm:text-2xl font-bold text-white">Error!</h3>
                                    <p class="mt-1 text-sm sm:text-base text-red-50 break-words">{{ session('error') }}</p>
                                </div>
                            </div>
                            <button onclick="closeToast('errorToast')" class="rounded-xl bg-white/20 p-2 sm:p-2.5 text-white transition-all hover:bg-white/30 active:bg-white/40 active:scale-95 touch-manipulation flex-shrink-0" aria-label="Close notification">
                                <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Header Section with Welcome -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="mb-2 text-4xl font-bold text-slate-900 dark:text-white">Dashboard</h1>
                    <p class="text-slate-600 dark:text-slate-400">Welcome back! Here's what's happening with your events</p>
                </div>
                <div class="hidden md:block">
                    <div class="rounded-xl bg-white/60 px-4 py-2 backdrop-blur-sm dark:bg-slate-800/60">
                        <p class="text-sm text-slate-600 dark:text-slate-400">{{ now()->format('l, F d, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Stats Cards -->
        <div class="mb-8 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
            <!-- Total Events Card -->
            <div class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-500 via-blue-600 to-indigo-600 p-6 shadow-xl shadow-blue-500/25 transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/40">
                <div class="absolute right-0 top-0 h-32 w-32 -translate-y-8 translate-x-8 rounded-full bg-white/10"></div>
                <div class="relative z-10">
                    <div class="mb-4 flex items-center justify-between">
                        <div class="rounded-xl bg-white/20 p-3 backdrop-blur-sm">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                    <p class="mb-1 text-sm font-medium text-blue-100">Total Events</p>
                    <h3 class="text-4xl font-bold text-white">{{ $totalEvents }}</h3>
                    <p class="mt-2 text-xs text-blue-100">All time events</p>
                </div>
            </div>

            <!-- Active Tasks Card -->
            <button onclick="openActiveTasksModal()" class="group relative w-full overflow-hidden rounded-2xl bg-gradient-to-br from-emerald-500 via-teal-600 to-cyan-600 p-6 text-left shadow-xl shadow-emerald-500/25 transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-emerald-500/40 cursor-pointer">
                <div class="absolute right-0 top-0 h-32 w-32 -translate-y-8 translate-x-8 rounded-full bg-white/10"></div>
                <div class="relative z-10">
                    <div class="mb-4 flex items-center justify-between">
                        <div class="rounded-xl bg-white/20 p-3 backdrop-blur-sm">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                    </div>
                    <p class="mb-1 text-sm font-medium text-emerald-100">Active Tasks</p>
                    <h3 class="text-4xl font-bold text-white">{{ $activeTasks }}</h3>
                    <p class="mt-2 text-xs text-emerald-100">Click to view details</p>
                </div>
            </button>

            <!-- Completion Rate Card -->
            <button onclick="openCompletionRateModal()" class="group relative w-full overflow-hidden rounded-2xl bg-gradient-to-br from-purple-500 via-pink-600 to-rose-600 p-6 text-left shadow-xl shadow-purple-500/25 transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-purple-500/40 cursor-pointer">
                <div class="absolute right-0 top-0 h-32 w-32 -translate-y-8 translate-x-8 rounded-full bg-white/10"></div>
                <div class="relative z-10">
                    <div class="mb-4 flex items-center justify-between">
                        <div class="rounded-xl bg-white/20 p-3 backdrop-blur-sm">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                    </div>
                    <p class="mb-1 text-sm font-medium text-purple-100">Completion Rate</p>
                    <h3 class="text-4xl font-bold text-white">{{ $completionRate }}%</h3>
                    <p class="mt-2 text-xs text-purple-100">Click to view completed tasks</p>
                </div>
            </button>

            <!-- Overdue Tasks Card -->
            <button onclick="openOverdueTasksModal()" class="group relative w-full overflow-hidden rounded-2xl bg-gradient-to-br from-orange-500 via-red-600 to-rose-600 p-6 text-left shadow-xl shadow-orange-500/25 transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-orange-500/40 cursor-pointer">
                <div class="absolute right-0 top-0 h-32 w-32 -translate-y-8 translate-x-8 rounded-full bg-white/10"></div>
                <div class="relative z-10">
                    <div class="mb-4 flex items-center justify-between">
                        <div class="rounded-xl bg-white/20 p-3 backdrop-blur-sm">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <p class="mb-1 text-sm font-medium text-orange-100">Overdue Tasks</p>
                    <h3 class="text-4xl font-bold text-white">{{ $overdueTasks }}</h3>
                    <p class="mt-2 text-xs text-orange-100">Click to view details</p>
                </div>
            </button>
        </div>

        <!-- Status Breakdown & Quick Stats -->
        <div class="mb-8 grid gap-6 lg:grid-cols-3">
            <!-- Event Status Breakdown -->
            <div class="rounded-2xl bg-white/80 backdrop-blur-xl p-6 shadow-xl dark:bg-slate-800/80">
                <h3 class="mb-4 text-lg font-bold text-slate-900 dark:text-white">Event Status</h3>
                <div class="space-y-4">
                    <div>
                        <div class="mb-2 flex items-center justify-between">
                            <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Pending</span>
                            <span class="text-sm font-bold text-slate-900 dark:text-white">{{ $pendingEvents }}</span>
                        </div>
                        <div class="h-2 overflow-hidden rounded-full bg-slate-200 dark:bg-slate-700">
                            <div class="h-full rounded-full bg-gradient-to-r from-yellow-400 to-yellow-500" style="width: {{ $totalEvents > 0 ? ($pendingEvents / $totalEvents * 100) : 0 }}%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2 flex items-center justify-between">
                            <span class="text-sm font-medium text-slate-700 dark:text-slate-300">In Progress</span>
                            <span class="text-sm font-bold text-slate-900 dark:text-white">{{ $inProgressEvents }}</span>
                        </div>
                        <div class="h-2 overflow-hidden rounded-full bg-slate-200 dark:bg-slate-700">
                            <div class="h-full rounded-full bg-gradient-to-r from-blue-400 to-blue-500" style="width: {{ $totalEvents > 0 ? ($inProgressEvents / $totalEvents * 100) : 0 }}%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2 flex items-center justify-between">
                            <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Completed</span>
                            <span class="text-sm font-bold text-slate-900 dark:text-white">{{ $completedEvents }}</span>
                        </div>
                        <div class="h-2 overflow-hidden rounded-full bg-slate-200 dark:bg-slate-700">
                            <div class="h-full rounded-full bg-gradient-to-r from-green-400 to-green-500" style="width: {{ $totalEvents > 0 ? ($completedEvents / $totalEvents * 100) : 0 }}%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2 flex items-center justify-between">
                            <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Cancelled</span>
                            <span class="text-sm font-bold text-slate-900 dark:text-white">{{ $cancelledEvents }}</span>
                        </div>
                        <div class="h-2 overflow-hidden rounded-full bg-slate-200 dark:bg-slate-700">
                            <div class="h-full rounded-full bg-gradient-to-r from-red-400 to-red-500" style="width: {{ $totalEvents > 0 ? ($cancelledEvents / $totalEvents * 100) : 0 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Task Distribution -->
            <div class="rounded-2xl bg-white/80 backdrop-blur-xl p-6 shadow-xl dark:bg-slate-800/80">
                <h3 class="mb-4 text-lg font-bold text-slate-900 dark:text-white">Task Distribution</h3>
                <div class="space-y-6">
                    <div class="flex items-center justify-between rounded-xl bg-gradient-to-r from-blue-50 to-indigo-50 p-4 dark:from-blue-900/20 dark:to-indigo-900/20">
                        <div class="flex items-center gap-3">
                            <div class="rounded-lg bg-blue-500 p-2">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-600 dark:text-slate-400">With Events</p>
                                <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $tasksWithEvents }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between rounded-xl bg-gradient-to-r from-purple-50 to-pink-50 p-4 dark:from-purple-900/20 dark:to-pink-900/20">
                        <div class="flex items-center gap-3">
                            <div class="rounded-lg bg-purple-500 p-2">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-600 dark:text-slate-400">Unassigned</p>
                                <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $tasksWithoutEvents }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between rounded-xl bg-gradient-to-r from-slate-50 to-slate-100 p-4 dark:from-slate-700 dark:to-slate-600">
                        <div class="flex items-center gap-3">
                            <div class="rounded-lg bg-slate-500 p-2">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-600 dark:text-slate-400">Total Tasks</p>
                                <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $totalTasks }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upcoming Events -->
            <div class="rounded-2xl bg-white/80 backdrop-blur-xl p-6 shadow-xl dark:bg-slate-800/80">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white">Upcoming Events</h3>
                    <span class="rounded-full bg-blue-100 px-2 py-1 text-xs font-semibold text-blue-700 dark:bg-blue-900/30 dark:text-blue-300">Next 7 Days</span>
                </div>
                <div class="space-y-3">
                    @forelse($upcomingEvents as $event)
                        <div class="group rounded-xl border border-slate-200 bg-slate-50 p-3 transition-all hover:border-blue-300 hover:bg-blue-50 dark:border-slate-700 dark:bg-slate-700/50 dark:hover:border-blue-600 dark:hover:bg-blue-900/20">
                            <div class="flex items-center justify-between">
                                <div class="flex-1">
                                    <p class="font-semibold text-slate-900 dark:text-white">{{ $event->title }}</p>
                                    <p class="mt-1 text-xs text-slate-600 dark:text-slate-400">{{ $event->date->format('M d, Y') }} • {{ $event->location }}</p>
                                </div>
                                <div class="ml-3">
                                    @php
                                        $statusColors = [
                                            'pending' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300',
                                            'in_progress' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300',
                                            'completed' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300',
                                            'cancelled' => 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300',
                                        ];
                                    @endphp
                                    <span class="inline-flex rounded-full px-2 py-1 text-xs font-semibold {{ $statusColors[$event->status] ?? 'bg-gray-100' }}">
                                        {{ ucfirst(str_replace('_', ' ', $event->status)) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="py-4 text-center text-sm text-slate-500 dark:text-slate-400">No upcoming events</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Event Management Section -->
        <div class="mb-6 rounded-2xl bg-white/80 backdrop-blur-xl shadow-2xl dark:bg-slate-800/80">
            <div class="border-b border-slate-200/50 p-6 dark:border-slate-700/50">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Add New Event</h2>
                        <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Create a new event to get started</p>
                    </div>
                    <a href="{{ route('tasks.index') }}" class="hidden rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 px-4 py-2 text-sm font-semibold text-white shadow-lg transition-all hover:scale-105 md:block">
                        Manage Tasks →
                    </a>
                </div>
            </div>
            
            <div class="p-6">
                <form action="{{ route('events.store') }}" method="POST" class="grid gap-6 md:grid-cols-2">
                    @csrf
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Event Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" placeholder="Enter event title" required class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-500/20 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-400">
                        @error('title') 
                            <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Status</label>
                        <select name="status" required class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-500/20 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-400">
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        @error('status') 
                            <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Date</label>
                        <input type="date" name="date" value="{{ old('date') }}" required class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-500/20 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-400">
                        @error('date') 
                            <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Location</label>
                        <input type="text" name="location" value="{{ old('location') }}" placeholder="Enter location" required class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-500/20 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-400">
                        @error('location') 
                            <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="md:col-span-2">
                        <button type="submit" class="group relative overflow-hidden rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-3 font-semibold text-white shadow-lg shadow-blue-500/50 transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-blue-500/60">
                            <span class="relative z-10 flex items-center gap-2">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Add Event
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Events List Table -->
        <div class="rounded-2xl bg-white/80 backdrop-blur-xl shadow-2xl dark:bg-slate-800/80">
            <div class="border-b border-slate-200/50 p-6 dark:border-slate-700/50">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-white">All Events</h2>
                        <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Manage all your events</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700 dark:bg-blue-900/30 dark:text-blue-300">{{ $totalEvents }} Total</span>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto p-6">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-slate-200 dark:border-slate-700">
                            <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Title</th>
                            <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Status</th>
                            <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Date</th>
                            <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Location</th>
                            <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Tasks</th>
                            <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                        @forelse($events as $event)
                        <tr class="group transition-colors hover:bg-slate-50/50 dark:hover:bg-slate-700/30">
                            <td class="px-6 py-4">
                                <div class="font-semibold text-slate-900 dark:text-white">{{ $event->title }}</div>
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $statusConfig = [
                                        'pending' => ['bg' => 'bg-yellow-100 dark:bg-yellow-900/30', 'text' => 'text-yellow-800 dark:text-yellow-300', 'icon' => '⏳'],
                                        'in_progress' => ['bg' => 'bg-blue-100 dark:bg-blue-900/30', 'text' => 'text-blue-800 dark:text-blue-300', 'icon' => '🔄'],
                                        'completed' => ['bg' => 'bg-green-100 dark:bg-green-900/30', 'text' => 'text-green-800 dark:text-green-300', 'icon' => '✅'],
                                        'cancelled' => ['bg' => 'bg-red-100 dark:bg-red-900/30', 'text' => 'text-red-800 dark:text-red-300', 'icon' => '❌'],
                                    ];
                                    $config = $statusConfig[$event->status] ?? $statusConfig['pending'];
                                @endphp
                                <span class="inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-xs font-semibold {{ $config['bg'] }} {{ $config['text'] }}">
                                    <span>{{ $config['icon'] }}</span>
                                    {{ ucfirst(str_replace('_', ' ', $event->status)) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">
                                <div class="flex items-center gap-2">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $event->date->format('M d, Y') }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">
                                <div class="flex items-center gap-2">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $event->location }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1 rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700 dark:bg-slate-700 dark:text-slate-300">
                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                    {{ $event->task_count }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <button onclick="openEditModal({{ $event->id }}, '{{ addslashes($event->title) }}', '{{ $event->status }}', '{{ $event->date->format('Y-m-d') }}', '{{ addslashes($event->location) }}')" class="group flex items-center gap-1.5 rounded-lg bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700 transition-all hover:bg-blue-100 hover:shadow-md dark:bg-blue-900/30 dark:text-blue-300 dark:hover:bg-blue-900/50">
                                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </button>
                                    <button onclick="openDeleteEventModal({{ $event->id }}, '{{ addslashes($event->title) }}', {{ $event->task_count }}, '{{ route('events.destroy', $event) }}')" class="group flex items-center gap-1.5 rounded-lg bg-gradient-to-r from-red-50 to-rose-50 px-3 py-1.5 text-xs font-semibold text-red-700 transition-all hover:from-red-100 hover:to-rose-100 hover:shadow-md dark:from-red-900/30 dark:to-rose-900/30 dark:text-red-300 dark:hover:from-red-900/50 dark:hover:to-rose-900/50">
                                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="mx-auto max-w-sm">
                                    <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="mt-4 text-sm font-medium text-slate-900 dark:text-white">No events found</p>
                                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Get started by creating a new event above</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            @if($events->hasPages())
                <div class="border-t border-slate-200/50 p-4 sm:p-6 dark:border-slate-700/50">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 text-center sm:text-left">
                            Showing <span class="font-semibold text-slate-900 dark:text-white">{{ $events->firstItem() }}</span> to 
                            <span class="font-semibold text-slate-900 dark:text-white">{{ $events->lastItem() }}</span> of 
                            <span class="font-semibold text-slate-900 dark:text-white">{{ $events->total() }}</span> events
                        </div>
                        <div class="flex items-center gap-1 sm:gap-2 flex-wrap justify-center">
                            @if ($events->onFirstPage())
                                <span class="flex items-center justify-center rounded-lg border border-slate-300 bg-slate-100 px-3 sm:px-4 py-2 text-xs sm:text-sm font-semibold text-slate-400 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-500 cursor-not-allowed">
                                    <svg class="mr-1 sm:mr-2 h-3 w-3 sm:h-4 sm:w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                    <span class="hidden sm:inline">Previous</span>
                                    <span class="sm:hidden">Prev</span>
                                </span>
                            @else
                                <a href="{{ $events->previousPageUrl() }}" class="flex items-center justify-center rounded-lg border border-slate-300 bg-white px-3 sm:px-4 py-2 text-xs sm:text-sm font-semibold text-slate-700 transition-all hover:bg-blue-50 hover:border-blue-300 hover:text-blue-700 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-blue-900/20 dark:hover:border-blue-500 dark:hover:text-blue-300">
                                    <svg class="mr-1 sm:mr-2 h-3 w-3 sm:h-4 sm:w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                    <span class="hidden sm:inline">Previous</span>
                                    <span class="sm:hidden">Prev</span>
                                </a>
                            @endif

                            @php
                                $currentPage = $events->currentPage();
                                $lastPage = $events->lastPage();
                                $startPage = max(1, $currentPage - 2);
                                $endPage = min($lastPage, $currentPage + 2);
                            @endphp

                            @if($startPage > 1)
                                <a href="{{ $events->url(1) }}" class="flex items-center justify-center rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition-all hover:bg-blue-50 hover:border-blue-300 hover:text-blue-700 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-blue-900/20 dark:hover:border-blue-500 dark:hover:text-blue-300">
                                    1
                                </a>
                                @if($startPage > 2)
                                    <span class="px-2 text-slate-400">...</span>
                                @endif
                            @endif

                            @foreach ($events->getUrlRange($startPage, $endPage) as $page => $url)
                                @if ($page == $currentPage)
                                    <span class="flex items-center justify-center rounded-lg bg-gradient-to-r from-blue-500 via-indigo-600 to-purple-600 px-3 sm:px-4 py-2 text-xs sm:text-sm font-semibold text-white shadow-lg shadow-blue-500/50">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="flex items-center justify-center rounded-lg border border-slate-300 bg-white px-3 sm:px-4 py-2 text-xs sm:text-sm font-semibold text-slate-700 transition-all hover:bg-blue-50 hover:border-blue-300 hover:text-blue-700 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-blue-900/20 dark:hover:border-blue-500 dark:hover:text-blue-300">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach

                            @if($endPage < $lastPage)
                                @if($endPage < $lastPage - 1)
                                    <span class="px-2 text-slate-400">...</span>
                                @endif
                                <a href="{{ $events->url($lastPage) }}" class="flex items-center justify-center rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition-all hover:bg-blue-50 hover:border-blue-300 hover:text-blue-700 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-blue-900/20 dark:hover:border-blue-500 dark:hover:text-blue-300">
                                    {{ $lastPage }}
                                </a>
                            @endif

                            @if ($events->hasMorePages())
                                <a href="{{ $events->nextPageUrl() }}" class="flex items-center justify-center rounded-lg border border-slate-300 bg-white px-3 sm:px-4 py-2 text-xs sm:text-sm font-semibold text-slate-700 transition-all hover:bg-blue-50 hover:border-blue-300 hover:text-blue-700 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-blue-900/20 dark:hover:border-blue-500 dark:hover:text-blue-300">
                                    <span class="hidden sm:inline">Next</span>
                                    <span class="sm:hidden">Next</span>
                                    <svg class="ml-1 sm:ml-2 h-3 w-3 sm:h-4 sm:w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            @else
                                <span class="flex items-center justify-center rounded-lg border border-slate-300 bg-slate-100 px-3 sm:px-4 py-2 text-xs sm:text-sm font-semibold text-slate-400 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-500 cursor-not-allowed">
                                    <span class="hidden sm:inline">Next</span>
                                    <span class="sm:hidden">Next</span>
                                    <svg class="ml-1 sm:ml-2 h-3 w-3 sm:h-4 sm:w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Delete Event Confirmation Modal -->
    <div id="deleteEventModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
        <div class="relative w-full max-w-md rounded-2xl bg-white p-8 shadow-2xl dark:bg-slate-800">
            <div class="text-center">
                <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-red-100 dark:bg-red-900/30">
                    <svg class="h-8 w-8 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h3 class="mb-2 text-2xl font-bold text-slate-900 dark:text-white">Delete Event</h3>
                <p class="mb-1 text-sm font-semibold text-slate-700 dark:text-slate-300">Are you sure you want to delete this event?</p>
                <p class="mb-2 rounded-lg bg-slate-100 p-3 text-sm font-medium text-slate-900 dark:bg-slate-700 dark:text-white" id="deleteEventTitle"></p>
                <p class="mb-6 text-xs text-slate-500 dark:text-slate-400" id="deleteEventWarning"></p>
                <p class="mb-6 text-xs font-medium text-red-600 dark:text-red-400">This action cannot be undone.</p>
                <form id="deleteEventForm" method="POST" class="flex justify-center gap-3">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="closeDeleteEventModal()" class="rounded-xl border border-slate-300 bg-white px-6 py-2.5 text-sm font-semibold text-slate-700 transition-all hover:bg-slate-50 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-300 dark:hover:bg-slate-600">
                        Cancel
                    </button>
                    <button type="submit" class="group flex items-center gap-2 rounded-xl bg-gradient-to-r from-red-600 to-rose-600 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-red-500/50 transition-all hover:shadow-xl hover:shadow-red-500/60">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Delete Event
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Event Modal -->
    <div id="editModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
        <div class="relative w-full max-w-lg rounded-2xl bg-white p-8 shadow-2xl dark:bg-slate-800">
            <div class="mb-6">
                <h3 class="text-2xl font-bold text-slate-900 dark:text-white">Edit Event</h3>
                <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Update event information</p>
            </div>
            <form id="editForm" method="POST" class="space-y-5">
                @csrf
                @method('PUT')
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Event Title</label>
                    <input type="text" id="edit_title" name="title" required class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-500/20 dark:border-slate-600 dark:bg-slate-700 dark:text-white">
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Status</label>
                    <select id="edit_status" name="status" required class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-500/20 dark:border-slate-600 dark:bg-slate-700 dark:text-white">
                        <option value="pending">Pending</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Date</label>
                    <input type="date" id="edit_date" name="date" required class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-500/20 dark:border-slate-600 dark:bg-slate-700 dark:text-white">
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Location</label>
                    <input type="text" id="edit_location" name="location" required class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-500/20 dark:border-slate-600 dark:bg-slate-700 dark:text-white">
                </div>
                <div class="flex justify-end gap-3 pt-4">
                    <button type="button" onclick="closeEditModal()" class="rounded-xl border border-slate-300 bg-white px-6 py-2.5 text-sm font-semibold text-slate-700 transition-all hover:bg-slate-50 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-300 dark:hover:bg-slate-600">
                        Cancel
                    </button>
                    <button type="submit" class="rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-blue-500/50 transition-all hover:shadow-xl hover:shadow-blue-500/60">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Active Tasks Modal -->
    <div id="activeTasksModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
        <div class="relative w-full max-w-3xl max-h-[90vh] overflow-hidden rounded-2xl bg-white shadow-2xl dark:bg-slate-800">
            <div class="border-b border-slate-200/50 bg-gradient-to-r from-emerald-500 to-teal-600 p-6 dark:border-slate-700/50">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl font-bold text-white">Active Tasks</h3>
                        <p class="mt-1 text-sm text-emerald-100">Tasks due today or in the future</p>
                    </div>
                    <button onclick="closeActiveTasksModal()" class="rounded-lg bg-white/20 p-2 text-white transition-all hover:bg-white/30">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="max-h-[60vh] overflow-y-auto p-6">
                @if($activeTasksList->count() > 0)
                    <div class="space-y-3">
                        @foreach($activeTasksList as $task)
                            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all hover:border-emerald-300 hover:bg-emerald-50 dark:border-slate-700 dark:bg-slate-700/50 dark:hover:border-emerald-600 dark:hover:bg-emerald-900/20">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <p class="font-semibold text-slate-900 dark:text-white">{{ $task->description }}</p>
                                        <div class="mt-2 flex flex-wrap items-center gap-3 text-sm text-slate-600 dark:text-slate-400">
                                            <span class="flex items-center gap-1">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                {{ $task->assigned_to }}
                                            </span>
                                            <span class="flex items-center gap-1">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                {{ $task->due_date->format('M d, Y') }}
                                            </span>
                                            @if($task->event)
                                                <span class="flex items-center gap-1 rounded-full bg-blue-100 px-2 py-1 text-xs font-semibold text-blue-800 dark:bg-blue-900/30 dark:text-blue-300">
                                                    {{ $task->event->title }}
                                                </span>
                                            @else
                                                <span class="flex items-center gap-1 rounded-full bg-slate-200 px-2 py-1 text-xs font-semibold text-slate-600 dark:bg-slate-600 dark:text-slate-400">
                                                    Unassigned
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="py-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <p class="mt-4 text-sm font-medium text-slate-900 dark:text-white">No active tasks</p>
                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">All tasks are up to date!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Completion Rate Modal -->
    <div id="completionRateModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
        <div class="relative w-full max-w-3xl max-h-[90vh] overflow-hidden rounded-2xl bg-white shadow-2xl dark:bg-slate-800">
            <div class="border-b border-slate-200/50 bg-gradient-to-r from-purple-500 to-pink-600 p-6 dark:border-slate-700/50">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl font-bold text-white">Completed Tasks</h3>
                        <p class="mt-1 text-sm text-purple-100">Completion Rate: {{ $completionRate }}%</p>
                    </div>
                    <button onclick="closeCompletionRateModal()" class="rounded-lg bg-white/20 p-2 text-white transition-all hover:bg-white/30">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="max-h-[60vh] overflow-y-auto p-6">
                @if($completedTasksList->count() > 0)
                    <div class="space-y-3">
                        @foreach($completedTasksList as $task)
                            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all hover:border-purple-300 hover:bg-purple-50 dark:border-slate-700 dark:bg-slate-700/50 dark:hover:border-purple-600 dark:hover:bg-purple-900/20">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2">
                                            <svg class="h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <p class="font-semibold text-slate-900 dark:text-white">{{ $task->description }}</p>
                                        </div>
                                        <div class="mt-2 flex flex-wrap items-center gap-3 text-sm text-slate-600 dark:text-slate-400">
                                            <span class="flex items-center gap-1">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                {{ $task->assigned_to }}
                                            </span>
                                            <span class="flex items-center gap-1">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                Completed: {{ $task->due_date->format('M d, Y') }}
                                            </span>
                                            @if($task->event)
                                                <span class="flex items-center gap-1 rounded-full bg-blue-100 px-2 py-1 text-xs font-semibold text-blue-800 dark:bg-blue-900/30 dark:text-blue-300">
                                                    {{ $task->event->title }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="py-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <p class="mt-4 text-sm font-medium text-slate-900 dark:text-white">No completed tasks</p>
                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Complete tasks to see them here</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Overdue Tasks Modal -->
    <div id="overdueTasksModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
        <div class="relative w-full max-w-3xl max-h-[90vh] overflow-hidden rounded-2xl bg-white shadow-2xl dark:bg-slate-800">
            <div class="border-b border-slate-200/50 bg-gradient-to-r from-orange-500 to-red-600 p-6 dark:border-slate-700/50">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl font-bold text-white">Overdue Tasks</h3>
                        <p class="mt-1 text-sm text-orange-100">Tasks that require immediate attention</p>
                    </div>
                    <button onclick="closeOverdueTasksModal()" class="rounded-lg bg-white/20 p-2 text-white transition-all hover:bg-white/30">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="max-h-[60vh] overflow-y-auto p-6">
                @if($overdueTasksList->count() > 0)
                    <div class="space-y-3">
                        @foreach($overdueTasksList as $task)
                            <div class="rounded-xl border border-red-200 bg-red-50 p-4 transition-all hover:border-red-300 hover:bg-red-100 dark:border-red-900/50 dark:bg-red-900/20 dark:hover:bg-red-900/30">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2">
                                            <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <p class="font-semibold text-slate-900 dark:text-white">{{ $task->description }}</p>
                                        </div>
                                        <div class="mt-2 flex flex-wrap items-center gap-3 text-sm text-slate-600 dark:text-slate-400">
                                            <span class="flex items-center gap-1">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                {{ $task->assigned_to }}
                                            </span>
                                            <span class="flex items-center gap-1 font-semibold text-red-600 dark:text-red-400">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                Overdue: {{ $task->due_date->format('M d, Y') }}
                                            </span>
                                            @if($task->event)
                                                <span class="flex items-center gap-1 rounded-full bg-blue-100 px-2 py-1 text-xs font-semibold text-blue-800 dark:bg-blue-900/30 dark:text-blue-300">
                                                    {{ $task->event->title }}
                                                </span>
                                            @else
                                                <span class="flex items-center gap-1 rounded-full bg-slate-200 px-2 py-1 text-xs font-semibold text-slate-600 dark:bg-slate-600 dark:text-slate-400">
                                                    Unassigned
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="py-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="mt-4 text-sm font-medium text-slate-900 dark:text-white">No overdue tasks</p>
                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Great job! All tasks are on schedule</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function openEditModal(id, title, status, date, location) {
            document.getElementById('editForm').action = `/events/${id}`;
            document.getElementById('edit_title').value = title;
            document.getElementById('edit_status').value = status;
            document.getElementById('edit_date').value = date;
            document.getElementById('edit_location').value = location;
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editModal').classList.remove('flex');
        }

        document.getElementById('editModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeEditModal();
            }
        });

        // Active Tasks Modal Functions
        function openActiveTasksModal() {
            document.getElementById('activeTasksModal').classList.remove('hidden');
            document.getElementById('activeTasksModal').classList.add('flex');
        }

        function closeActiveTasksModal() {
            document.getElementById('activeTasksModal').classList.add('hidden');
            document.getElementById('activeTasksModal').classList.remove('flex');
        }

        document.getElementById('activeTasksModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeActiveTasksModal();
            }
        });

        // Completion Rate Modal Functions
        function openCompletionRateModal() {
            document.getElementById('completionRateModal').classList.remove('hidden');
            document.getElementById('completionRateModal').classList.add('flex');
        }

        function closeCompletionRateModal() {
            document.getElementById('completionRateModal').classList.add('hidden');
            document.getElementById('completionRateModal').classList.remove('flex');
        }

        document.getElementById('completionRateModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeCompletionRateModal();
            }
        });

        // Overdue Tasks Modal Functions
        function openOverdueTasksModal() {
            document.getElementById('overdueTasksModal').classList.remove('hidden');
            document.getElementById('overdueTasksModal').classList.add('flex');
        }

        function closeOverdueTasksModal() {
            document.getElementById('overdueTasksModal').classList.add('hidden');
            document.getElementById('overdueTasksModal').classList.remove('flex');
        }

        document.getElementById('overdueTasksModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeOverdueTasksModal();
            }
        });

        // Toast Notification Functions
        function closeToast(toastId) {
            const toast = document.getElementById(toastId);
            const backdrop = document.getElementById('toastBackdrop');
            
            if (toast) {
                toast.classList.remove('animate-pop-in');
                toast.classList.add('animate-pop-out');
                
                if (backdrop) {
                    backdrop.classList.add('hidden');
                }
                
                setTimeout(() => {
                    toast.remove();
                }, 300);
            }
        }

        // Auto-dismiss toasts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const successToast = document.getElementById('successToast');
            const errorToast = document.getElementById('errorToast');
            const backdrop = document.getElementById('toastBackdrop');

            if (successToast || errorToast) {
                if (backdrop) {
                    backdrop.classList.remove('hidden');
                }
            }

            if (successToast) {
                setTimeout(() => closeToast('successToast'), 2000);
            }

            if (errorToast) {
                setTimeout(() => closeToast('errorToast'), 2000);
            }
        });

        // Delete Event Modal Functions
        function openDeleteEventModal(id, title, taskCount, deleteUrl) {
            document.getElementById('deleteEventForm').action = deleteUrl;
            document.getElementById('deleteEventTitle').textContent = title;
            
            let warningText = 'This event will be permanently deleted.';
            if (taskCount > 0) {
                warningText += ` ${taskCount} associated task(s) will be unassigned.`;
            }
            document.getElementById('deleteEventWarning').textContent = warningText;
            
            document.getElementById('deleteEventModal').classList.remove('hidden');
            document.getElementById('deleteEventModal').classList.add('flex');
        }

        function closeDeleteEventModal() {
            document.getElementById('deleteEventModal').classList.add('hidden');
            document.getElementById('deleteEventModal').classList.remove('flex');
        }

        document.getElementById('deleteEventModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteEventModal();
            }
        });
    </script>

    <style>
        @keyframes pop-in {
            0% {
                transform: translate(-50%, -50%) scale(0.8);
                opacity: 0;
            }
            50% {
                transform: translate(-50%, -50%) scale(1.05);
            }
            100% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 1;
            }
        }

        @keyframes pop-out {
            0% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 1;
            }
            100% {
                transform: translate(-50%, -50%) scale(0.8);
                opacity: 0;
            }
        }

        .toast-notification {
            transform: translate(-50%, -50%);
        }

        .animate-pop-in {
            animation: pop-in 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards;
        }

        .animate-pop-out {
            animation: pop-out 0.3s ease-in forwards;
        }

        /* Mobile optimizations */
        @media (max-width: 640px) {
            .toast-notification {
                max-width: calc(100vw - 2rem);
            }
        }

        /* Touch-friendly interactions */
        .touch-manipulation {
            touch-action: manipulation;
            -webkit-tap-highlight-color: transparent;
        }

    </style>
</x-layouts.app>
