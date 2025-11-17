@php
    $translations = isset($translations) ? $translations : include resource_path('lang/en/messages.php');
    $profile = include config_path('profile.php');
@endphp

<footer
    class="bg-gray-800 dark:bg-gray-900 text-white py-8 md:py-12 mt-auto border-t border-gray-700 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-8 md:gap-12 mb-6 md:mb-8">
            <!-- Brand Section -->
            <div>
                <div class="flex items-center gap-3 mb-3 md:mb-4">
                    @if (isset($profile['image']) && $profile['image'] !== '')
                        @php
                            $imageFile = str_replace('/media/', '', $profile['image']);
                            $imageUrl = \Hyde\Facades\Asset::exists($imageFile) 
                                ? \Hyde\Facades\Asset::get('media/' . $imageFile) 
                                : $profile['image'];
                        @endphp
                        <img src="{{ $imageUrl }}" alt="{{ $profile['image_alt'] ?? $profile['name'] }}"
                            class="w-12 h-12 md:w-16 md:h-16 rounded-full object-cover border-2 border-indigo-400 dark:border-indigo-500 shadow-md">
                    @endif
                    <div>
                        <h3 class="text-xl md:text-2xl font-bold">
                            {{ $profile['name'] }}
                        </h3>
                        <p class="text-sm md:text-base text-gray-400 leading-relaxed mt-1">
                            {{ $profile['title'] }}
                        </p>
                    </div>
                </div>
                @if (isset($profile['location']))
                    <p class="text-xs md:text-sm text-gray-500 mt-2">
                        {{ $profile['location'] }}
                    </p>
                @endif
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg md:text-xl font-semibold mb-4 md:mb-5" data-translate="nav.quick_links">Quick Links
                </h4>
                <ul class="space-y-2 md:space-y-3">
                    <li>
                        <a href="/"
                            class="text-sm md:text-base text-gray-400 hover:text-white transition-colors duration-200"
                            data-translate="nav.home">
                            {{ $translations['nav.home'] ?? 'Home' }}
                        </a>
                    </li>
                    <li>
                        <a href="/about"
                            class="text-sm md:text-base text-gray-400 hover:text-white transition-colors duration-200"
                            data-translate="nav.about">
                            {{ $translations['nav.about'] ?? 'About' }}
                        </a>
                    </li>
                    <li>
                        <a href="/portfolio"
                            class="text-sm md:text-base text-gray-400 hover:text-white transition-colors duration-200"
                            data-translate="nav.portfolio">
                            {{ $translations['nav.portfolio'] ?? 'Portfolio' }}
                        </a>
                    </li>
                    <li>
                        <a href="/contact"
                            class="text-sm md:text-base text-gray-400 hover:text-white transition-colors duration-200"
                            data-translate="nav.contact">
                            {{ $translations['nav.contact'] ?? 'Contact' }}
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-lg md:text-xl font-semibold mb-4 md:mb-5" data-translate="contact.title">Get In Touch
                </h4>
                <ul class="space-y-2 md:space-y-3 text-gray-400">
                    <li>
                        <a href="mailto:{{ $profile['email'] }}"
                            class="text-sm md:text-base hover:text-white transition-colors duration-200">
                            {{ $profile['email'] }}
                        </a>
                    </li>
                    <li>
                        <a href="tel:{{ str_replace(' ', '', $profile['phone']) }}"
                            class="text-sm md:text-base hover:text-white transition-colors duration-200">
                            {{ $profile['phone'] }}
                        </a>
                    </li>
                </ul>

                @if (isset($profile['social']) && count($profile['social']) > 0)
                    <div class="flex gap-4 mt-4">
                        @if (isset($profile['social']['github']))
                            <a href="{{ $profile['social']['github'] }}" target="_blank" rel="noopener noreferrer"
                                class="text-gray-400 hover:text-white transition-colors duration-200"
                                aria-label="GitHub">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                </svg>
                            </a>
                        @endif
                        @if (isset($profile['social']['linkedin']))
                            <a href="{{ $profile['social']['linkedin'] }}" target="_blank" rel="noopener noreferrer"
                                class="text-gray-400 hover:text-white transition-colors duration-200"
                                aria-label="LinkedIn">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>
                        @endif
                        @if (isset($profile['social']['facebook']) && !empty($profile['social']['facebook']))
                            <a href="{{ $profile['social']['facebook'] }}" target="_blank" rel="noopener noreferrer"
                                class="text-gray-400 hover:text-white transition-colors duration-200"
                                aria-label="Facebook">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                        @endif
                        @if (isset($profile['social']['telegram']) && !empty($profile['social']['telegram']))
                            <a href="{{ $profile['social']['telegram'] }}" target="_blank" rel="noopener noreferrer"
                                class="text-gray-400 hover:text-white transition-colors duration-200"
                                aria-label="Telegram">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.568 8.16l-1.843 8.687c-.135.608-.485.757-.984.471l-2.724-2.006-1.314 1.263c-.148.148-.273.273-.56.273l.199-2.827 5.045-4.556c.22-.196-.048-.304-.342-.107l-6.237 3.926-2.689-.84c-.588-.186-.604-.588.112-.88l10.497-4.045c.49-.179.918.111.758.69z" />
                                </svg>
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="border-t border-gray-700 dark:border-gray-800 pt-6 md:pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm md:text-base text-gray-400 text-center md:text-left leading-relaxed">
                    © {{ date('Y') }} {{ $profile['name'] }}. All rights reserved.
                </p>
                <a href="#" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;"
                    class="flex items-center gap-2 text-sm md:text-base text-gray-400 hover:text-white transition-colors duration-200"
                    aria-label="Back to top">
                    <span data-translate="common.back_to_top">{{ $translations['common.back_to_top'] ?? '↑' }}</span>
                    <span class="hidden sm:inline"
                        data-translate="footer.back_to_top">{{ $translations['footer.back_to_top'] ?? 'Back to top' }}</span>
                </a>
            </div>
        </div>
    </div>
</footer>
