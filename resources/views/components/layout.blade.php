<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'One On Perception')</title>
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/app.css') }}">
    <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
    @yield('styles')
</head>
<body>
@include('partials.header')

@section('page-content')
{{--    here you can write default page-content, that will be shown only if no page-content is passed    --}}
{{-- to use properly this directive insert @extends('layout') directive in your content file and add @section('page-content') <YOUR CONTENT> @endsection()--}}
    <h5>You have not provided any page-content</h5>
@show

@yield('scripts')
</body>
</html>
