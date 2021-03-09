<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        @include('layouts.styles')
        @stack('styles')
        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>
    <body>
        <main id="wrapper">
            @include('layouts.menu-side-bar')
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content" style="height: 580px;">
                    @include('layouts.header')
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
        @include('layouts.footer')
        @include('layouts.scripts')
        @stack('scripts')
        @yield('other-scripts')
    </body>
</html>
