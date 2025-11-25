@props([
    'title',
    'description',
])

<div class="flex w-full flex-col text-center mb-2">
    <h1 class="text-3xl sm:text-4xl font-bold bg-gradient-to-r from-[#141E30] to-[#35577D] bg-clip-text text-transparent mb-2">
        {{ $title }}
    </h1>
    <p class="text-sm sm:text-base text-slate-600 dark:text-slate-400 font-medium">
        {{ $description }}
    </p>
</div>
