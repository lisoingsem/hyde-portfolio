@extends('layouts.app')

@php
    $translations = include(resource_path('lang/en/messages.php'));
@endphp

@section('content')
    <x-page-header 
        title-key="about.title" 
        subtitle-key="about.subtitle" 
    />
    
    @include('partials.about-section', ['translations' => $translations])
    @include('partials.experience-section', ['translations' => $translations])
@endsection
