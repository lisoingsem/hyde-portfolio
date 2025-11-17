@php
    $currentLang = 'en'; // Default language for build
    $translations = include resource_path("lang/{$currentLang}/messages.php");
    $profile = include config_path('profile.php');
@endphp

<nav aria-label="Main navigation"
    class="flex flex-wrap items-center justify-between p-4 shadow-lg sm:shadow-xl md:shadow-none dark:bg-gray-800 sticky top-0 z-50 bg-white backdrop-blur-sm bg-white/95 dark:bg-gray-800/95"
    x-data="{ navigationOpen: false, lang: localStorage.getItem('lang') || 'en' }" x-init="lang = localStorage.getItem('lang') || 'en'">
    <div class="flex grow items-center shrink-0 text-gray-900 dark:text-gray-100">
        <a href="/" class="flex items-center gap-3 hover:opacity-80 transition-opacity duration-200">
            @if (isset($profile['image']) && $profile['image'] !== '')
                <img src="{{ $profile['image'] }}" alt="{{ $profile['image_alt'] ?? $profile['name'] }}"
                    class="w-10 h-10 md:w-12 md:h-12 rounded-full object-cover border-2 border-indigo-600 dark:border-indigo-400 shadow-sm">
            @endif
            <span
                class="text-xl md:text-2xl font-bold tracking-tight hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-200">
                {{ $profile['name'] }}
            </span>
        </a>

        <div class="ml-auto flex items-center gap-2">
            @include('components.theme-toggle')
            @include('components.language-switcher')
        </div>
    </div>

    <div class="block md:hidden">
        <button
            class="flex items-center justify-center w-10 h-10 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            aria-label="Toggle navigation menu" aria-expanded="false" :aria-expanded="navigationOpen"
            @click="navigationOpen = ! navigationOpen">
            <svg x-show="! navigationOpen" title="Open Navigation Menu" class="dark:fill-gray-200 w-6 h-6"
                style="display: block;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
            <svg x-show="navigationOpen" title="Close Navigation Menu" class="dark:fill-gray-200 w-6 h-6"
                style="display: none;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>

    <div class="w-full hidden md:flex grow md:grow-0 md:items-center md:w-auto px-6 -mx-4 border-t mt-3 pt-3 md:border-none md:mt-0 md:py-0 border-gray-200 dark:border-gray-700"
        :class="navigationOpen ? 'block!' : ''">
        <ul aria-label="Navigation links" class="md:grow md:flex justify-end gap-2">
            <li>
                <a href="/"
                    class="nav-link px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400"
                    data-translate="nav.home" data-page="index">{{ $translations['nav.home'] ?? 'Home' }}</a>
            </li>
            <li>
                <a href="/about"
                    class="nav-link px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400"
                    data-translate="nav.about" data-page="about">{{ $translations['nav.about'] ?? 'About' }}</a>
            </li>
            <li>
                <a href="/portfolio"
                    class="nav-link px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400"
                    data-translate="nav.portfolio"
                    data-page="portfolio">{{ $translations['nav.portfolio'] ?? 'Portfolio' }}</a>
            </li>
            <li>
                <a href="/contact"
                    class="nav-link px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400"
                    data-translate="nav.contact" data-page="contact">{{ $translations['nav.contact'] ?? 'Contact' }}</a>
            </li>
        </ul>
    </div>

    <!-- Mobile Navigation -->
    <div x-show="navigationOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform -translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-2"
        class="w-full md:hidden border-t border-gray-200 dark:border-gray-700">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="/"
                class="nav-link block px-3 py-2 text-base font-medium rounded-lg transition-all duration-200 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400"
                data-translate="nav.home" data-page="index"
                @click="navigationOpen = false">{{ $translations['nav.home'] ?? 'Home' }}</a>
            <a href="/about"
                class="nav-link block px-3 py-2 text-base font-medium rounded-lg transition-all duration-200 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400"
                data-translate="nav.about" data-page="about"
                @click="navigationOpen = false">{{ $translations['nav.about'] ?? 'About' }}</a>
            <a href="/portfolio"
                class="nav-link block px-3 py-2 text-base font-medium rounded-lg transition-all duration-200 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400"
                data-translate="nav.portfolio" data-page="portfolio"
                @click="navigationOpen = false">{{ $translations['nav.portfolio'] ?? 'Portfolio' }}</a>
            <a href="/contact"
                class="nav-link block px-3 py-2 text-base font-medium rounded-lg transition-all duration-200 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400"
                data-translate="nav.contact" data-page="contact"
                @click="navigationOpen = false">{{ $translations['nav.contact'] ?? 'Contact' }}</a>
        </div>
    </div>
</nav>
