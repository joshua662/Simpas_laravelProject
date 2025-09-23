<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
        <style>
            body { font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; background: linear-gradient(135deg,#fff7ed,#fffbeb); color:#1f2937; }
            .auth-card { max-width:800px; margin:40px auto; background:rgba(255,255,255,0.9); border-radius:12px; padding:28px; box-shadow:0 10px 30px rgba(2,6,23,0.08); }
        </style>
    </head>
    <body class="min-h-screen antialiased">
        <div class="p-6 md:p-10">
            <div class="auth-card">
                <div class="flex w-full max-w-sm mx-auto flex-col gap-2">
                    <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
                        <span class="flex h-9 w-9 mb-1 items-center justify-center rounded-md">
                            <x-app-logo-icon class="size-9 fill-current text-black" />
                        </span>
                        <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                    </a>
                    <div class="flex flex-col gap-6">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
