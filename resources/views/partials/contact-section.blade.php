@php
    $translations = $translations ?? include(resource_path('lang/en/messages.php'));
    $profile = include(config_path('profile.php'));
@endphp

<x-section id="contact" background="gray" padding="md">
    <x-container size="lg">
        <x-section-header 
            title-key="contact.title" 
            subtitle-key="contact.subtitle" 
        />

        <div class="max-w-3xl mx-auto text-center">
            <h3 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-4 md:mb-6 leading-tight" data-translate="contact.heading">
                {{ $translations['contact.heading'] ?? 'Ready to Bring Your Vision to Life?' }}
            </h3>
            
            <p class="text-base md:text-lg text-gray-600 dark:text-gray-400 mb-6 md:mb-8 leading-relaxed" data-translate="contact.description">
                {{ $translations['contact.description'] ?? '' }}
            </p>

            <p class="text-base md:text-lg text-gray-700 dark:text-gray-300 mb-6 md:mb-8 font-medium" data-translate="contact.cta">
                {{ $translations['contact.cta'] ?? "Let's discuss your project and make it happen:" }}
            </p>

            <div class="flex flex-wrap justify-center gap-4 mb-8 md:mb-10">
                <a href="mailto:{{ $profile['email'] }}"
                   class="btn-primary text-base md:text-lg px-6 py-3 md:px-8 md:py-4"
                   data-translate="contact.email">
                    {{ $translations['contact.email'] ?? 'Email Me' }}
                </a>
                <a href="tel:{{ str_replace(' ', '', $profile['phone']) }}"
                   class="px-6 py-3 md:px-8 md:py-4 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition-all duration-200 text-base md:text-lg shadow-sm hover:shadow-md"
                   data-translate="contact.call">
                    {{ $translations['contact.call'] ?? 'Call Me' }}
                </a>
                @if(isset($profile['social']['telegram']))
                <a href="{{ $profile['social']['telegram'] }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="px-6 py-3 md:px-8 md:py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition-all duration-200 text-base md:text-lg shadow-sm hover:shadow-md"
                   data-translate="contact.telegram">
                    {{ $translations['contact.telegram'] ?? 'Telegram' }}
                </a>
                @endif
            </div>

            @if(isset($profile['social']) && count($profile['social']) > 0)
            <p class="text-sm md:text-base text-gray-600 dark:text-gray-400 mb-4" data-translate="contact.social">
                {{ $translations['contact.social'] ?? 'Or find me on social media:' }}
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                @if(isset($profile['social']['github']))
                <a href="{{ $profile['social']['github'] }}" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-200"
                   aria-label="GitHub">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                    </svg>
                </a>
                @endif
                @if(isset($profile['social']['linkedin']))
                <a href="{{ $profile['social']['linkedin'] }}" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-200"
                   aria-label="LinkedIn">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                    </svg>
                </a>
                @endif
                @if(isset($profile['social']['facebook']) && !empty($profile['social']['facebook']))
                <a href="{{ $profile['social']['facebook'] }}" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-200"
                   aria-label="Facebook">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>
                @endif
                @if(isset($profile['social']['telegram']) && !empty($profile['social']['telegram']))
                <a href="{{ $profile['social']['telegram'] }}" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-200"
                   aria-label="Telegram">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.568 8.16l-1.843 8.687c-.135.608-.485.757-.984.471l-2.724-2.006-1.314 1.263c-.148.148-.273.273-.56.273l.199-2.827 5.045-4.556c.22-.196-.048-.304-.342-.107l-6.237 3.926-2.689-.84c-.588-.186-.604-.588.112-.88l10.497-4.045c.49-.179.918.111.758.69z"/>
                    </svg>
                </a>
                @endif
            </div>
            @endif
        </div>
    </x-container>
</x-section>
