<!DOCTYPE html>
<html lang="{{ config('hyde.language', 'en') }}" x-data="{ lang: localStorage.getItem('lang') || '{{ config('hyde.language', 'en') }}' }" x-init="document.documentElement.setAttribute('lang', lang)">

<head>
    {{-- Google Fonts - Inter (English) & Kantumruy Pro (Khmer) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Kantumruy+Pro:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    @include('hyde::layouts.head')
    @stack('styles')
</head>

<body id="app"
    class="flex flex-col min-h-screen overflow-x-hidden dark:bg-gray-900 dark:text-white page-transition"
    x-data="{ navigationOpen: false, pageLoading: false }" x-on:keydown.escape="navigationOpen = false">

    <!-- Progress Bar -->
    <div id="progress-bar" class="fixed top-0 left-0 w-full h-1 bg-transparent z-[100] pointer-events-none"
        style="display: none;">
        <div id="progress-bar-fill" class="h-full bg-indigo-600 transition-all duration-300 ease-out"
            style="width: 0%;"></div>
    </div>

    @include('hyde::components.skip-to-content-button')
    @include('components.navigation')

    <main id="main-content" class="flex-grow">
        @yield('content')
    </main>

    @include('components.footer')

    @stack('scripts')

    @php
        // Load translation data for client-side language switching
        $enTranslations = file_exists(resource_path('lang/en/messages.php'))
            ? include resource_path('lang/en/messages.php')
            : [];
        $kmTranslations = file_exists(resource_path('lang/km/messages.php'))
            ? include resource_path('lang/km/messages.php')
            : [];
    @endphp

    {{-- Translation data - must be loaded before JavaScript modules --}}
    <script>
        window.translations = {
            en: @json($enTranslations),
            km: @json($kmTranslations)
        };
    </script>

    @include('hyde::layouts.scripts')
</body>

</html>
