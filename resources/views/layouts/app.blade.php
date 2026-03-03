<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      class="{{ app()->getLocale() === 'bn' ? 'bn-mode' : '' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $settings['site_name'] ?? config('app.name'))</title>
    <meta name="description" content="@yield('description', $settings['meta_description'] ?? '')">

    @yield('meta')

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Hind+Siliguri:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- Global assets (app.css + app.js = Alpine + scroll helpers) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Page-specific styles --}}
    @stack('styles')
</head>
<body>

    {{-- Scroll progress bar --}}
    <div id="scroll-progress" aria-hidden="true"></div>

    @include('components.nav')
    @include('components.mobile-drawer')

    <main id="main-content">
        @yield('content')
    </main>

    @include('components.footer')
    @include('components.order-modal')
    @include('components.float-widget')

    {{-- Page-specific scripts --}}
    @stack('scripts')

</body>
</html>
