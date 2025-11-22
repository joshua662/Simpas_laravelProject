<x-settings.layout :heading="__('Appearance')" :subheading="__('Update the appearance settings for your account')">
    <div class="space-y-6">
        <p class="text-sm text-slate-600 dark:text-slate-400">Choose how the application appears to you. You can select a theme or use your system preference.</p>

        <div class="grid gap-4 md:grid-cols-3" x-data="{ appearance: $flux.appearance }">
            <!-- Light Theme -->
            <button @click="$flux.appearance = 'light'; appearance = 'light'" :class="appearance === 'light' ? 'ring-4 ring-blue-500' : ''" class="group relative overflow-hidden rounded-2xl border-2 border-slate-200 bg-gradient-to-br from-white to-slate-50 p-6 text-left transition-all hover:border-blue-300 hover:shadow-lg dark:border-slate-700 dark:from-slate-800 dark:to-slate-900">
                <div class="mb-4 flex items-center justify-between">
                    <div class="rounded-xl bg-yellow-100 p-3 dark:bg-yellow-900/30">
                        <svg class="h-6 w-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div x-show="appearance === 'light'" class="rounded-full bg-blue-500 p-1">
                        <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
                <h3 class="mb-1 text-lg font-bold text-slate-900 dark:text-white">Light</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400">Clean and bright interface</p>
            </button>

            <!-- Dark Theme -->
            <button @click="$flux.appearance = 'dark'; appearance = 'dark'" :class="appearance === 'dark' ? 'ring-4 ring-blue-500' : ''" class="group relative overflow-hidden rounded-2xl border-2 border-slate-200 bg-gradient-to-br from-slate-800 to-slate-900 p-6 text-left transition-all hover:border-blue-300 hover:shadow-lg dark:border-slate-700">
                <div class="mb-4 flex items-center justify-between">
                    <div class="rounded-xl bg-slate-700 p-3">
                        <svg class="h-6 w-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </div>
                    <div x-show="appearance === 'dark'" class="rounded-full bg-blue-500 p-1">
                        <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
                <h3 class="mb-1 text-lg font-bold text-white">Dark</h3>
                <p class="text-sm text-slate-400">Easy on the eyes</p>
            </button>

            <!-- System Theme -->
            <button @click="$flux.appearance = 'system'; appearance = 'system'" :class="appearance === 'system' ? 'ring-4 ring-blue-500' : ''" class="group relative overflow-hidden rounded-2xl border-2 border-slate-200 bg-gradient-to-br from-slate-50 to-slate-100 p-6 text-left transition-all hover:border-blue-300 hover:shadow-lg dark:border-slate-700 dark:from-slate-800 dark:to-slate-700">
                <div class="mb-4 flex items-center justify-between">
                    <div class="rounded-xl bg-slate-200 p-3 dark:bg-slate-600">
                        <svg class="h-6 w-6 text-slate-700 dark:text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div x-show="appearance === 'system'" class="rounded-full bg-blue-500 p-1">
                        <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
                <h3 class="mb-1 text-lg font-bold text-slate-900 dark:text-white">System</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400">Match your device</p>
            </button>
        </div>
    </div>
</x-settings.layout>
