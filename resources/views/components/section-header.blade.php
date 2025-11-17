{{-- Reusable Section Header Component --}}
@props(['title', 'subtitle', 'titleKey' => null, 'subtitleKey' => null, 'align' => 'center'])

@php
    $translations = $translations ?? include(resource_path('lang/en/messages.php'));
    $displayTitle = $title ?? ($titleKey ? ($translations[$titleKey] ?? $titleKey) : '');
    $displaySubtitle = $subtitle ?? ($subtitleKey ? ($translations[$subtitleKey] ?? $subtitleKey) : '');
    $alignClass = $align === 'left' ? 'text-left' : 'text-center';
@endphp

<div class="{{ $alignClass }} mb-10 md:mb-12 lg:mb-16">
    @if($displayTitle)
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white mb-3 md:mb-4 leading-tight"
            @if($titleKey) data-translate="{{ $titleKey }}" @endif>
            {{ $displayTitle }}
        </h2>
    @endif
    @if($displaySubtitle)
        <p class="text-lg md:text-xl lg:text-2xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto leading-relaxed"
           @if($subtitleKey) data-translate="{{ $subtitleKey }}" @endif>
            {{ $displaySubtitle }}
        </p>
    @endif
</div>
