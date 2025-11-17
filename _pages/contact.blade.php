@extends('layouts.app')

@php
    $translations = include(resource_path('lang/en/messages.php'));
@endphp

@section('content')
    <x-page-header 
        title-key="contact.title" 
        subtitle-key="contact.subtitle" 
    />
    
    @include('partials.contact-section', ['translations' => $translations])
@endsection
