{{-- Reusable Section Component --}}
@props([
    'id' => null,
    'class' => '',
    'background' => 'white',
    'padding' => 'md'
])

@php
    $backgroundClasses = [
        'white' => 'bg-white dark:bg-gray-900',
        'gray' => 'bg-gray-50 dark:bg-gray-800',
        'transparent' => 'bg-transparent',
    ];
    
    $paddingClasses = [
        'sm' => 'py-12',
        'md' => 'py-16 md:py-20',
        'lg' => 'py-20 md:py-28',
        'xl' => 'py-24 md:py-32',
        'none' => '',
    ];
    
    $bgClass = $backgroundClasses[$background] ?? $backgroundClasses['white'];
    $paddingClass = $paddingClasses[$padding] ?? $paddingClasses['md'];
@endphp

<section @if($id) id="{{ $id }}" @endif class="{{ $bgClass }} {{ $paddingClass }} {{ $class }}">
    {{ $slot }}
</section>
