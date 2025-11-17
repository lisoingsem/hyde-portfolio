@extends('layouts.app')

@php
    $translations = include(resource_path('lang/en/messages.php'));
@endphp

@section('content')
    @include('partials.hero', ['translations' => $translations])
    @include('partials.about-section', ['translations' => $translations])
    @include('partials.experience-section', ['translations' => $translations])
    @include('partials.projects-section', ['translations' => $translations])
    @include('partials.contact-section', ['translations' => $translations])
@endsection
