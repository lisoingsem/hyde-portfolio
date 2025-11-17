{{-- Reusable Container Component --}}
@props(['class' => '', 'size' => 'xl'])

@php
    $containerSizes = [
        'sm' => 'max-w-3xl',
        'md' => 'max-w-4xl',
        'lg' => 'max-w-5xl',
        'xl' => 'max-w-7xl',
        'full' => 'max-w-full',
    ];
    $containerClass = $containerSizes[$size] ?? $containerSizes['xl'];
@endphp

<div class="{{ $containerClass }} mx-auto px-4 sm:px-6 lg:px-8 {{ $class }}">
    {{ $slot }}
</div>
