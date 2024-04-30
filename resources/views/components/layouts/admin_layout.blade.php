<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        @include('partials.head')
    </head>
    <body>
        @include('partials.sidebar')
        @include('partials.header')

        {{ $slot }}
        @include('partials.footer')
        @include('partials.corejs')

        {{-- <script src="{{asset('assets/js/codebase.app.min.js')}}"></script> --}}

    </body>
</html>
