@php
    $translations = $translations ?? (include resource_path('lang/en/messages.php'));
    $profile = include config_path('profile.php');
@endphp

<x-section class="hero-gradient text-white relative overflow-hidden h-screen flex items-center" padding="none">
    {{-- Background decorative elements --}}
    <div class="absolute inset-0 bg-black/10"></div>

    {{-- Floating background blobs --}}
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-1/4 left-1/4 w-72 h-72 bg-white rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-indigo-300 rounded-full blur-3xl animate-float-slow"
            style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-purple-300 rounded-full blur-3xl animate-float-medium"
            style="animation-delay: 2s; transform: translate(-50%, -50%);"></div>
        <div class="absolute top-3/4 left-1/6 w-80 h-80 bg-blue-300 rounded-full blur-3xl animate-float-fast"
            style="animation-delay: 0.5s;"></div>
    </div>

    {{-- Floating geometric shapes --}}
    <div class="absolute inset-0 opacity-5 pointer-events-none">
        <div class="absolute top-1/3 right-1/4 w-20 h-20 border-2 border-white/30 rounded-lg rotate-45 animate-float-slow"
            style="animation-delay: 0.3s;"></div>
        <div class="absolute bottom-1/3 left-1/4 w-16 h-16 border-2 border-white/30 rounded-full animate-float-medium"
            style="animation-delay: 1.5s;"></div>
        <div class="absolute top-2/3 right-1/3 w-12 h-12 bg-white/20 rounded-lg rotate-12 animate-float-fast"
            style="animation-delay: 0.8s;"></div>
        <div class="absolute top-1/5 right-1/5 w-24 h-24 border-2 border-white/20 rounded-full animate-float"
            style="animation-delay: 2.5s;"></div>
        <div class="absolute bottom-1/5 left-1/5 w-14 h-14 bg-white/15 rounded-lg rotate-45 animate-float-slow"
            style="animation-delay: 1.8s;"></div>
    </div>

    {{-- Floating particles --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="floating-particle" style="left: 10%; top: 20%; animation-delay: 0s;"></div>
        <div class="floating-particle" style="left: 20%; top: 80%; animation-delay: 1s;"></div>
        <div class="floating-particle" style="left: 50%; top: 10%; animation-delay: 2s;"></div>
        <div class="floating-particle" style="left: 70%; top: 60%; animation-delay: 1.5s;"></div>
        <div class="floating-particle" style="left: 90%; top: 30%; animation-delay: 0.5s;"></div>
        <div class="floating-particle" style="left: 30%; top: 50%; animation-delay: 2.5s;"></div>
        <div class="floating-particle" style="left: 80%; top: 90%; animation-delay: 1.2s;"></div>
        <div class="floating-particle" style="left: 5%; top: 70%; animation-delay: 0.8s;"></div>
    </div>

    {{-- Grid pattern overlay --}}
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>

    <x-container class="relative z-10 h-full flex items-center justify-center py-12 md:py-16">
        <div class="text-center w-full max-w-5xl mx-auto px-4">
            {{-- Profile Image --}}
            @if (isset($profile['image']) && $profile['image'] !== '')
                <div class="mb-4 md:mb-6 animate-slide-up">
                    <div class="inline-block relative animate-float-gentle">
                        <div class="absolute inset-0 bg-white/20 rounded-full blur-xl animate-pulse"></div>
                        <img src="{{ $profile['image'] }}" alt="{{ $profile['image_alt'] ?? $profile['name'] }}"
                            class="relative w-24 h-24 md:w-32 md:h-32 lg:w-36 lg:h-36 rounded-full object-cover border-4 border-white/30 shadow-2xl ring-4 ring-white/20 hover:scale-105 transition-transform duration-300">
                    </div>
                </div>
            @endif

            {{-- Greeting --}}
            <p class="text-base md:text-lg lg:text-xl mb-2 md:mb-3 text-white/90 animate-slide-up font-medium tracking-wide"
                data-translate="hero.greeting" style="animation-delay: 0.1s">
                {{ $translations['hero.greeting'] ?? 'Hi, I\'m' }}
            </p>

            {{-- Name --}}
            <h1 class="text-5xl md:text-6xl lg:text-7xl xl:text-8xl 2xl:text-9xl font-extrabold mb-3 md:mb-4 text-white drop-shadow-2xl animate-slide-up leading-[1.1] tracking-tight"
                style="animation-delay: 0.2s">
                <span class="block bg-clip-text text-transparent bg-gradient-to-r from-white via-white to-indigo-100">
                    {{ $profile['name'] }}
                </span>
            </h1>

            {{-- Title --}}
            <div class="mb-5 md:mb-7 animate-slide-up" style="animation-delay: 0.3s">
                <h2 class="text-xl md:text-2xl lg:text-3xl xl:text-4xl font-semibold text-indigo-100 drop-shadow-lg leading-snug inline-block px-5 py-2.5 md:px-6 md:py-3 rounded-lg bg-white/10 backdrop-blur-sm border border-white/20 animate-float-gentle"
                    data-translate="hero.title">
                    {{ $translations['hero.title'] ?? 'Full Stack Developer' }}
                </h2>
            </div>

            {{-- Description - Hero Prominent & Readable --}}
            <p class="text-xl md:text-2xl lg:text-3xl xl:text-4xl mb-8 md:mb-10 max-w-4xl mx-auto text-white drop-shadow-xl leading-relaxed font-normal animate-slide-up px-4"
                style="animation-delay: 0.4s" data-translate="hero.description">
                {{ $translations['hero.description'] ?? 'Passionate about creating exceptional digital experiences through clean code, innovative design, and cutting-edge technologies.' }}
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center animate-slide-up"
                style="animation-delay: 0.5s">
                @php
                    $cvLink =
                        isset($profile['cv_download']) && $profile['cv_download'] !== '#'
                            ? $profile['cv_download']
                            : '#contact';
                @endphp
                <a href="{{ $cvLink }}"
                    @if ($cvLink === '#contact') @else 
                   target="_blank" 
                   rel="noopener noreferrer" @endif
                    class="btn-primary inline-flex items-center gap-2 text-base md:text-lg px-8 py-4 md:px-10 md:py-4 font-semibold shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 rounded-xl"
                    data-translate="hero.download_cv">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    {{ $translations['hero.download_cv'] ?? 'Download CV' }}
                </a>
                <a href="#contact"
                    class="inline-flex items-center gap-2 text-base md:text-lg px-8 py-4 md:px-10 md:py-4 font-semibold bg-white/10 hover:bg-white/20 backdrop-blur-sm border-2 border-white/30 text-white rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300"
                    data-translate="nav.contact">
                    {{ $translations['nav.contact'] ?? 'Contact Me' }}
                </a>
            </div>
        </div>
    </x-container>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce opacity-70 hidden md:block z-10">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</x-section>
