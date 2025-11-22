<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
        <style>
            body { 
                font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; 
            }
        </style>
    </head>
    <body class="min-h-screen antialiased bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900">
        <!-- Animated Background Elements -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-300/30 dark:bg-blue-500/20 rounded-full mix-blend-multiply filter blur-xl opacity-40 animate-blob"></div>
            <div class="absolute top-40 right-10 w-72 h-72 bg-indigo-300/30 dark:bg-indigo-500/20 rounded-full mix-blend-multiply filter blur-xl opacity-40 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-1/2 w-72 h-72 bg-purple-300/30 dark:bg-purple-500/20 rounded-full mix-blend-multiply filter blur-xl opacity-40 animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative p-6 md:p-10 min-h-screen flex items-center justify-center">
            <div class="w-full max-w-md">
                <div class="relative overflow-hidden rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl shadow-2xl border border-slate-200/50 dark:border-slate-700/50 p-8 md:p-10">
                    <!-- Decorative Background Elements -->
                    <div class="absolute right-0 top-0 h-32 w-32 -translate-y-8 translate-x-8 rounded-full bg-gradient-to-br from-blue-500/10 to-indigo-500/10"></div>
                    <div class="absolute bottom-0 left-0 h-24 w-24 translate-y-6 -translate-x-6 rounded-full bg-gradient-to-br from-purple-500/10 to-pink-500/10"></div>
                    
                    <div class="relative z-10 flex w-full mx-auto flex-col gap-6">
                        <a href="{{ route('home') }}" class="flex flex-col items-center gap-3 font-medium group" wire:navigate>
                            <span class="flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 via-indigo-600 to-purple-600 shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">
                                <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <div class="text-center">
                                <div class="font-bold text-lg text-slate-900 dark:text-white">Event Manager</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400">Management System</div>
                            </div>
                            <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                        </a>
                        <div class="flex flex-col gap-6">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <style>
            @keyframes blob {
                0% { transform: translate(0px, 0px) scale(1); }
                33% { transform: translate(30px, -50px) scale(1.1); }
                66% { transform: translate(-20px, 20px) scale(0.9); }
                100% { transform: translate(0px, 0px) scale(1); }
            }
            .animate-blob {
                animation: blob 7s infinite;
            }
            .animation-delay-2000 {
                animation-delay: 2s;
            }
            .animation-delay-4000 {
                animation-delay: 4s;
            }
        </style>
        @fluxScripts
    </body>
</html>
