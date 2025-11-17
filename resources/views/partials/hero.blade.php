@php
    $translations = $translations ?? (include resource_path('lang/en/messages.php'));
    $profile = include config_path('profile.php');
@endphp

<x-section class="hero-gradient text-white relative overflow-hidden min-h-screen flex items-center" padding="none">
    {{-- Base gradient background --}}
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 via-purple-600 to-indigo-800"></div>

    {{-- Subtle animated overlays --}}
    <div class="absolute inset-0">
        <div
            class="absolute top-0 left-0 w-1/2 h-full bg-gradient-to-r from-purple-500/10 to-transparent animate-pulse-slow">
        </div>
        <div class="absolute bottom-0 right-0 w-1/2 h-full bg-gradient-to-l from-indigo-500/10 to-transparent animate-pulse-slow"
            style="animation-delay: 2s;"></div>
    </div>

    {{-- Floating orbs - refined positioning --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 right-1/4 w-96 h-96 bg-white/5 rounded-full blur-3xl animate-float-slow"></div>
        <div class="absolute bottom-1/4 left-1/4 w-80 h-80 bg-indigo-400/8 rounded-full blur-3xl animate-float-medium"
            style="animation-delay: 3s;"></div>
    </div>

    {{-- Subtle grid pattern --}}
    <div class="absolute inset-0 bg-grid-pattern opacity-[0.03]"></div>

    {{-- Depth overlay --}}
    <div class="absolute inset-0 bg-gradient-to-t from-black/15 via-transparent to-transparent"></div>

    <x-container class="relative z-10 py-32 md:py-40 lg:py-48">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                {{-- Profile Image --}}
                @if (isset($profile['image']) && $profile['image'] !== '')
                    @php
                        $imageFile = str_replace('/media/', '', $profile['image']);
                        $imageUrl = \Hyde\Facades\Asset::exists($imageFile)
                            ? \Hyde\Facades\Asset::get('media/' . $imageFile)
                            : $profile['image'];
                    @endphp
                    <div class="mb-16 md:mb-20 animate-slide-up">
                        <div class="inline-block relative group" style="width: 130px; height: 130px;">
                            {{-- Outer glow ring --}}
                            <div
                                class="absolute -inset-3 bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 rounded-full opacity-25 blur-2xl animate-pulse">
                            </div>
                            {{-- Glassmorphism container --}}
                            <div
                                class="relative w-full h-full bg-white/10 backdrop-blur-md rounded-full p-1.5 border-2 border-white/40 shadow-2xl">
                                <img src="{{ $imageUrl }}" alt="{{ $profile['image_alt'] ?? $profile['name'] }}"
                                    class="w-full h-full rounded-full object-cover object-center border-2 border-white/70 shadow-xl group-hover:scale-105 transition-transform duration-300"
                                    style="width: 130px !important; height: 130px !important; max-width: 130px !important; max-height: 130px !important;"
                                    loading="eager">
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Greeting --}}
                <div class="mb-6 md:mb-7 animate-slide-up" style="animation-delay: 0.1s">
                    <p class="text-sm md:text-base text-indigo-200/90 font-medium tracking-[0.2em] uppercase"
                        data-translate="hero.greeting">
                        {{ $translations['hero.greeting'] ?? 'Hi, I\'m' }}
                    </p>
                </div>

                {{-- Name --}}
                <div class="mb-8 md:mb-10 animate-slide-up" style="animation-delay: 0.2s">
                    <h1
                        class="text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-extrabold text-white drop-shadow-2xl leading-[1.1] tracking-tight">
                        <span
                            class="bg-clip-text text-transparent bg-gradient-to-r from-white via-indigo-100 to-purple-100">
                            {{ $profile['name'] }}
                        </span>
                    </h1>
                </div>

                {{-- Title Badge --}}
                <div class="mb-10 md:mb-12 animate-slide-up" style="animation-delay: 0.3s">
                    <span
                        class="inline-flex items-center gap-2.5 px-6 py-3 md:px-7 md:py-3.5 rounded-full bg-white/15 backdrop-blur-lg border border-white/30 text-white text-base md:text-lg font-semibold shadow-xl hover:bg-white/20 transition-all duration-300 hover:scale-105">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span
                            data-translate="hero.title">{{ $translations['hero.title'] ?? 'Full Stack Developer' }}</span>
                    </span>
                </div>

                {{-- Description --}}
                <div class="mb-12 md:mb-14 animate-slide-up max-w-2xl mx-auto" style="animation-delay: 0.4s">
                    <p class="text-lg md:text-xl lg:text-2xl text-white/90 leading-relaxed font-light"
                        data-translate="hero.description">
                        {{ $translations['hero.description'] ?? 'Passionate about creating exceptional digital experiences through clean code, innovative design, and cutting-edge technologies.' }}
                    </p>
                </div>

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center items-stretch sm:items-center w-full sm:w-auto animate-slide-up mb-48 md:mb-56 lg:mb-64"
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
                        class="group inline-flex items-center justify-center gap-2.5 text-sm sm:text-base md:text-lg px-6 py-3 sm:px-8 sm:py-3.5 md:px-10 md:py-4 font-semibold bg-white text-indigo-600 rounded-xl shadow-xl hover:shadow-2xl hover:shadow-indigo-500/30 transform hover:scale-105 hover:-translate-y-1 transition-all duration-300 w-full sm:w-auto">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 transition-transform group-hover:translate-y-0.5 flex-shrink-0"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        <span
                            data-translate="hero.download_cv">{{ $translations['hero.download_cv'] ?? 'Download CV' }}</span>
                    </a>
                    <a href="#contact"
                        class="group inline-flex items-center justify-center gap-2.5 text-sm sm:text-base md:text-lg px-6 py-3 sm:px-8 sm:py-3.5 md:px-10 md:py-4 font-semibold bg-white/15 hover:bg-white/25 backdrop-blur-md border-2 border-white/40 text-white rounded-xl shadow-xl hover:shadow-2xl hover:shadow-white/20 transform hover:scale-105 hover:-translate-y-1 transition-all duration-300 w-full sm:w-auto">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 transition-transform group-hover:translate-x-1 flex-shrink-0"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                        <span data-translate="nav.contact">{{ $translations['nav.contact'] ?? 'Contact Me' }}</span>
                    </a>
                </div>

                {{-- Scroll indicator --}}
                <div class="animate-slide-up" style="animation-delay: 0.6s">
                    <button type="button" onclick="scrollToAbout(event)"
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/30 text-white animate-bounce opacity-70 hover:opacity-100 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-white/50 mt-16 md:mt-20 lg:mt-24"
                        aria-label="Scroll to about section">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </x-container>
</x-section>
