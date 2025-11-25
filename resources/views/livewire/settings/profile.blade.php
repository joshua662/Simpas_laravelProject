<x-settings.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">
    <form wire:submit="updateProfileInformation" class="space-y-6">
        <!-- Name Field -->
        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Name</label>
            <input wire:model="name" type="text" required autofocus autocomplete="name" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-500/20 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-400">
            @error('name')
                <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Field -->
        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Email</label>
            <input wire:model="email" type="email" required autocomplete="email" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-500/20 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:focus:border-blue-400">
            @error('email')
                <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                <div class="mt-4 rounded-xl bg-yellow-50 p-4 dark:bg-yellow-900/20">
                    <p class="text-sm text-yellow-800 dark:text-yellow-300">
                        {{ __('Your email address is unverified.') }}
                    </p>
                    <button wire:click.prevent="resendVerificationNotification" class="mt-2 text-sm font-semibold text-yellow-700 underline transition-colors hover:text-yellow-800 dark:text-yellow-400 dark:hover:text-yellow-300">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Save Button -->
        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="group relative overflow-hidden rounded-xl bg-gradient-to-r from-[#141E30] to-[#35577D] px-8 py-3 font-semibold text-white shadow-lg shadow-[#141E30]/50/50 transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-[#141E30]/50/60">
                <span class="relative z-10 flex items-center gap-2">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Save Changes
                </span>
            </button>

            <x-action-message class="text-sm font-medium text-green-600 dark:text-green-400" on="profile-updated">
                <div class="flex items-center gap-2">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ __('Saved.') }}
                </div>
            </x-action-message>
        </div>
    </form>

    <!-- Delete Account Section -->
    <div class="mt-12 border-t border-slate-200 pt-8 dark:border-slate-700">
        <div class="mb-4">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white">Delete Account</h3>
            <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">Delete your account and all of its resources</p>
        </div>
        <livewire:settings.delete-user-form />
    </div>
</x-settings.layout>
