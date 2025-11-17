@extends('layouts.app')

@php
    $translations = include(resource_path('lang/en/messages.php'));
@endphp

@section('content')
    <x-page-header 
        title-key="portfolio.title" 
        subtitle-key="portfolio.subtitle" 
    />
    
    @include('partials.projects-section', ['translations' => $translations])
@endsection
