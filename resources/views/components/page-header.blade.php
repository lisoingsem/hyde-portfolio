{{-- Reusable Page Header Component --}}
@props(['title', 'subtitle', 'titleKey' => null, 'subtitleKey' => null, 'variant' => 'solid'])

@php
    $translations = $translations ?? include(resource_path('lang/en/messages.php'));
    $displayTitle = $title ?? ($titleKey ? ($translations[$titleKey] ?? $titleKey) : '');
    $displaySubtitle = $subtitle ?? ($subtitleKey ? ($translations[$subtitleKey] ?? $subtitleKey) : '');
@endphp

<section class="py-20 md:py-28 bg-indigo-600 dark:bg-indigo-700 text-white relative overflow-hidden">
    {{-- Subtle overlay for depth --}}
    <div class="absolute inset-0 bg-black/5"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            @if($displayTitle)
                <h1 class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold mb-6 drop-shadow-lg animate-fade-in leading-tight"
                    @if($titleKey) data-translate="{{ $titleKey }}" @endif>
                    {{ $displayTitle }}
                </h1>
            @endif
            @if($displaySubtitle)
                <p class="text-xl md:text-2xl text-white/90 drop-shadow-md animate-fade-in leading-relaxed"
                   style="animation-delay: 0.1s"
                   @if($subtitleKey) data-translate="{{ $subtitleKey }}" @endif>
                    {{ $displaySubtitle }}
                </p>
            @endif
        </div>
    </div>
</section>
