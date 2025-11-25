<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Event & Task Manager - Organize Your Events and Tasks</title>
        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen antialiased" style="background: linear-gradient(to bottom right, #141E30, #35577D);">
        <!-- Navigation -->
        <nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border-b border-slate-200/50 dark:border-slate-700/50 shadow-sm">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-[#141E30] to-[#35577D] shadow-lg shadow-[#141E30]/50/30">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-slate-900 dark:text-white">Event Manager</span>
                    </div>
                    <div class="flex items-center gap-4">
                        @auth
                            <a href="{{ route('dashboard') }}" class="px-5 py-2 rounded-xl bg-gradient-to-r from-[#141E30] to-[#35577D] text-white font-semibold shadow-lg shadow-[#141E30]/50/50 transition-all hover:scale-105 hover:shadow-xl hover:shadow-[#141E30]/50/60">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-5 py-2 rounded-xl border border-slate-300 dark:border-slate-600 text-slate-700 dark:text-slate-300 font-medium transition-all hover:bg-slate-100 dark:hover:bg-slate-800">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-5 py-2 rounded-xl bg-gradient-to-r from-[#141E30] to-[#35577D] text-white font-semibold shadow-lg shadow-[#141E30]/50/50 transition-all hover:scale-105 hover:shadow-xl hover:shadow-[#141E30]/50/60">
                                    Get Started
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="relative pt-32 pb-20 px-6 lg:px-8 overflow-hidden">
            <!-- Animated Background Elements -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute top-20 left-10 h-72 w-72 rounded-full bg-blue-400/20 blur-3xl animate-pulse"></div>
                <div class="absolute top-40 right-20 h-96 w-96 rounded-full bg-indigo-400/20 blur-3xl animate-pulse delay-300"></div>
                <div class="absolute bottom-20 left-1/2 h-80 w-80 rounded-full bg-blue-300/20 blur-3xl animate-pulse delay-700"></div>
            </div>
            
            <div class="max-w-7xl mx-auto relative z-10">
                <div class="text-center mb-16">
                    <!-- Badge -->
                    <div class="inline-flex items-center gap-2 rounded-full bg-blue-100 dark:bg-blue-900/30 px-4 py-2 mb-6">
                        <span class="h-2 w-2 rounded-full bg-blue-600 dark:bg-blue-400 animate-pulse"></span>
                        <span class="text-sm font-semibold text-blue-700 dark:text-blue-300">Event & Task Management Platform</span>
                    </div>
                    
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-slate-900 dark:text-white mb-6 leading-tight">
                        Organize Your
                        <span class="bg-gradient-to-r from-[#141E30] to-[#35577D] bg-clip-text text-transparent">Events & Tasks</span>
                        <br>Like Never Before
                    </h1>
                    <p class="text-xl md:text-2xl text-slate-600 dark:text-slate-400 mb-8 max-w-3xl mx-auto leading-relaxed">
                        Streamline your event planning and task management with our powerful, intuitive platform. 
                        Keep everything organized, track progress, and never miss a deadline.
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        @auth
                            <a href="{{ route('dashboard') }}" class="group relative overflow-hidden rounded-xl bg-gradient-to-r from-[#141E30] to-[#35577D] px-8 py-4 font-semibold text-white shadow-lg shadow-[#141E30]/50/50 transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-[#141E30]/50/60">
                                <span class="relative z-10 flex items-center gap-2">
                                    Go to Dashboard
                                    <svg class="h-5 w-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </span>
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="group relative overflow-hidden rounded-xl bg-gradient-to-r from-[#141E30] to-[#35577D] px-8 py-4 font-semibold text-white shadow-lg shadow-[#141E30]/50/50 transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-[#141E30]/50/60">
                                <span class="relative z-10 flex items-center gap-2">
                                    Get Started Free
                                    <svg class="h-5 w-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </span>
                            </a>
                            <a href="{{ route('login') }}" class="px-8 py-4 rounded-xl border-2 border-slate-300 dark:border-slate-600 text-slate-700 dark:text-slate-300 font-semibold transition-all hover:bg-slate-100 dark:hover:bg-slate-800 hover:border-blue-300 dark:hover:border-blue-500">
                                Sign In
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Feature Cards with Dashboard Colors -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-20">
                    <!-- Event Management Card -->
                    <div class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-[#141E30] to-[#35577D] p-8 shadow-xl shadow-[#141E30]/50/25 transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-[#141E30]/50/40">
                        <div class="absolute right-0 top-0 h-32 w-32 -translate-y-8 translate-x-8 rounded-full bg-white/10"></div>
                        <div class="relative z-10">
                            <div class="mb-4 flex items-center justify-between">
                                <div class="rounded-xl bg-white/20 p-3 backdrop-blur-sm">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-3">Event Management</h3>
                            <p class="text-blue-100 leading-relaxed mb-4">
                                Create, organize, and track all your events in one place. Set dates, locations, and statuses with ease.
                            </p>
                            <div class="flex items-center gap-2 text-sm text-blue-100">
                                <span>Learn more</span>
                                <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Task Management Card -->
                    <div class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-emerald-500 via-teal-600 to-cyan-600 p-8 shadow-xl shadow-emerald-500/25 transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-emerald-500/40">
                        <div class="absolute right-0 top-0 h-32 w-32 -translate-y-8 translate-x-8 rounded-full bg-white/10"></div>
                        <div class="relative z-10">
                            <div class="mb-4 flex items-center justify-between">
                                <div class="rounded-xl bg-white/20 p-3 backdrop-blur-sm">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                    </svg>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-3">Task Management</h3>
                            <p class="text-emerald-100 leading-relaxed mb-4">
                                Assign tasks, set due dates, and link them to events. Track progress and never miss a deadline.
                            </p>
                            <div class="flex items-center gap-2 text-sm text-emerald-100">
                                <span>Learn more</span>
                                <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Real-time Tracking Card -->
                    <div class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-[#141E30] to-[#35577D] p-8 shadow-xl shadow-[#141E30]/50/25 transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-[#141E30]/50/40">
                        <div class="absolute right-0 top-0 h-32 w-32 -translate-y-8 translate-x-8 rounded-full bg-white/10"></div>
                        <div class="relative z-10">
                            <div class="mb-4 flex items-center justify-between">
                                <div class="rounded-xl bg-white/20 p-3 backdrop-blur-sm">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-3">Real-time Tracking</h3>
                            <p class="text-indigo-100 leading-relaxed mb-4">
                                Monitor active tasks, completion rates, and overdue items. Get insights at a glance with beautiful dashboards.
                            </p>
                            <div class="flex items-center gap-2 text-sm text-indigo-100">
                                <span>Learn more</span>
                                <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Section -->
                <div class="mt-32 grid md:grid-cols-3 gap-6">
                    <div class="text-center p-6 rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl shadow-xl border border-slate-200/50 dark:border-slate-700/50">
                        <div class="text-4xl font-bold bg-gradient-to-r from-[#141E30] to-[#35577D] bg-clip-text text-transparent mb-2">100%</div>
                        <p class="text-slate-600 dark:text-slate-400 font-medium">Uptime Guarantee</p>
                    </div>
                    <div class="text-center p-6 rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl shadow-xl border border-slate-200/50 dark:border-slate-700/50">
                        <div class="text-4xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent mb-2">24/7</div>
                        <p class="text-slate-600 dark:text-slate-400 font-medium">Support Available</p>
                    </div>
                    <div class="text-center p-6 rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl shadow-xl border border-slate-200/50 dark:border-slate-700/50">
                        <div class="text-4xl font-bold bg-gradient-to-r from-[#141E30] to-[#35577D] bg-clip-text text-transparent mb-2">∞</div>
                        <p class="text-slate-600 dark:text-slate-400 font-medium">Unlimited Events</p>
                    </div>
                </div>

                <!-- Additional Features Section -->
                <div class="mt-32 rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl p-12 shadow-xl border border-slate-200/50 dark:border-slate-700/50">
                    <div class="text-center mb-12">
                        <h2 class="text-4xl font-bold text-slate-900 dark:text-white mb-4">Everything You Need</h2>
                        <p class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
                            Powerful features designed to make event and task management effortless
                        </p>
                    </div>
                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                        <div class="text-center group">
                            <div class="inline-flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-[#141E30] to-[#35577D] shadow-lg shadow-[#141E30]/50/30 mb-4 transition-transform group-hover:scale-110">
                                <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                            <h3 class="font-semibold text-slate-900 dark:text-white mb-2">Easy Creation</h3>
                            <p class="text-sm text-slate-600 dark:text-slate-400">Quickly create events and tasks with intuitive forms</p>
                        </div>
                        <div class="text-center group">
                            <div class="inline-flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 shadow-lg shadow-emerald-500/30 mb-4 transition-transform group-hover:scale-110">
                                <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h3 class="font-semibold text-slate-900 dark:text-white mb-2">Fast & Responsive</h3>
                            <p class="text-sm text-slate-600 dark:text-slate-400">Lightning-fast performance with modern technology</p>
                        </div>
                        <div class="text-center group">
                            <div class="inline-flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-[#141E30] to-[#35577D] shadow-lg shadow-[#141E30]/50/30 mb-4 transition-transform group-hover:scale-110">
                                <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <h3 class="font-semibold text-slate-900 dark:text-white mb-2">Secure & Reliable</h3>
                            <p class="text-sm text-slate-600 dark:text-slate-400">Your data is safe with enterprise-grade security</p>
                        </div>
                        <div class="text-center group">
                            <div class="inline-flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-amber-500 via-orange-600 to-yellow-600 shadow-lg shadow-amber-500/30 mb-4 transition-transform group-hover:scale-110">
                                <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                </svg>
                            </div>
                            <h3 class="font-semibold text-slate-900 dark:text-white mb-2">Beautiful Design</h3>
                            <p class="text-sm text-slate-600 dark:text-slate-400">Modern, clean interface that's a joy to use</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="border-t border-slate-200/50 dark:border-slate-700/50 bg-white/50 dark:bg-slate-900/50 backdrop-blur-xl py-12 px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="text-center">
                    <div class="flex items-center justify-center gap-3 mb-4">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-[#141E30] to-[#35577D] shadow-lg shadow-[#141E30]/50/30">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-slate-900 dark:text-white">Event Manager</span>
                    </div>
                    <p class="text-slate-600 dark:text-slate-400 mb-6">
                        Built with Laravel. Organize your events and tasks effortlessly.
                    </p>
                    <div class="flex items-center justify-center gap-6 text-sm text-slate-500 dark:text-slate-400">
                        <span>&copy; {{ date('Y') }} Event Manager. All rights reserved.</span>
                    </div>
                </div>
            </div>
        </footer>

        <style>
            @keyframes pulse {
                0%, 100% {
                    opacity: 1;
                }
                50% {
                    opacity: 0.5;
                }
            }
            .animate-pulse {
                animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
            }
            .delay-300 {
                animation-delay: 0.3s;
            }
            .delay-700 {
                animation-delay: 0.7s;
            }
        </style>
    </body>
</html>
