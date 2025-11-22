<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Log in to your account')" :description="__('Enter your email and password below to log in')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form method="POST" wire:submit="login" class="flex flex-col gap-5">
        <!-- Email Address -->
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300">
                {{ __('Email address') }}
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <flux:input
                    wire:model="email"
                    type="email"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="email@example.com"
                    class="pl-12 !rounded-xl !border-slate-300 dark:!border-slate-600 focus:!border-blue-500 focus:!ring-blue-500/20 !transition-all"
                />
            </div>
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300">
                {{ __('Password') }}
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <flux:input
                    wire:model="password"
                    type="password"
                    required
                    autocomplete="current-password"
                    :placeholder="__('Password')"
                    viewable
                    class="pl-12 !rounded-xl !border-slate-300 dark:!border-slate-600 focus:!border-blue-500 focus:!ring-blue-500/20 !transition-all"
                />
            </div>
            @if (Route::has('password.request'))
                <div class="flex items-center justify-end">
                    <flux:link class="text-sm font-medium text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 transition-colors" :href="route('password.request')" wire:navigate>
                        {{ __('Forgot your password?') }}
                    </flux:link>
                </div>
            @endif
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <flux:checkbox wire:model="remember" :label="__('Remember me')" />
        </div>

        <div class="flex items-center justify-end pt-2">
            <flux:button 
                variant="primary" 
                type="submit" 
                class="w-full !bg-gradient-to-r !from-blue-500 !via-indigo-600 !to-purple-600 hover:!from-blue-600 hover:!via-indigo-700 hover:!to-purple-700 !text-white !font-semibold !py-3 !rounded-xl !shadow-lg !shadow-blue-500/50 hover:!shadow-xl hover:!shadow-blue-500/60 !transition-all !duration-300 hover:!scale-[1.02] active:!scale-[0.98]"
            >
                <span class="flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    {{ __('Log in') }}
                </span>
            </flux:button>
        </div>
    </form>

    @if (Route::has('register'))
        <div class="pt-4 border-t border-slate-200 dark:border-slate-700">
            <div class="space-x-1 rtl:space-x-reverse text-center text-sm">
                <span class="text-slate-600 dark:text-slate-400">{{ __('Don\'t have an account?') }}</span>
                <flux:link 
                    :href="route('register')" 
                    wire:navigate
                    class="font-semibold text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 transition-colors"
                >
                    {{ __('Sign up') }}
                </flux:link>
            </div>
        </div>
    @endif
</div>
