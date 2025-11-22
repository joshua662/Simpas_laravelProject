<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
        <style>
            body { font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; }
        </style>
    </head>
    <body class="min-h-screen">
        <flux:sidebar sticky stashable class="border-e border-slate-200/50 bg-gradient-to-b from-slate-50 via-white to-slate-50 dark:border-slate-700/50 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <!-- Logo/Brand Section -->
            <div class="mb-8 px-4 pt-6">
                <a href="{{ route('dashboard') }}" class="group flex items-center gap-3 rounded-xl p-3 transition-all hover:bg-slate-100 dark:hover:bg-slate-800" wire:navigate>
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 via-indigo-600 to-purple-600 shadow-lg shadow-blue-500/30">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="font-bold text-slate-900 dark:text-white">Event Manager</div>
                        <div class="text-xs text-slate-500 dark:text-slate-400">Management System</div>
                    </div>
                </a>
            </div>

            <!-- Quick Stats Section -->
            @php
                $totalEvents = \App\Models\Event::count();
                $activeTasks = \App\Models\Task::getActiveTasksCount();
            @endphp
            <div class="mb-6 px-4">
                <div class="rounded-xl bg-gradient-to-br from-blue-500/10 via-indigo-500/10 to-purple-500/10 p-4 backdrop-blur-sm dark:from-blue-500/20 dark:via-indigo-500/20 dark:to-purple-500/20">
                    <div class="mb-3 flex items-center justify-between">
                        <span class="text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-400">Quick Stats</span>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="h-2 w-2 rounded-full bg-blue-500"></div>
                                <span class="text-sm text-slate-700 dark:text-slate-300">Events</span>
                            </div>
                            <span class="text-sm font-bold text-slate-900 dark:text-white">{{ $totalEvents }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="h-2 w-2 rounded-full bg-emerald-500"></div>
                                <span class="text-sm text-slate-700 dark:text-slate-300">Active Tasks</span>
                            </div>
                            <span class="text-sm font-bold text-slate-900 dark:text-white">{{ $activeTasks }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Section -->
            <div class="flex-1 px-4">
                <flux:navlist variant="outline" class="space-y-1">
                    <flux:navlist.group :heading="__('Navigation')" class="mb-4">
                        <flux:navlist.item 
                            icon="home" 
                            :href="route('dashboard')" 
                            :current="request()->routeIs('dashboard')" 
                            wire:navigate
                            class="group relative rounded-xl px-4 py-3 transition-all hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 dark:hover:from-blue-900/20 dark:hover:to-indigo-900/20"
                        >
                            <span class="font-medium">{{ __('Dashboard') }}</span>
                        </flux:navlist.item>
                        
                        <flux:navlist.item 
                            icon="clipboard-document-list" 
                            :href="route('tasks.index')" 
                            :current="request()->routeIs('tasks.*')" 
                            wire:navigate
                            class="group relative rounded-xl px-4 py-3 transition-all hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 dark:hover:from-purple-900/20 dark:hover:to-pink-900/20"
                        >
                            <span class="font-medium">{{ __('Tasks') }}</span>
                        </flux:navlist.item>
                    </flux:navlist.group>
                </flux:navlist>
            </div>

            <flux:spacer />

            <!-- Settings Section -->
            <div class="px-4 pb-4">
                <flux:navlist variant="outline" class="space-y-1">
                    <flux:navlist.group :heading="__('Settings')">
                        <flux:navlist.item 
                            icon="cog-6-tooth" 
                            :href="route('settings.profile')" 
                            :current="request()->routeIs('settings.*')" 
                            wire:navigate
                            class="rounded-xl px-4 py-3 transition-all hover:bg-slate-100 dark:hover:bg-slate-800"
                        >
                            <span class="font-medium">{{ __('Settings') }}</span>
                        </flux:navlist.item>
                    </flux:navlist.group>
                </flux:navlist>
            </div>

            <!-- User Profile Section -->
            <div class="border-t border-slate-200/50 px-4 py-4 dark:border-slate-700/50">
                <flux:dropdown class="w-full" position="top" align="start">
                    <button class="flex w-full items-center gap-3 rounded-xl p-3 transition-all hover:bg-slate-100 dark:hover:bg-slate-800">
                        <div class="relative">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 text-sm font-bold text-white shadow-lg">
                                {{ auth()->user()->initials() }}
                            </div>
                            <div class="absolute bottom-0 right-0 h-3 w-3 rounded-full border-2 border-white bg-green-500 dark:border-slate-800"></div>
                        </div>
                        <div class="flex-1 text-left">
                            <div class="text-sm font-semibold text-slate-900 dark:text-white">{{ auth()->user()->name }}</div>
                            <div class="text-xs text-slate-500 dark:text-slate-400">{{ \Illuminate\Support\Str::limit(auth()->user()->email, 20) }}</div>
                        </div>
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <flux:menu class="w-[240px]">
                        <flux:menu.radio.group>
                            <div class="p-2">
                                <div class="flex items-center gap-3 rounded-lg bg-slate-50 p-3 dark:bg-slate-800/50">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-gradient-to-br from-blue-500 to-indigo-600 text-sm font-bold text-white">
                                        {{ auth()->user()->initials() }}
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-slate-900 dark:text-white">{{ auth()->user()->name }}</div>
                                        <div class="text-xs text-slate-600 dark:text-slate-400">{{ auth()->user()->email }}</div>
                                    </div>
                                </div>
                            </div>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <flux:menu.radio.group>
                            <flux:menu.item :href="route('settings.profile')" icon="user-circle" wire:navigate>
                                {{ __('Profile') }}
                            </flux:menu.item>
                            <flux:menu.item :href="route('settings.password')" icon="key" wire:navigate>
                                {{ __('Password') }}
                            </flux:menu.item>
                            <flux:menu.item :href="route('settings.appearance')" icon="paint-brush" wire:navigate>
                                {{ __('Appearance') }}
                            </flux:menu.item>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full text-red-600 dark:text-red-400">
                                {{ __('Log Out') }}
                            </flux:menu.item>
                        </form>
                    </flux:menu>
                </flux:dropdown>
            </div>
        </flux:sidebar>

        <!-- Mobile Header -->
        <flux:header class="lg:hidden border-b border-slate-200/50 bg-white/80 backdrop-blur-xl dark:border-slate-700/50 dark:bg-slate-900/80">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <a href="{{ route('dashboard') }}" class="ms-2 flex items-center gap-2" wire:navigate>
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-br from-blue-500 to-indigo-600">
                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <span class="font-bold text-slate-900 dark:text-white">Event Manager</span>
            </a>

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <button class="flex items-center gap-2 rounded-lg p-2 transition-all hover:bg-slate-100 dark:hover:bg-slate-800">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-br from-blue-500 to-indigo-600 text-xs font-bold text-white">
                        {{ auth()->user()->initials() }}
                    </div>
                </button>

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-2">
                            <div class="flex items-center gap-3 rounded-lg bg-slate-50 p-3 dark:bg-slate-800/50">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-gradient-to-br from-blue-500 to-indigo-600 text-sm font-bold text-white">
                                    {{ auth()->user()->initials() }}
                                </div>
                                <div class="flex-1">
                                    <div class="font-semibold text-slate-900 dark:text-white">{{ auth()->user()->name }}</div>
                                    <div class="text-xs text-slate-600 dark:text-slate-400">{{ auth()->user()->email }}</div>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('dashboard')" icon="home" wire:navigate>
                            {{ __('Dashboard') }}
                        </flux:menu.item>
                        <flux:menu.item :href="route('tasks.index')" icon="clipboard-document-list" wire:navigate>
                            {{ __('Tasks') }}
                        </flux:menu.item>
                        <flux:menu.item :href="route('settings.profile')" icon="cog-6-tooth" wire:navigate>
                            {{ __('Settings') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full text-red-600 dark:text-red-400">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
