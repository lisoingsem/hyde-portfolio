@php
    $translations = $translations ?? (include resource_path('lang/en/messages.php'));
@endphp

<x-section id="portfolio" background="white" padding="md">
    <x-container>
        <x-section-header title-key="portfolio.title" subtitle-key="portfolio.subtitle" />

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $projects = [
                    [
                        'category' => 'Network Management',
                        'status' => 'live',
                        'title' => 'NetBlock Platform',
                        'description' =>
                            'Delivered a complete infrastructure for a network intelligence platform, combining a marketing site with secure APIs to manage customer subscriptions and analytics dashboards.',
                        'technologies' => ['PHP', 'Node.js', 'Express', 'API Design', 'Database Analysis'],
                        'image' => \Hyde\Facades\Asset::exists('media/projects/netblock.png')
                            ? \Hyde\Facades\Asset::get('media/projects/netblock.png')
                            : '/media/projects/netblock.png',
                        'link' => '#',
                    ],
                    [
                        'category' => 'Education Platform',
                        'status' => 'live',
                        'title' => 'EDU Partner',
                        'description' =>
                            'Led full-stack development to modernize the platform UX, introduce new collaboration features, and tailor learning workflows that match partner schools\' requirements.',
                        'technologies' => [
                            'Laravel',
                            'Full Stack',
                            'UI/UX Improvements',
                            'Feature Development',
                            'Customization',
                        ],
                        'image' => \Hyde\Facades\Asset::exists('media/projects/edupartner.png')
                            ? \Hyde\Facades\Asset::get('media/projects/edupartner.png')
                            : '/media/projects/edupartner.png',
                        'link' => '#',
                    ],
                    [
                        'category' => 'Tourism Platform',
                        'status' => 'live',
                        'title' => 'Cambodia Tourism Association',
                        'description' =>
                            'Tourism Website – Built a platform with maps, event listings, and secure login to promote tourism in Cambodia.',
                        'technologies' => [
                            'Laravel',
                            'Tailwind CSS',
                            'API Integration',
                            'Web Design',
                            'Authentication',
                        ],
                        'image' => \Hyde\Facades\Asset::exists('media/projects/cata.png')
                            ? \Hyde\Facades\Asset::get('media/projects/cata.png')
                            : '/media/projects/cata.png',
                        'link' => '#',
                    ],
                    [
                        'category' => 'Education System',
                        'status' => 'live',
                        'title' => 'HEMIS Management System',
                        'description' =>
                            'Education System – Created a system to manage students, academic records, and dashboards for universities.',
                        'technologies' => ['Laravel', 'Laravel Modules', 'Vue.js', 'Database Design', 'Dashboard'],
                        'image' => \Hyde\Facades\Asset::exists('media/projects/hemis.png')
                            ? \Hyde\Facades\Asset::get('media/projects/hemis.png')
                            : '/media/projects/hemis.png',
                        'link' => '#',
                    ],
                    [
                        'category' => 'E-commerce Platform',
                        'status' => 'live',
                        'title' => 'Sunsimexco Ltd',
                        'description' =>
                            'E-commerce Website – Developed a modern, responsive site with online product listings and SEO to boost visibility and sales.',
                        'technologies' => ['Laravel', 'Laravel Modules', 'Vue.js', 'Full Stack', 'SEO', 'Responsive'],
                        'image' => \Hyde\Facades\Asset::exists('media/projects/sunsimexco.png')
                            ? \Hyde\Facades\Asset::get('media/projects/sunsimexco.png')
                            : '/media/projects/sunsimexco.png',
                        'link' => '#',
                    ],
                    [
                        'category' => 'E-commerce Platform',
                        'status' => 'live',
                        'title' => '3Winbiz Cambodia Co., Ltd',
                        'description' =>
                            'E-commerce Platform – Built a system with vendor and agent roles to manage product listings, sales, and business operations.',
                        'technologies' => ['Laravel', 'Laravel Modules', 'Vue.js', 'Full Stack', 'SEO', 'Responsive'],
                        'image' => \Hyde\Facades\Asset::exists('media/projects/3winbiz.png')
                            ? \Hyde\Facades\Asset::get('media/projects/3winbiz.png')
                            : '/media/projects/3winbiz.png',
                        'link' => '#',
                    ],
                ];
            @endphp

            @foreach ($projects as $project)
                <x-project-card :project="$project" />
            @endforeach
        </div>
    </x-container>
</x-section>
