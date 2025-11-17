@props(['project'])

@php
    $translations = isset($translations) ? $translations : include resource_path('lang/en/messages.php');
@endphp

<div
    class="project-card bg-white dark:bg-gray-800 rounded-xl shadow-md border border-gray-100 dark:border-gray-700 overflow-hidden group h-full flex flex-col">
    @if (isset($project['image']))
        <div class="h-48 bg-gray-200 dark:bg-gray-700 relative overflow-hidden">
            <img src="{{ $project['image'] }}" alt="{{ $project['title'] ?? '' }}"
                class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105">
            <div class="project-image-overlay"></div>
        </div>
    @endif

    <div class="p-6 flex-grow flex flex-col">
        <div class="flex items-center justify-between mb-3">
            <span class="text-xs md:text-sm font-semibold text-indigo-600 dark:text-indigo-400 uppercase tracking-wide">
                {{ $project['category'] ?? '' }}
            </span>
            @if (isset($project['status']) && $project['status'] === 'live')
                <span
                    class="inline-flex items-center gap-1.5 text-xs md:text-sm font-semibold text-green-600 dark:text-green-400">
                    <span class="w-2 h-2 bg-green-600 dark:bg-green-400 rounded-full animate-pulse"></span>
                    {{ $translations['portfolio.live'] ?? 'Live' }}
                </span>
            @endif
        </div>

        <h3
            class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white mb-3 leading-tight group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors duration-200">
            {{ $project['title'] ?? '' }}
        </h3>

        <p class="text-sm md:text-base text-gray-600 dark:text-gray-400 mb-4 md:mb-6 flex-grow leading-relaxed">
            {{ $project['description'] ?? '' }}
        </p>

        <div class="flex flex-wrap gap-2 mb-4 md:mb-6">
            @if (isset($project['technologies']))
                @foreach ($project['technologies'] as $tech)
                    <span
                        class="px-3 py-1 text-xs md:text-sm bg-gray-50 dark:bg-gray-700/50 text-gray-700 dark:text-gray-300 rounded-md font-medium border border-gray-200 dark:border-gray-600 transition-colors duration-200 hover:border-indigo-300 dark:hover:border-indigo-500">
                        {{ $tech }}
                    </span>
                @endforeach
            @endif
        </div>

        @if (isset($project['link']))
            <a href="{{ $project['link'] }}" target="_blank" rel="noopener noreferrer"
                class="inline-block text-center px-4 py-2 md:px-6 md:py-3 text-sm md:text-base bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-semibold transition-all duration-200 shadow-sm hover:shadow-md">
                {{ $translations['portfolio.view_project'] ?? 'View Project' }}
            </a>
        @endif
    </div>
</div>
