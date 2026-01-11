<x-layouts.app :title="__('Tasks')">
    <div class="min-h-screen p-6" style="background: linear-gradient(to bottom right, #141E30, #35577D);">
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

        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="mb-2 text-4xl font-bold text-slate-900 dark:text-white">Task Management</h1>
            <p class="text-slate-600 dark:text-slate-400">Organize and track all your tasks</p>
        </div>

        <!-- Task Management Section -->
        <div class="mb-6 rounded-2xl bg-white/80 backdrop-blur-xl shadow-2xl dark:bg-slate-800/80">
            <div class="border-b border-slate-200/50 p-6 dark:border-slate-700/50">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Add New Task</h2>
                <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Create a new task to get started</p>
            </div>
            
            <div class="p-6">
                <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data" class="grid gap-6 md:grid-cols-2">
                    @csrf
                    <div class="md:col-span-2">
                        <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Description</label>
                        <textarea name="description" rows="3" placeholder="Enter task description" required class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-purple-500 focus:outline-none focus:ring-4 focus:ring-purple-500/20 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-purple-400">{{ old('description') }}</textarea>
                        @error('description') 
                            <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Assigned To</label>
                        <input type="text" name="assigned_to" value="{{ old('assigned_to') }}" placeholder="Enter assignee name" required class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-purple-500 focus:outline-none focus:ring-4 focus:ring-purple-500/20 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-purple-400">
                        @error('assigned_to') 
                            <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Due Date</label>
                        <input type="date" name="due_date" value="{{ old('due_date') }}" required class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-purple-500 focus:outline-none focus:ring-4 focus:ring-purple-500/20 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-purple-400">
                        @error('due_date') 
                            <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Photo (Optional)</label>
                        <input type="file" name="photo" accept="image/jpeg,image/jpg,image/png" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-purple-500 focus:outline-none focus:ring-4 focus:ring-purple-500/20 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-purple-400">
                        <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">JPG/PNG only, max 2MB</p>
                        @error('photo') 
                            <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="md:col-span-2">
                        <button type="submit" class="group relative overflow-hidden rounded-xl bg-gradient-to-r from-[#141E30] to-[#35577D] px-8 py-3 font-semibold text-white shadow-lg shadow-[#141E30]/50/50 transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-[#141E30]/50/60">
                            <span class="relative z-10 flex items-center gap-2">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Add Task
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Search, Filter & Export Section -->
        <div class="mb-6 rounded-2xl bg-white/80 backdrop-blur-xl shadow-2xl dark:bg-slate-800/80">
            <div class="border-b border-slate-200/50 p-6 dark:border-slate-700/50">
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Tasks List</h2>
                    <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Manage all your tasks</p>
                </div>
            </div>
            <!-- Search and Filter Bar with Dark Blue-Grey Background -->
            <div class="p-6" style="background: linear-gradient(135deg, #1e293b 0%, #334155 50%, #475569 100%);">
                <form id="searchForm" method="GET" action="{{ route('tasks.index') }}" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Search Section -->
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-sm font-bold text-white">
                            <svg class="h-4 w-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            Search
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or email" class="w-full rounded-xl pl-10 pr-4 py-3.5 text-sm text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 shadow-lg hover:shadow-xl" style="background: rgba(30, 41, 59, 0.9); border: 1px solid rgba(100, 116, 139, 0.3); backdrop-filter: blur(10px);">
                            @if(request('search'))
                                <button type="button" onclick="document.querySelector('input[name=search]').value=''; document.getElementById('searchForm').submit();" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <svg class="h-5 w-5 text-slate-400 hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            @endif
                        </div>
                    </div>
                    <!-- Filter by Event Section -->
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-sm font-bold text-white">
                            <svg class="h-4 w-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            Filter by Event
                        </label>
                        <div class="relative">
                            <select name="event_id" form="searchForm" class="w-full rounded-xl px-4 py-3.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 appearance-none pr-10 shadow-lg hover:shadow-xl cursor-pointer" style="background: rgba(30, 41, 59, 0.9); border: 1px solid rgba(100, 116, 139, 0.3); backdrop-filter: blur(10px); background-image: url('data:image/svg+xml;charset=UTF-8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2212%22 height=%228%22 viewBox=%220 0 12 8%22 fill=%22none%22%3E%3Cpath d=%22M1 1L6 6L11 1%22 stroke=%22%23cbd5e1%22 stroke-width=%222%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22/%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 12px center;">
                                <option value="" style="background: #1e293b; color: white;">All Events</option>
                                <option value="unassigned" {{ request('event_id') == 'unassigned' ? 'selected' : '' }} style="background: #1e293b; color: white;">Unassigned</option>
                                @foreach($events ?? [] as $event)
                                    <option value="{{ $event->id }}" {{ request('event_id') == $event->id ? 'selected' : '' }} style="background: #1e293b; color: white;">{{ $event->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
                <!-- Action Buttons -->
                <div class="flex items-center gap-3 mt-6 flex-wrap">
                    <button type="submit" form="searchForm" class="group flex items-center gap-2 px-6 py-3 rounded-xl bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white text-sm font-semibold transition-all duration-200 shadow-lg hover:shadow-xl hover:scale-105 active:scale-95">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        Apply Filters
                    </button>
                    <a href="{{ route('tasks.index') }}" class="group flex items-center gap-2 px-6 py-3 rounded-xl border-2 border-slate-400/50 hover:border-slate-300 hover:bg-slate-700/30 text-white text-sm font-semibold transition-all duration-200 backdrop-blur-sm" style="background: rgba(30, 41, 59, 0.5);">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Clear
                    </a>
                    <a href="{{ route('tasks.export.pdf', request()->query()) }}" class="ml-auto group flex items-center gap-2 px-5 py-3 rounded-xl bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white text-sm font-semibold transition-all duration-200 shadow-lg hover:shadow-xl hover:scale-105 active:scale-95" title="Export to PDF">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Export PDF
                    </a>
                </div>
            </div>
        </div>

        <!-- Tasks List Table -->
        <div class="rounded-2xl bg-white/80 backdrop-blur-xl shadow-2xl dark:bg-slate-800/80 border border-slate-200/50 dark:border-slate-700/50 animate-fade-in">
            <div class="border-b border-slate-200/50 p-6 dark:border-slate-700/50 bg-gradient-to-r from-slate-50/50 to-transparent dark:from-slate-800/50">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                        <svg class="h-5 w-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Tasks List
                    </h2>
                    <span class="inline-flex items-center gap-2 rounded-full bg-purple-100 px-4 py-2 text-xs font-semibold text-purple-700 dark:bg-purple-900/30 dark:text-purple-300 shadow-sm">
                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        {{ $tasks->total() }} Total
                    </span>
                </div>
            </div>
            <div class="overflow-x-auto p-6 custom-scrollbar">
                <table class="w-full">
                    <thead>
                        <tr class="border-b-2 border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/50">
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Photo</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Description</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Assigned To</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Due Date</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Event</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Event Count</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                        @forelse($tasks as $task)
                        <tr class="group transition-smooth hover:bg-slate-50/50 dark:hover:bg-slate-700/30 hover:shadow-sm animate-fade-in">
                            <td class="px-6 py-4">
                                @if($task->photo)
                                    <img src="{{ Storage::url($task->photo) }}" alt="{{ $task->assigned_to }}" class="h-10 w-10 rounded-full object-cover">
                                @else
                                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-[#141E30] to-[#35577D] text-xs font-bold text-white">
                                        {{ strtoupper(substr($task->assigned_to, 0, 2)) }}
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="max-w-md font-medium text-slate-900 dark:text-white">{{ $task->description }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="text-sm font-medium text-slate-700 dark:text-slate-300">{{ $task->assigned_to }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-sm text-slate-600 dark:text-slate-400">{{ $task->due_date ? $task->due_date->format('M d, Y') : 'N/A' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if($task->event)
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-800 dark:bg-blue-900/30 dark:text-blue-300">
                                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ $task->event->title }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600 dark:bg-slate-700 dark:text-slate-400">
                                        N/A
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1 rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-700 dark:bg-purple-900/30 dark:text-purple-300">
                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                    {{ $task->event_count }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <button onclick="openEditTaskModal({{ $task->id }}, '{{ addslashes($task->description) }}', '{{ addslashes($task->assigned_to) }}', '{{ $task->due_date ? $task->due_date->format('Y-m-d') : '' }}', {{ $task->event_id ?? 'null' }})" class="group flex items-center gap-1.5 rounded-lg bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-700 transition-smooth hover:bg-blue-100 hover:shadow-md hover:scale-105 dark:bg-blue-900/30 dark:text-blue-300 dark:hover:bg-blue-900/50 btn-press">
                                        <svg class="h-3.5 w-3.5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </button>
                                    <button onclick="openDeleteTaskModal({{ $task->id }}, '{{ addslashes($task->description) }}', '{{ route('tasks.destroy', $task) }}')" class="group flex items-center gap-1.5 rounded-lg bg-gradient-to-r from-red-50 to-rose-50 px-3 py-2 text-xs font-semibold text-red-700 transition-smooth hover:from-red-100 hover:to-rose-100 hover:shadow-md hover:scale-105 dark:from-red-900/30 dark:to-rose-900/30 dark:text-red-300 dark:hover:from-red-900/50 dark:hover:to-rose-900/50 btn-press">
                                        <svg class="h-3.5 w-3.5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="mx-auto max-w-sm">
                                    <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                    <p class="mt-4 text-sm font-medium text-slate-900 dark:text-white">No tasks found</p>
                                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Get started by creating a new task above</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            @if($tasks->hasPages())
                <div class="border-t border-slate-200/50 p-4 sm:p-6 dark:border-slate-700/50">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 text-center sm:text-left">
                            Showing <span class="font-semibold text-slate-900 dark:text-white">{{ $tasks->firstItem() }}</span> to 
                            <span class="font-semibold text-slate-900 dark:text-white">{{ $tasks->lastItem() }}</span> of 
                            <span class="font-semibold text-slate-900 dark:text-white">{{ $tasks->total() }}</span> tasks
                        </div>
                        <div class="flex items-center gap-1 sm:gap-2 flex-wrap justify-center">
                            @if ($tasks->onFirstPage())
                                <span class="flex items-center justify-center rounded-lg border border-slate-300 bg-slate-100 px-3 sm:px-4 py-2 text-xs sm:text-sm font-semibold text-slate-400 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-500 cursor-not-allowed">
                                    <svg class="mr-1 sm:mr-2 h-3 w-3 sm:h-4 sm:w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                    <span class="hidden sm:inline">Previous</span>
                                    <span class="sm:hidden">Prev</span>
                                </span>
                            @else
                                <a href="{{ $tasks->previousPageUrl() }}" class="flex items-center justify-center rounded-lg border border-slate-300 bg-white px-3 sm:px-4 py-2 text-xs sm:text-sm font-semibold text-slate-700 transition-all hover:bg-blue-50 hover:border-blue-300 hover:text-blue-700 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-blue-900/20 dark:hover:border-blue-500 dark:hover:text-blue-300">
                                    <svg class="mr-1 sm:mr-2 h-3 w-3 sm:h-4 sm:w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                    <span class="hidden sm:inline">Previous</span>
                                    <span class="sm:hidden">Prev</span>
                                </a>
                            @endif

                            @php
                                $currentPage = $tasks->currentPage();
                                $lastPage = $tasks->lastPage();
                                $startPage = max(1, $currentPage - 2);
                                $endPage = min($lastPage, $currentPage + 2);
                            @endphp

                            @if($startPage > 1)
                                <a href="{{ $tasks->url(1) }}" class="flex items-center justify-center rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition-all hover:bg-blue-50 hover:border-blue-300 hover:text-blue-700 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-blue-900/20 dark:hover:border-blue-500 dark:hover:text-blue-300">
                                    1
                                </a>
                                @if($startPage > 2)
                                    <span class="px-2 text-slate-400">...</span>
                                @endif
                            @endif

                            @foreach ($tasks->getUrlRange($startPage, $endPage) as $page => $url)
                                @if ($page == $currentPage)
                                    <span class="flex items-center justify-center rounded-lg bg-gradient-to-r from-[#141E30] to-[#35577D] px-3 sm:px-4 py-2 text-xs sm:text-sm font-semibold text-white shadow-lg shadow-blue-500/50">
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
                                <a href="{{ $tasks->url($lastPage) }}" class="flex items-center justify-center rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition-all hover:bg-blue-50 hover:border-blue-300 hover:text-blue-700 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-blue-900/20 dark:hover:border-blue-500 dark:hover:text-blue-300">
                                    {{ $lastPage }}
                                </a>
                            @endif

                            @if ($tasks->hasMorePages())
                                <a href="{{ $tasks->nextPageUrl() }}" class="flex items-center justify-center rounded-lg border border-slate-300 bg-white px-3 sm:px-4 py-2 text-xs sm:text-sm font-semibold text-slate-700 transition-all hover:bg-blue-50 hover:border-blue-300 hover:text-blue-700 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-blue-900/20 dark:hover:border-blue-500 dark:hover:text-blue-300">
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

    <!-- Delete Task Confirmation Modal -->
    <div id="deleteTaskModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
        <div class="relative w-full max-w-md rounded-2xl bg-white p-8 shadow-2xl dark:bg-slate-800">
            <div class="text-center">
                <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-red-100 dark:bg-red-900/30">
                    <svg class="h-8 w-8 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h3 class="mb-2 text-2xl font-bold text-slate-900 dark:text-white">Delete Task</h3>
                <p class="mb-1 text-sm font-semibold text-slate-700 dark:text-slate-300">Are you sure you want to delete this task?</p>
                <p class="mb-6 rounded-lg bg-slate-100 p-3 text-sm text-slate-600 dark:bg-slate-700 dark:text-slate-400" id="deleteTaskDescription"></p>
                <p class="mb-6 text-xs text-slate-500 dark:text-slate-400">This action cannot be undone.</p>
                <form id="deleteTaskForm" method="POST" class="flex justify-center gap-3">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="closeDeleteTaskModal()" class="rounded-xl border border-slate-300 bg-white px-6 py-2.5 text-sm font-semibold text-slate-700 transition-all hover:bg-slate-50 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-300 dark:hover:bg-slate-600">
                        Cancel
                    </button>
                    <button type="submit" class="group flex items-center gap-2 rounded-xl bg-gradient-to-r from-red-600 to-rose-600 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-red-500/50 transition-all hover:shadow-xl hover:shadow-red-500/60">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Delete Task
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Task Modal -->
    <div id="editTaskModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
        <div class="relative w-full max-w-lg rounded-2xl bg-white p-8 shadow-2xl dark:bg-slate-800">
            <div class="mb-6">
                <h3 class="text-2xl font-bold text-slate-900 dark:text-white">Edit Task</h3>
                <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Update task information</p>
            </div>
            <form id="editTaskForm" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                @method('PUT')
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Description</label>
                    <textarea id="edit_description" name="description" rows="3" required class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-purple-500 focus:outline-none focus:ring-4 focus:ring-purple-500/20 dark:border-slate-600 dark:bg-slate-700 dark:text-white"></textarea>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Assigned To</label>
                    <input type="text" id="edit_assigned_to" name="assigned_to" required class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-purple-500 focus:outline-none focus:ring-4 focus:ring-purple-500/20 dark:border-slate-600 dark:bg-slate-700 dark:text-white">
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Due Date</label>
                    <input type="date" id="edit_due_date" name="due_date" required class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-purple-500 focus:outline-none focus:ring-4 focus:ring-purple-500/20 dark:border-slate-600 dark:bg-slate-700 dark:text-white">
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Photo (Optional)</label>
                    <input type="file" id="edit_photo" name="photo" accept="image/jpeg,image/jpg,image/png" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-purple-500 focus:outline-none focus:ring-4 focus:ring-purple-500/20 dark:border-slate-600 dark:bg-slate-700 dark:text-white">
                    <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">JPG/PNG only, max 2MB</p>
                </div>
                <div class="flex justify-end gap-3 pt-4">
                    <button type="button" onclick="closeEditTaskModal()" class="rounded-xl border border-slate-300 bg-white px-6 py-2.5 text-sm font-semibold text-slate-700 transition-all hover:bg-slate-50 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-300 dark:hover:bg-slate-600">
                        Cancel
                    </button>
                    <button type="submit" class="rounded-xl bg-gradient-to-r from-[#141E30] to-[#35577D] px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-[#141E30]/50/50 transition-all hover:shadow-xl hover:shadow-[#141E30]/50/60">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditTaskModal(id, description, assignedTo, dueDate) {
            document.getElementById('editTaskForm').action = `/tasks/${id}`;
            document.getElementById('edit_description').value = description;
            document.getElementById('edit_assigned_to').value = assignedTo;
            document.getElementById('edit_due_date').value = dueDate;
            document.getElementById('editTaskModal').classList.remove('hidden');
            document.getElementById('editTaskModal').classList.add('flex');
        }

        function closeEditTaskModal() {
            document.getElementById('editTaskModal').classList.add('hidden');
            document.getElementById('editTaskModal').classList.remove('flex');
        }

        document.getElementById('editTaskModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeEditTaskModal();
            }
        });

        // Delete Task Modal Functions
        function openDeleteTaskModal(id, description, deleteUrl) {
            document.getElementById('deleteTaskForm').action = deleteUrl;
            document.getElementById('deleteTaskDescription').textContent = description;
            document.getElementById('deleteTaskModal').classList.remove('hidden');
            document.getElementById('deleteTaskModal').classList.add('flex');
        }

        function closeDeleteTaskModal() {
            document.getElementById('deleteTaskModal').classList.add('hidden');
            document.getElementById('deleteTaskModal').classList.remove('flex');
        }

        document.getElementById('deleteTaskModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteTaskModal();
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

        // Handle Enter key in search input
        document.addEventListener('DOMContentLoaded', function() {
            const searchForm = document.getElementById('searchForm');
            const searchInput = document.querySelector('input[name="search"]');
            
            if (searchInput && searchForm) {
                searchInput.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        searchForm.submit();
                    }
                });
            }

            // Auto-dismiss toasts after 5 seconds
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
