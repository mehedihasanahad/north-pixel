<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      class="{{ app()->getLocale() === 'bn' ? 'bn-mode' : '' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $siteName    = $settings['site_name']        ?? config('app.name');
        $siteDesc    = $settings['meta_description']  ?? '';
        $siteUrl     = rtrim(config('app.url'), '/');
        $logoUrl     = asset('assets/images/logo.jpeg');
        $pageTitle   = trim($__env->yieldContent('title'));
        $fullTitle   = $pageTitle ? $pageTitle . ' — ' . $siteName : $siteName;
        $pageDesc    = trim($__env->yieldContent('description')) ?: $siteDesc;
        $pageOgImage = trim($__env->yieldContent('og_image'))    ?: $logoUrl;
        $ogType      = trim($__env->yieldContent('og_type'))     ?: 'website';
        $robots      = trim($__env->yieldContent('robots'))      ?: 'index, follow';
        $canonicalUrl = $siteUrl . request()->getPathInfo();
    @endphp

    <title>{{ $fullTitle }}</title>
    <meta name="description" content="{{ $pageDesc }}">
    <meta name="robots" content="{{ $robots }}">

    {{-- Canonical & hreflang --}}
    <link rel="canonical" href="{{ $canonicalUrl }}">
    <link rel="alternate" hreflang="en" href="{{ $siteUrl }}{{ request()->getPathInfo() }}">
    <link rel="alternate" hreflang="bn" href="{{ $siteUrl }}{{ request()->getPathInfo() }}">
    <link rel="alternate" hreflang="x-default" href="{{ $canonicalUrl }}">

    {{-- Open Graph --}}
    <meta property="og:type"         content="{{ $ogType }}">
    <meta property="og:site_name"    content="{{ $siteName }}">
    <meta property="og:title"        content="{{ $fullTitle }}">
    <meta property="og:description"  content="{{ $pageDesc }}">
    <meta property="og:url"          content="{{ $canonicalUrl }}">
    <meta property="og:image"        content="{{ $pageOgImage }}">
    <meta property="og:image:width"  content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale"       content="{{ app()->getLocale() === 'bn' ? 'bn_BD' : 'en_US' }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="{{ $fullTitle }}">
    <meta name="twitter:description" content="{{ $pageDesc }}">
    <meta name="twitter:image"       content="{{ $pageOgImage }}">
    @if(!empty($settings['twitter_url']))
        <meta name="twitter:site" content="{{ '@' . ltrim(basename($settings['twitter_url']), '@') }}">
    @endif

    {{-- Favicon & manifest --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="alternate icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ $logoUrl }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta name="theme-color" content="#7C3AED">

    {{-- JSON-LD: Organization (sitewide) --}}
    <script type="application/ld+json">{!! json_encode([
        '@context'     => 'https://schema.org',
        '@type'        => 'Organization',
        'name'         => $siteName,
        'url'          => $siteUrl,
        'logo'         => $logoUrl,
        'description'  => $siteDesc,
        'contactPoint' => [
            '@type'             => 'ContactPoint',
            'contactType'       => 'customer support',
            'availableLanguage' => ['English', 'Bengali'],
        ],
        'sameAs' => array_values(array_filter([
            $settings['facebook_url'] ?? '',
            $settings['twitter_url']  ?? '',
        ])),
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>

    {{-- Page-specific SEO (JSON-LD, extra meta) --}}
    @stack('seo')

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Hind+Siliguri:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- Global assets (app.css + app.js = Alpine + scroll helpers) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Page-specific styles --}}
    @stack('styles')
</head>
<body x-data>

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
