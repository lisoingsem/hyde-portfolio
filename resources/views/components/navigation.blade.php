@php
    $currentLang = 'en'; // Default language for build
    $translations = include resource_path("lang/{$currentLang}/messages.php");
    $profile = include config_path('profile.php');
@endphp

<nav aria-label="Main navigation"
    class="sticky top-0 z-50 bg-white/95 dark:bg-gray-800/95 backdrop-blur-md border-b border-gray-200/50 dark:border-gray-700/50 shadow-sm"
    x-data="{ navigationOpen: false, lang: localStorage.getItem('lang') || 'en' }" x-init="lang = localStorage.getItem('lang') || 'en'" @click.outside="navigationOpen = false"
    @keydown.escape.window="navigationOpen = false">

    {{-- Main Navigation Bar --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-14 md:h-16">
            {{-- Logo/Brand --}}
            <a href="/"
                class="flex items-center gap-2 md:gap-2.5 hover:opacity-80 transition-opacity duration-200 flex-shrink-0">
                @if (isset($profile['image']) && $profile['image'] !== '')
                    @php
                        $imageFile = str_replace('/media/', '', $profile['image']);
                        $imageUrl = \Hyde\Facades\Asset::exists($imageFile)
                            ? \Hyde\Facades\Asset::get('media/' . $imageFile)
                            : $profile['image'];
                    @endphp
                    <img src="{{ $imageUrl }}" alt="{{ $profile['image_alt'] ?? $profile['name'] }}"
                        class="w-8 h-8 md:w-10 md:h-10 rounded-full object-cover object-center border-2 border-indigo-600 dark:border-indigo-400 shadow-sm flex-shrink-0"
                        style="width: 32px; height: 32px; max-width: 40px; max-height: 40px;" loading="eager">
                @endif
                <span
                    class="text-base md:text-lg lg:text-xl font-bold tracking-tight text-gray-900 dark:text-gray-100 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-200">
                    {{ $profile['name'] }}
                </span>
            </a>

            {{-- Desktop Navigation Links --}}
            <div class="hidden md:flex items-center gap-0.5 flex-1 justify-center">
                <a href="/"
                    class="nav-link px-3 py-1.5 text-sm font-medium rounded-lg transition-all duration-200 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400"
                    data-translate="nav.home" data-page="index">{{ $translations['nav.home'] ?? 'Home' }}</a>
                <a href="/about"
                    class="nav-link px-3 py-1.5 text-sm font-medium rounded-lg transition-all duration-200 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400"
                    data-translate="nav.about" data-page="about">{{ $translations['nav.about'] ?? 'About' }}</a>
                <a href="/portfolio"
                    class="nav-link px-3 py-1.5 text-sm font-medium rounded-lg transition-all duration-200 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400"
                    data-translate="nav.portfolio"
                    data-page="portfolio">{{ $translations['nav.portfolio'] ?? 'Portfolio' }}</a>
                <a href="/contact"
                    class="nav-link px-3 py-1.5 text-sm font-medium rounded-lg transition-all duration-200 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400"
                    data-translate="nav.contact" data-page="contact">{{ $translations['nav.contact'] ?? 'Contact' }}</a>
            </div>

            {{-- Right Side Actions --}}
            <div class="flex items-center gap-1.5 md:gap-2 flex-shrink-0">
                {{-- Theme Toggle & Language Switcher (Desktop) --}}
                <div class="hidden md:flex items-center gap-1.5">
                    @include('components.theme-toggle')
                    @include('components.language-switcher')
                </div>

                {{-- Mobile Menu Button --}}
                <button type="button"
                    class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    aria-label="Toggle navigation menu" :aria-expanded="navigationOpen"
                    @click="navigationOpen = !navigationOpen">
                    <svg x-show="!navigationOpen" class="w-6 h-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" x-cloak>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-show="navigationOpen" class="w-6 h-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" x-cloak>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Navigation Modal --}}
    <div x-show="navigationOpen" x-cloak @click.away="navigationOpen = false"
        @keydown.escape.window="navigationOpen = false" class="md:hidden fixed inset-0 z-50">
        {{-- Backdrop --}}
        <div class="fixed inset-0 bg-black/60 backdrop-blur-md" x-transition:enter="transition-opacity duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"></div>

        {{-- Modal --}}
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="w-full max-w-sm bg-white dark:bg-gray-800 rounded-3xl shadow-2xl border border-gray-200/50 dark:border-gray-700/50 overflow-hidden"
                x-transition:enter="transition-all duration-300 ease-out"
                x-transition:enter-start="opacity-0 scale-90 translate-y-4"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition-all duration-200 ease-in"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-90 translate-y-4" @click.stop>

                {{-- Header --}}
                <div
                    class="flex items-center justify-between px-6 py-5 bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-gray-800 dark:to-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white" data-translate="nav.menu">Menu</h2>
                    <button @click="navigationOpen = false"
                        class="p-2 rounded-xl text-gray-600 dark:text-gray-300 hover:bg-white dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-all duration-200 shadow-sm hover:shadow-md">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                {{-- Content --}}
                <div class="max-h-[70vh] overflow-y-auto bg-white dark:bg-gray-800">
                    {{-- Settings --}}
                    <div
                        class="px-6 py-5 border-b border-gray-200 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900/30">
                        <div class="flex items-center justify-center gap-4">
                            @include('components.theme-toggle')
                            @include('components.language-switcher')
                        </div>
                    </div>

                    {{-- Navigation Links --}}
                    <nav class="px-6 py-4 space-y-1">
                        <a href="/"
                            class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors"
                            data-translate="nav.home" data-page="index" @click="navigationOpen = false">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span>{{ $translations['nav.home'] ?? 'Home' }}</span>
                        </a>
                        <a href="/about"
                            class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors"
                            data-translate="nav.about" data-page="about" @click="navigationOpen = false">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span>{{ $translations['nav.about'] ?? 'About' }}</span>
                        </a>
                        <a href="/portfolio"
                            class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors"
                            data-translate="nav.portfolio" data-page="portfolio" @click="navigationOpen = false">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                            <span>{{ $translations['nav.portfolio'] ?? 'Portfolio' }}</span>
                        </a>
                        <a href="/contact"
                            class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors"
                            data-translate="nav.contact" data-page="contact" @click="navigationOpen = false">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span>{{ $translations['nav.contact'] ?? 'Contact' }}</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</nav>
