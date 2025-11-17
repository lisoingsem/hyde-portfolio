@props(['experience'])

@php
    $translations = isset($translations) ? $translations : include resource_path('lang/en/messages.php');
@endphp

<div
    class="relative pl-8 pb-8 md:pb-10 border-l-2 border-gray-200 dark:border-gray-700 last:border-l-0 last:pb-0 hover:border-indigo-400 dark:hover:border-indigo-500 transition-colors duration-300">
    <div class="timeline-dot"></div>

    <div class="flex items-center justify-between mb-2 flex-wrap gap-2">
        <span
            class="inline-flex items-center gap-2 text-xs md:text-sm font-semibold text-indigo-600 dark:text-indigo-400 uppercase tracking-wide px-2 py-1 bg-indigo-50 dark:bg-indigo-900/20 rounded-md">
            @if (isset($experience['status']) && $experience['status'] === 'current')
                <span class="w-1.5 h-1.5 bg-indigo-600 dark:bg-indigo-400 rounded-full"></span>
                {{ $translations['experience.current'] ?? 'Current' }}
            @else
                {{ $translations['experience.completed'] ?? 'Completed' }}
            @endif
        </span>
        <span class="text-xs md:text-sm text-gray-600 dark:text-gray-400 font-medium">
            {{ $experience['period'] ?? '' }}
        </span>
    </div>

    <h3
        class="text-lg md:text-xl font-bold text-gray-900 dark:text-white mb-2 leading-tight hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-200">
        {{ $experience['title'] ?? '' }}
    </h3>

    <p class="text-base md:text-lg text-gray-700 dark:text-gray-300 font-semibold mb-2 md:mb-3">
        {{ $experience['company'] ?? '' }}
    </p>

    @if (isset($experience['location']))
        <p class="text-sm md:text-base text-gray-600 dark:text-gray-400 mb-3">
            {{ $experience['location'] }}
        </p>
    @endif

    <p class="text-sm md:text-base text-gray-600 dark:text-gray-400 mb-4 leading-relaxed">
        {{ $experience['description'] ?? '' }}
    </p>

    @if (isset($experience['technologies']))
        <div class="flex flex-wrap gap-2">
            @foreach ($experience['technologies'] as $tech)
                <span
                    class="px-3 py-1 text-xs md:text-sm bg-gray-50 dark:bg-gray-700/50 text-gray-700 dark:text-gray-300 rounded-md font-medium border border-gray-200 dark:border-gray-600 transition-all duration-200 hover:border-indigo-300 dark:hover:border-indigo-500 hover:shadow-sm">
                    {{ $tech }}
                </span>
            @endforeach
        </div>
    @endif
</div>
