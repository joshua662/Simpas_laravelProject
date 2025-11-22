<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 p-4 md:p-6">
    <div class="mx-auto max-w-6xl">
        <!-- Settings Header -->
        <div class="mb-8">
            <h1 class="mb-2 text-4xl font-bold text-slate-900 dark:text-white">Settings</h1>
            <p class="text-slate-600 dark:text-slate-400">Manage your profile and account settings</p>
        </div>

        <div class="flex flex-col gap-6 lg:flex-row">
            <!-- Settings Sidebar Navigation -->
            <div class="w-full lg:w-64">
                <div class="rounded-2xl bg-white/80 backdrop-blur-xl p-4 shadow-xl dark:bg-slate-800/80">
                    <nav class="space-y-2">
                        <a href="{{ route('settings.profile') }}" class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition-all {{ request()->routeIs('settings.profile') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-700' }}" wire:navigate>
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Profile
                        </a>
                        <a href="{{ route('settings.password') }}" class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition-all {{ request()->routeIs('settings.password') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-700' }}" wire:navigate>
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                            </svg>
                            Password
                        </a>
                        <a href="{{ route('settings.appearance') }}" class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition-all {{ request()->routeIs('settings.appearance') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-700' }}" wire:navigate>
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                            </svg>
                            Appearance
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Settings Content -->
            <div class="flex-1">
                <div class="rounded-2xl bg-white/80 backdrop-blur-xl p-6 shadow-xl dark:bg-slate-800/80">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-white">{{ $heading ?? '' }}</h2>
                        <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">{{ $subheading ?? '' }}</p>
                    </div>

                    <div class="w-full">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
