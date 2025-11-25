<x-settings.layout :heading="__('Update password')" :subheading="__('Ensure your account is using a long, random password to stay secure')">
    <form method="POST" wire:submit="updatePassword" class="space-y-6">
        <!-- Current Password Field -->
        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Current Password</label>
            <input wire:model="current_password" type="password" required autocomplete="current-password" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-500/20 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-400">
            @error('current_password')
                <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- New Password Field -->
        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">New Password</label>
            <input wire:model="password" type="password" required autocomplete="new-password" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-500/20 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-400">
            @error('password')
                <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password Field -->
        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Confirm Password</label>
            <input wire:model="password_confirmation" type="password" required autocomplete="new-password" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-500/20 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-400">
        </div>

        <!-- Password Requirements Info -->
        <div class="rounded-xl bg-blue-50 p-4 dark:bg-blue-900/20">
            <p class="text-sm font-medium text-blue-900 dark:text-blue-300">Password Requirements:</p>
            <ul class="mt-2 space-y-1 text-xs text-blue-800 dark:text-blue-400">
                <li class="flex items-center gap-2">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    At least 8 characters long
                </li>
                <li class="flex items-center gap-2">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Mix of letters, numbers, and symbols
                </li>
            </ul>
        </div>

        <!-- Save Button -->
        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="group relative overflow-hidden rounded-xl bg-gradient-to-r from-[#141E30] to-[#35577D] px-8 py-3 font-semibold text-white shadow-lg shadow-[#141E30]/50/50 transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-[#141E30]/50/60">
                <span class="relative z-10 flex items-center gap-2">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                    Update Password
                </span>
            </button>

            <x-action-message class="text-sm font-medium text-green-600 dark:text-green-400" on="password-updated">
                <div class="flex items-center gap-2">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ __('Saved.') }}
                </div>
            </x-action-message>
        </div>
    </form>
</x-settings.layout>
