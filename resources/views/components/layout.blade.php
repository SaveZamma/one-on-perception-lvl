<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="auth" content="{{ Auth::user() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'One On Perception')</title>
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{\Illuminate\Support\Facades\URL::to('src/js/aside.js')}}"></script>
    <script type="text/javascript" src="{{\Illuminate\Support\Facades\URL::to('src/js/headButtons.js')}}"></script>
    @yield('meta')
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
