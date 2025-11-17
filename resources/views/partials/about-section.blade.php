@php
    $translations = $translations ?? include(resource_path('lang/en/messages.php'));
@endphp

<x-section id="about" background="white" padding="md">
    <x-container>
        <x-section-header 
            title-key="about.title" 
            subtitle-key="about.subtitle" 
        />

        {{-- Statistics Grid --}}
        <div class="grid md:grid-cols-3 gap-6 md:gap-8 mb-12 md:mb-16">
            <div class="text-center p-6 md:p-8 rounded-xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 card-hover shadow-sm">
                <div class="stat-number mb-3 text-4xl md:text-5xl">1+</div>
                <p class="text-sm md:text-base text-gray-600 dark:text-gray-300 font-medium" data-translate="about.experience">
                    {{ $translations['about.experience'] ?? 'Years Experience' }}
                </p>
            </div>
            
            <div class="text-center p-6 md:p-8 rounded-xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 card-hover shadow-sm"
                style="animation-delay: 0.1s">
                <div class="stat-number mb-3 text-4xl md:text-5xl">5+</div>
                <p class="text-sm md:text-base text-gray-600 dark:text-gray-300 font-medium" data-translate="about.projects">
                    {{ $translations['about.projects'] ?? 'Projects Completed' }}
                </p>
            </div>
            
            <div class="text-center p-6 md:p-8 rounded-xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 card-hover shadow-sm"
                style="animation-delay: 0.2s">
                <div class="stat-number mb-3 text-4xl md:text-5xl">100%</div>
                <p class="text-sm md:text-base text-gray-600 dark:text-gray-300 font-medium" data-translate="about.satisfaction">
                    {{ $translations['about.satisfaction'] ?? 'Client Satisfaction' }}
                </p>
            </div>
        </div>

        {{-- About Content --}}
        <div class="max-w-4xl mx-auto">
            <h3 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-4 md:mb-6 leading-tight" data-translate="about.heading">
                {{ $translations['about.heading'] ?? 'Junior Full-Stack Developer' }}
            </h3>
            
            <p class="text-base md:text-lg text-gray-600 dark:text-gray-400 mb-6 md:mb-8 leading-relaxed" data-translate="about.description">
                {{ $translations['about.description'] ?? '' }}
            </p>

            <h4 class="text-xl md:text-2xl font-semibold text-gray-900 dark:text-white mb-4 md:mb-6" data-translate="about.technologies">
                {{ $translations['about.technologies'] ?? 'Core Technologies' }}
            </h4>
            
            <div class="flex flex-wrap gap-3">
                @php
                    $technologies = [
                        'Laravel',
                        'Vue.js',
                        'Tailwind CSS',
                        'PHP',
                        'JavaScript',
                        'MySQL',
                        'Git',
                        'API Development',
                    ];
                @endphp
                
                @foreach ($technologies as $tech)
                    <span class="tech-badge px-4 py-2 text-sm md:text-base bg-gray-50 dark:bg-gray-800 text-indigo-700 dark:text-indigo-300 rounded-lg font-medium border border-gray-200 dark:border-gray-700">
                        {{ $tech }}
                    </span>
                @endforeach
            </div>
        </div>
    </x-container>
</x-section>
