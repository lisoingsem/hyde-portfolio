@php
    $translations = $translations ?? include(resource_path('lang/en/messages.php'));
@endphp

<x-section id="experience" background="gray" padding="md">
    <x-container>
        <x-section-header 
            title-key="experience.title" 
            subtitle-key="experience.subtitle" 
        />

        <div class="grid md:grid-cols-2 gap-8 md:gap-12">
            {{-- Work Experience --}}
            <div>
                <h3 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white mb-6 md:mb-8" data-translate="experience.work">
                    {{ $translations['experience.work'] ?? 'Work Experience' }}
                </h3>

                @php
                    $workExperiences = [
                        [
                            'status' => 'current',
                            'period' => 'Jun 2025 - Present',
                            'title' => 'Backend Developer',
                            'company' => 'Skylink Technologies',
                            'description' => 'Leading backend initiatives across cloud and automation projects. Building secure APIs, modernizing data architecture, and collaborating with cross-functional teams to deliver scalable business solutions for enterprise clients.',
                            'technologies' => ['Node.js', 'API Architecture', 'Database Design', 'Cloud Solutions']
                        ],
                        [
                            'status' => 'completed',
                            'period' => 'Jun 2024 - Dec, 2024',
                            'title' => 'Full-Stack Developer',
                            'company' => 'Durable Techs',
                            'description' => 'Improved features on an education platform using Laravel Modules and Vue3 for development. Working closely with clients to meet specific requirements and delivering high-quality solutions.',
                            'technologies' => ['Laravel Modules', 'Vue3', 'Education Platform', 'Client Collaboration']
                        ],
                        [
                            'status' => 'current',
                            'period' => '2022 - Present',
                            'title' => 'Freelance Full-Stack Developer',
                            'company' => 'Remote',
                            'description' => 'Built responsive web applications with Laravel & Vue.js. Created APIs and improved app performance. Delivered custom solutions directly to clients while applying best practices to enhance code quality, security, and performance.',
                            'technologies' => ['Laravel', 'Vue.js', 'API Development', 'Performance Optimization']
                        ],
                        [
                            'status' => 'completed',
                            'period' => 'Oct 2023 - Feb 2024',
                            'title' => 'Front-End Developer',
                            'company' => 'Phsar Tech',
                            'description' => 'Built and cloned responsive websites using Laravel & Tailwind CSS. Worked with QA and senior developers to test and improve features. Developed custom solutions for an Advertising Agency based on client needs.',
                            'technologies' => ['Laravel', 'Tailwind CSS', 'QA Collaboration', 'Custom Solutions']
                        ]
                    ];
                @endphp

                @foreach($workExperiences as $experience)
                    <x-experience-item :experience="$experience" />
                @endforeach
            </div>

            {{-- Education --}}
            <div>
                <h3 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white mb-6 md:mb-8" data-translate="experience.education">
                    {{ $translations['experience.education'] ?? 'Education' }}
                </h3>

                @php
                    $education = [
                        [
                            'status' => 'completed',
                            'period' => '2022 - 2025',
                            'title' => 'Bachelor of Computer Science',
                            'company' => 'Royal University of Phnom Penh',
                            'description' => 'Comprehensive study in computer science fundamentals, software engineering, and modern technologies. Gained solid foundation in programming, database systems, and software development methodologies.',
                            'technologies' => ['Computer Science', 'Software Engineering', 'Database Systems', 'Programming']
                        ],
                        [
                            'status' => 'completed',
                            'period' => '2022 - 2023',
                            'title' => 'Web Developer Course',
                            'company' => 'Sunrise Institute of Technology',
                            'description' => 'Intensive web development program covering modern frontend and backend technologies. Gained practical experience in building responsive web applications and working with various frameworks.',
                            'technologies' => ['HTML/CSS', 'JavaScript', 'PHP', 'Web Frameworks']
                        ]
                    ];
                @endphp

                @foreach($education as $edu)
                    <x-experience-item :experience="$edu" />
                @endforeach
            </div>
        </div>
    </x-container>
</x-section>
