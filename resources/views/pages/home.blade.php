@extends('layouts.app')

@section('title', __('hero.headline_1') . ' ' . __('hero.headline_accent'))
@section('description', __('hero.sub'))

@push('seo')
<meta name="theme-color" content="#7C3AED">
@endpush

{{-- ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
     HERO  —  Full viewport, GSAP animated
     ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ --}}
@section('content')

{{-- ── HERO ───────────────────────────────────────────────────── --}}
<section class="relative min-h-screen flex flex-col justify-start overflow-hidden hero-glow pt-16"
         aria-labelledby="hero-heading">

    {{-- Particle canvas --}}
    <canvas id="particle-canvas" aria-hidden="true"></canvas>

    {{-- Ambient orbs --}}
    <div class="orb orb-violet w-96 h-96 -top-20 -left-20" aria-hidden="true" data-parallax="0.3"></div>
    <div class="orb orb-gold   w-72 h-72  top-1/3 right-0"  aria-hidden="true" data-parallax="-0.2"></div>
    <div class="orb orb-purple w-80 h-80  bottom-0 left-1/3" aria-hidden="true" data-parallax="0.15"></div>

    {{-- Noise texture overlay --}}
    <div class="absolute inset-0 opacity-[0.025] pointer-events-none"
         style="background-image:url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22200%22 height=%22200%22><filter id=%22n%22><feTurbulence type=%22fractalNoise%22 baseFrequency=%220.65%22 numOctaves=%223%22/></filter><rect width=%22200%22 height=%22200%22 filter=%22url(%23n)%22 opacity=%221%22/></svg>')"
         aria-hidden="true"></div>

    {{-- Grid lines decoration --}}
    <div class="hero-grid absolute inset-0 pointer-events-none" aria-hidden="true"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 pt-4 pb-12 lg:py-20 grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

        {{-- ── LEFT: Copy ── --}}
        <div class="text-center lg:text-left">

            {{-- Badge — hidden by JS until animated --}}
            <div id="hero-badge" class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full
                 border border-primary/30 bg-primary/8 text-purple-300 text-xs font-semibold
                 tracking-wide uppercase mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-accent animate-pulse"></span>
                {{ __('hero.badge') }}
            </div>

            {{-- Headline --}}
            <h1 id="hero-heading" class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-[1.1] tracking-tight mb-5">
                {{-- Words for stagger --}}
                @foreach(explode(' ', __('hero.headline_1')) as $word)
                    <span class="hero-word inline-block"
                          style="{{ app()->getLocale() === 'bn' ? 'font-family:\'Hind Siliguri\',sans-serif' : '' }}">{{ $word }}&nbsp;</span>
                @endforeach
                @if(\Illuminate\Support\Facades\Lang::has('hero.headline_2', app()->getLocale(), false))
                    @foreach(explode(' ', __('hero.headline_2')) as $word)
                        <span class="hero-word inline-block">{{ $word }}&nbsp;</span>
                    @endforeach
                    <br>
                @endif
                <span id="hero-typewriter"
                      data-text="{{ __('hero.headline_accent') }}"
                      class="grad-text inline-block {{ app()->getLocale() === 'bn' ? 'bn' : '' }}"></span><span class="typewriter-cursor grad-text" style="opacity:0">|</span>
            </h1>

            {{-- Sub --}}
            <p id="hero-sub"
               class="text-muted text-base sm:text-lg leading-relaxed max-w-lg mx-auto lg:mx-0 mb-8
                      {{ app()->getLocale() === 'bn' ? 'bn' : '' }}">
                {{ __('hero.sub') }}
            </p>

            {{-- CTAs --}}
            <div id="hero-ctas" class="flex flex-wrap items-center justify-center lg:justify-start gap-3">
                <a href="#services" class="btn-primary magnetic">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    {{ __('hero.cta_primary') }}
                </a>
                <a href="/custom-request" class="btn-ghost magnetic">
                    {{ __('hero.cta_secondary') }}
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>

        {{-- ── RIGHT: Visual mockup ── --}}
        <div id="hero-visual" class="hidden lg:flex relative items-center justify-center" aria-hidden="true">

            {{-- Glow backdrop --}}
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                <div class="w-72 h-72 rounded-full"
                     style="background:radial-gradient(circle,rgba(124,58,237,0.22) 0%,transparent 70%)"></div>
            </div>

            {{-- Browser window mockup — always visible, no absolute positioning --}}
            <div id="hero-browser" class="relative w-full max-w-xs sm:max-w-sm lg:max-w-md">
                {{-- Browser chrome --}}
                <div class="rounded-2xl overflow-hidden border border-white/10 shadow-2xl shadow-primary/25"
                     style="background:var(--color-surface-2)">

                    {{-- Title bar --}}
                    <div class="flex items-center gap-2 px-4 py-3 border-b border-white/6"
                         style="background:var(--color-surface)">
                        <span class="w-3 h-3 rounded-full bg-red-500/70"></span>
                        <span class="w-3 h-3 rounded-full bg-yellow-500/70"></span>
                        <span class="w-3 h-3 rounded-full bg-green-500/70"></span>
                        <div class="flex-1 mx-3 px-3 py-1 rounded-md text-xs text-muted text-center"
                             style="background:var(--color-bg)">
                            app.yoursite.com
                        </div>
                    </div>

                    {{-- Content area --}}
                    <div class="p-4 space-y-3">
                        {{-- Skeleton header --}}
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg shrink-0" style="background:linear-gradient(135deg,#7C3AED,#A855F7)"></div>
                            <div class="flex-1 space-y-1.5">
                                <div class="h-2.5 rounded-full bg-white/10 w-1/2"></div>
                                <div class="h-1.5 rounded-full bg-white/6 w-1/3"></div>
                            </div>
                            <div class="px-3 py-1.5 rounded-full text-xs font-semibold text-white shrink-0"
                                 style="background:linear-gradient(135deg,#7C3AED,#A855F7)">Live</div>
                        </div>
                        {{-- Skeleton cards row --}}
                        <div class="grid grid-cols-2 gap-2">
                            @foreach(['from-primary/20 to-accent/10','from-accent/20 to-purple-500/10'] as $g)
                            <div class="rounded-xl overflow-hidden border border-white/6">
                                <div class="aspect-video bg-linear-to-br {{ $g }} flex items-center justify-center">
                                    <svg width="20" height="20" fill="none" stroke="rgba(255,255,255,0.3)" stroke-width="1.5" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                                </div>
                                <div class="p-2 space-y-1">
                                    <div class="h-2 rounded bg-white/10 w-3/4"></div>
                                    <div class="h-1.5 rounded bg-white/6 w-1/2"></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{-- Stats row --}}
                        <div class="grid grid-cols-3 gap-2">
                            @foreach([['#7C3AED','50+','Products'],['#F59E0B','98%','Rating'],['#10B981','24/7','Support']] as $s)
                            <div class="rounded-xl p-2.5 text-center border border-white/6" style="background:var(--color-surface)">
                                <p class="text-sm font-extrabold" style="color:{{ $s[0] }}">{{ $s[1] }}</p>
                                <p class="text-[10px] text-muted mt-0.5">{{ $s[2] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Floating badges — positioned relative to the browser box --}}
                <div id="hero-badge-live"
                     class="absolute -top-3 -right-3 glass rounded-full px-3 py-1.5 flex items-center gap-2 shadow-xl z-10 text-xs font-semibold text-white border border-green-500/20">
                    <span class="w-2 h-2 rounded-full bg-green-400 animate-ping absolute"></span>
                    <span class="w-2 h-2 rounded-full bg-green-400 relative shrink-0"></span>
                    {{ app()->getLocale() === 'bn' ? 'লাইভ প্রিভিউ' : 'Live Preview' }}
                </div>

                <div id="hero-badge-clients"
                     class="absolute -bottom-3 -left-3 glass rounded-2xl px-4 py-2.5 shadow-xl z-10 border border-primary/20">
                    <p class="text-xs text-muted">{{ app()->getLocale() === 'bn' ? 'সন্তুষ্ট ক্লায়েন্ট' : 'Happy Clients' }}</p>
                    <p class="text-xl font-extrabold grad-text leading-tight">500+</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll hint --}}
    <div id="hero-scroll" class="absolute bottom-6 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2">
        <span class="text-muted text-xs tracking-widest uppercase">{{ __('hero.scroll_hint') }}</span>
        <div class="w-6 h-10 rounded-full border border-white/15 flex justify-center pt-2">
            <div class="w-1 h-2.5 rounded-full bg-primary/60 animate-bounce"></div>
        </div>
    </div>
</section>


{{-- ── TRUST MARQUEE ──────────────────────────────────────────── --}}
<section class="py-10 border-y border-white/6 overflow-hidden" aria-hidden="true">
    <div class="relative">
        <div class="flex overflow-hidden">
            <div class="marquee-track shrink-0">
                @php
                    $trustItems = [
                        ['icon' => 'M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5', 'label' => 'Laravel'],
                        ['icon' => 'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z', 'label' => 'Vue.js'],
                        ['icon' => 'M13 2L3 14h9l-1 8 10-12h-9l1-8z', 'label' => 'React'],
                        ['icon' => 'M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z', 'label' => 'MySQL'],
                        ['icon' => 'M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z', 'label' => 'Next.js'],
                        ['icon' => 'M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z', 'label' => 'Tailwind'],
                        ['icon' => 'M22 11.08V12a10 10 0 11-5.93-9.14', 'label' => 'TypeScript'],
                        ['icon' => 'M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z', 'label' => 'GSAP'],
                    ];
                    $trustItems = array_merge($trustItems, $trustItems); // duplicate for seamless loop
                @endphp
                @foreach($trustItems as $item)
                    <div class="flex items-center gap-2.5 shrink-0 px-2">
                        <svg width="16" height="16" fill="none" stroke="rgba(124,58,237,0.6)" stroke-width="1.8" viewBox="0 0 24 24">
                            <path d="{{ $item['icon'] }}"/>
                        </svg>
                        <span class="text-sm font-semibold text-muted whitespace-nowrap">{{ $item['label'] }}</span>
                        <span class="w-1 h-1 rounded-full bg-white/10 ml-4"></span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


{{-- ── SERVICES ────────────────────────────────────────────────── --}}
<section id="services" class="py-24 relative overflow-hidden" aria-labelledby="services-heading">

    {{-- Background grid --}}
    <div class="absolute inset-0 pointer-events-none" aria-hidden="true"
         style="background-image:linear-gradient(rgba(124,58,237,0.04) 1px,transparent 1px),linear-gradient(90deg,rgba(124,58,237,0.04) 1px,transparent 1px);background-size:60px 60px;"></div>

    {{-- Ambient glows --}}
    <div class="absolute top-1/4 -left-32 w-96 h-96 rounded-full pointer-events-none"
         style="background:radial-gradient(circle,rgba(124,58,237,0.12) 0%,transparent 70%)" aria-hidden="true"></div>
    <div class="absolute bottom-1/4 -right-32 w-96 h-96 rounded-full pointer-events-none"
         style="background:radial-gradient(circle,rgba(245,158,11,0.09) 0%,transparent 70%)" aria-hidden="true"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6">

        {{-- Header --}}
        <div class="text-center mb-16 reveal" id="services-header">
            <span class="section-label">
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                </svg>
                {{ __('services.section_label') }}
            </span>
            <h2 id="services-heading"
                class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4 {{ app()->getLocale() === 'bn' ? 'bn' : '' }}">
                {{ __('services.heading') }}
            </h2>
            <p class="text-muted max-w-2xl mx-auto text-base sm:text-lg {{ app()->getLocale() === 'bn' ? 'bn' : '' }}">
                {{ __('services.sub') }}
            </p>
        </div>

        @php
        $locale = app()->getLocale();
        $services = [
            [
                'id'    => 'web',
                'title' => __('services.web_title'),
                'desc'  => __('services.web_desc'),
                'tags'  => [__('services.web_tag_1'), __('services.web_tag_2'), __('services.web_tag_3')],
                'cta'   => __('services.cta'),
                'href'  => route('services.web'),
                'color_from' => '#7C3AED', 'color_to' => '#A855F7',
                'glow'  => 'rgba(124,58,237,0.25)',
                'icon_paths' => ['M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z', 'M16 2v4M8 2v4M2 10h20'],
                'featured' => false,
            ],
            [
                'id'    => 'mobile',
                'title' => __('services.mobile_title'),
                'desc'  => __('services.mobile_desc'),
                'tags'  => [__('services.mobile_tag_1'), __('services.mobile_tag_2'), __('services.mobile_tag_3')],
                'cta'   => __('services.cta'),
                'href'  => route('services.mobile'),
                'color_from' => '#A855F7', 'color_to' => '#EC4899',
                'glow'  => 'rgba(168,85,247,0.25)',
                'icon_paths' => ['M12 18h.01', 'M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z'],
                'featured' => false,
            ],
            [
                'id'    => 'speedup',
                'title' => __('services.speedup_title'),
                'desc'  => __('services.speedup_desc'),
                'tags'  => [__('services.speedup_tag_1'), __('services.speedup_tag_2'), __('services.speedup_tag_3')],
                'cta'   => __('services.cta'),
                'href'  => route('services.speedup'),
                'color_from' => '#F59E0B', 'color_to' => '#F97316',
                'glow'  => 'rgba(245,158,11,0.22)',
                'icon_paths' => ['M13 2L3 14h9l-1 8 10-12h-9l1-8z'],
                'featured' => false,
            ],
            [
                'id'    => 'maintain',
                'title' => __('services.maintain_title'),
                'desc'  => __('services.maintain_desc'),
                'tags'  => [__('services.maintain_tag_1'), __('services.maintain_tag_2'), __('services.maintain_tag_3')],
                'cta'   => __('services.cta'),
                'href'  => route('services.maintenance'),
                'color_from' => '#10B981', 'color_to' => '#06B6D4',
                'glow'  => 'rgba(16,185,129,0.22)',
                'icon_paths' => ['M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'],
                'featured' => false,
            ],
            [
                'id'    => 'ready',
                'title' => __('services.ready_title'),
                'desc'  => __('services.ready_desc'),
                'tags'  => [__('services.ready_tag_1'), __('services.ready_tag_2'), __('services.ready_tag_3')],
                'cta'   => __('services.ready_cta'),
                'href'  => route('services.ready'),
                'color_from' => '#7C3AED', 'color_to' => '#F59E0B',
                'glow'  => 'rgba(124,58,237,0.3)',
                'icon_paths' => ['M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
                'featured' => true,
            ],
        ];
        @endphp

        {{-- Top row: 2 large cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
            @foreach(array_slice($services, 0, 2) as $i => $svc)
            <div class="service-card group reveal delay-{{ ($i+1)*100 }}"
                 data-service="{{ $svc['id'] }}"
                 style="--svc-glow:{{ $svc['glow'] }}">

                {{-- Top gradient bar --}}
                <div class="h-1 w-full rounded-t-2xl"
                     style="background:linear-gradient(90deg,{{ $svc['color_from'] }},{{ $svc['color_to'] }})"></div>

                <div class="p-7 lg:p-8">
                    {{-- Icon circle --}}
                    <div class="service-icon-wrap mb-5 w-14 h-14 rounded-2xl flex items-center justify-center"
                         style="background:linear-gradient(135deg,{{ $svc['color_from'] }}22,{{ $svc['color_to'] }}11);border:1px solid {{ $svc['color_from'] }}33">
                        <svg width="26" height="26" fill="none" stroke="{{ $svc['color_from'] }}" stroke-width="1.8" viewBox="0 0 24 24">
                            @foreach($svc['icon_paths'] as $path)
                            <path d="{{ $path }}"/>
                            @endforeach
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-white mb-3 {{ $locale === 'bn' ? 'bn' : '' }}">{{ $svc['title'] }}</h3>
                    <p class="text-muted text-sm leading-relaxed mb-5 {{ $locale === 'bn' ? 'bn' : '' }}">{{ $svc['desc'] }}</p>

                    {{-- Tags --}}
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach($svc['tags'] as $tag)
                        <span class="text-xs px-2.5 py-1 rounded-full font-medium"
                              style="background:{{ $svc['color_from'] }}18;border:1px solid {{ $svc['color_from'] }}30;color:{{ $svc['color_from'] }}">
                            {{ $tag }}
                        </span>
                        @endforeach
                    </div>

                    <a href="{{ $svc['href'] }}" class="service-cta-link group/link inline-flex items-center gap-2 text-sm font-semibold"
                       style="color:{{ $svc['color_from'] }}">
                        {{ $svc['cta'] }}
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"
                             class="transition-transform duration-300 group-hover/link:translate-x-1">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Middle row: 2 cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
            @foreach(array_slice($services, 2, 2) as $i => $svc)
            <div class="service-card group reveal delay-{{ ($i+1)*150 }}"
                 data-service="{{ $svc['id'] }}"
                 style="--svc-glow:{{ $svc['glow'] }}">

                <div class="h-1 w-full rounded-t-2xl"
                     style="background:linear-gradient(90deg,{{ $svc['color_from'] }},{{ $svc['color_to'] }})"></div>

                <div class="p-7 lg:p-8">
                    <div class="service-icon-wrap mb-5 w-14 h-14 rounded-2xl flex items-center justify-center"
                         style="background:linear-gradient(135deg,{{ $svc['color_from'] }}22,{{ $svc['color_to'] }}11);border:1px solid {{ $svc['color_from'] }}33">
                        <svg width="26" height="26" fill="none" stroke="{{ $svc['color_from'] }}" stroke-width="1.8" viewBox="0 0 24 24">
                            @foreach($svc['icon_paths'] as $path)
                            <path d="{{ $path }}"/>
                            @endforeach
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-white mb-3 {{ $locale === 'bn' ? 'bn' : '' }}">{{ $svc['title'] }}</h3>
                    <p class="text-muted text-sm leading-relaxed mb-5 {{ $locale === 'bn' ? 'bn' : '' }}">{{ $svc['desc'] }}</p>

                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach($svc['tags'] as $tag)
                        <span class="text-xs px-2.5 py-1 rounded-full font-medium"
                              style="background:{{ $svc['color_from'] }}18;border:1px solid {{ $svc['color_from'] }}30;color:{{ $svc['color_from'] }}">
                            {{ $tag }}
                        </span>
                        @endforeach
                    </div>

                    <a href="{{ $svc['href'] }}" class="service-cta-link group/link inline-flex items-center gap-2 text-sm font-semibold"
                       style="color:{{ $svc['color_from'] }}">
                        {{ $svc['cta'] }}
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"
                             class="transition-transform duration-300 group-hover/link:translate-x-1">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Bottom row: Ready-Made — full width featured card --}}
        @php $svc = $services[4]; @endphp
        <div class="service-card service-card--featured group reveal delay-200"
             data-service="{{ $svc['id'] }}"
             style="--svc-glow:{{ $svc['glow'] }}">

            {{-- Gradient top border --}}
            <div class="h-1 w-full rounded-t-2xl"
                 style="background:linear-gradient(90deg,{{ $svc['color_from'] }},#A855F7,{{ $svc['color_to'] }})"></div>

            <div class="grid lg:grid-cols-2 gap-0">
                {{-- Left copy --}}
                <div class="p-8 lg:p-10 flex flex-col justify-center">
                    {{-- Featured badge --}}
                    <div class="inline-flex items-center gap-1.5 self-start mb-4 px-3 py-1 rounded-full text-xs font-bold tracking-wide uppercase"
                         style="background:linear-gradient(135deg,rgba(124,58,237,0.2),rgba(245,158,11,0.1));border:1px solid rgba(124,58,237,0.3);color:#C4B5FD">
                        <span class="w-1.5 h-1.5 rounded-full bg-accent animate-pulse"></span>
                        {{ $locale === 'bn' ? 'সবচেয়ে জনপ্রিয়' : 'Most Popular' }}
                    </div>

                    <div class="service-icon-wrap mb-4 w-14 h-14 rounded-2xl flex items-center justify-center"
                         style="background:linear-gradient(135deg,rgba(124,58,237,0.25),rgba(245,158,11,0.12));border:1px solid rgba(124,58,237,0.35)">
                        <svg width="26" height="26" fill="none" stroke="#A855F7" stroke-width="1.8" viewBox="0 0 24 24">
                            @foreach($svc['icon_paths'] as $path)
                            <path d="{{ $path }}"/>
                            @endforeach
                        </svg>
                    </div>

                    <h3 class="text-2xl lg:text-3xl font-extrabold text-white mb-3 {{ $locale === 'bn' ? 'bn' : '' }}">{{ $svc['title'] }}</h3>
                    <p class="text-muted leading-relaxed mb-5 {{ $locale === 'bn' ? 'bn' : '' }}">{{ $svc['desc'] }}</p>

                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach($svc['tags'] as $tag)
                        <span class="text-xs px-2.5 py-1 rounded-full font-medium"
                              style="background:rgba(124,58,237,0.15);border:1px solid rgba(124,58,237,0.3);color:#C4B5FD">
                            {{ $tag }}
                        </span>
                        @endforeach
                    </div>

                    <a href="{{ $svc['href'] }}" class="btn-primary magnetic self-start">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        {{ $svc['cta'] }}
                    </a>
                </div>

                {{-- Right visual: animated product grid preview --}}
                <div class="hidden lg:flex items-center justify-center p-8 lg:p-10 relative overflow-hidden"
                     style="background:rgba(124,58,237,0.04)" aria-hidden="true">

                    {{-- Glow --}}
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                        <div class="w-64 h-64 rounded-full"
                             style="background:radial-gradient(circle,rgba(124,58,237,0.15) 0%,transparent 70%)"></div>
                    </div>

                    <div class="relative w-full max-w-sm space-y-3">
                        {{-- Mini product cards --}}
                        @foreach([
                            ['from-primary/20 to-purple-500/10','E-Commerce Store'],
                            ['from-accent/20 to-yellow-500/10','Restaurant App'],
                            ['from-green-500/20 to-emerald-500/10','Portfolio CMS'],
                        ] as $j => $mini)
                        <div class="flex items-center gap-3 rounded-xl px-4 py-3 border border-white/6 service-mini-card"
                             style="background:var(--color-surface-2);animation-delay:{{ $j * 0.2 }}s">
                            <div class="w-10 h-10 rounded-lg bg-linear-to-br {{ $mini[0] }} flex items-center justify-center shrink-0">
                                <svg width="16" height="16" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="1.5" viewBox="0 0 24 24">
                                    <rect x="3" y="3" width="18" height="18" rx="2"/>
                                    <path d="M3 9h18M9 21V9"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-white text-sm font-semibold truncate">{{ $mini[1] }}</p>
                                <p class="text-muted text-xs">{{ $locale === 'bn' ? 'লাইভ প্রিভিউ সহ' : 'Live preview included' }}</p>
                            </div>
                        </div>
                        @endforeach

                        {{-- CTA hint --}}
                        <div class="text-center pt-2">
                            <span class="text-muted text-xs">
                                {{ $locale === 'bn' ? '৫০+ প্রোডাক্ট দেখতে প্রস্তুত' : '50+ products ready to explore' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


{{-- ── CUSTOM PROJECT CTA ─────────────────────────────────────── --}}
<section class="py-24 max-w-7xl mx-auto px-6" aria-labelledby="custom-heading">
    <div class="grad-border rounded-3xl overflow-hidden">
        <div class="grid lg:grid-cols-2 gap-0">

            {{-- Copy side --}}
            <div class="p-10 lg:p-14 flex flex-col justify-center reveal">
                <span class="section-label mb-6">
                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                    {{ __('custom.section_label') }}
                </span>
                <h2 id="custom-heading" class="text-3xl sm:text-4xl font-extrabold text-white mb-5 {{ app()->getLocale() === 'bn' ? 'bn' : '' }}">
                    {{ __('custom.heading') }}
                </h2>
                <p class="text-muted leading-relaxed mb-8 max-w-md {{ app()->getLocale() === 'bn' ? 'bn' : '' }}">
                    {{ __('custom.sub') }}
                </p>

                {{-- Features --}}
                <ul class="space-y-3 mb-8" role="list">
                    @foreach([__('custom.feature_1'), __('custom.feature_2'), __('custom.feature_3'), __('custom.feature_4')] as $feat)
                    <li class="flex items-center gap-3 text-sm {{ app()->getLocale() === 'bn' ? 'bn' : '' }}">
                        <span class="w-5 h-5 rounded-full flex items-center justify-center shrink-0"
                              style="background:rgba(124,58,237,0.15);border:1px solid rgba(124,58,237,0.3)">
                            <svg width="10" height="10" fill="none" stroke="#C4B5FD" stroke-width="2.5" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>
                        </span>
                        <span class="text-muted">{{ $feat }}</span>
                    </li>
                    @endforeach
                </ul>

                <div>
                    <a href="/custom-request" class="btn-primary magnetic">
                        {{ __('custom.cta') }}
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            {{-- Decorative code side --}}
            <div class="p-10 lg:p-14 hidden lg:flex items-center justify-center bg-surface-2/50 reveal delay-200" aria-hidden="true">
                <div class="code-block w-full max-w-xs">
                    <p><span class="code-comment">// Your custom project</span></p>
                    <p><span class="code-keyword">const</span> <span class="code-fn">project</span> = {</p>
                    <p>&nbsp;&nbsp;<span class="code-keyword">type</span>: <span class="code-string">"web_app"</span>,</p>
                    <p>&nbsp;&nbsp;<span class="code-keyword">tech</span>: [<span class="code-string">"Laravel"</span>, <span class="code-string">"React"</span>],</p>
                    <p>&nbsp;&nbsp;<span class="code-keyword">timeline</span>: <span class="code-string">"7-14 days"</span>,</p>
                    <p>&nbsp;&nbsp;<span class="code-keyword">quality</span>: <span class="code-string">"premium"</span>,</p>
                    <p>&nbsp;&nbsp;<span class="code-fn">status</span>: <span class="code-string">"ready_to_start"</span></p>
                    <p>}</p>
                    <p class="mt-2"><span class="code-comment">// Contact us today</span></p>
                    <p><span class="code-fn">launch</span>(<span class="code-fn">project</span>)<span class="code-cursor"></span></p>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ── TESTIMONIALS ───────────────────────────────────────────── --}}
<section id="testimonials" class="py-24 max-w-7xl mx-auto px-6" aria-labelledby="testimonials-heading">

    <div class="text-center mb-14 reveal">
        <span class="section-label">
            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
            {{ __('testimonials.section_label') }}
        </span>
        <h2 id="testimonials-heading" class="text-3xl sm:text-4xl font-extrabold text-white {{ app()->getLocale() === 'bn' ? 'bn' : '' }}">
            {{ __('testimonials.heading') }}
        </h2>
    </div>

    @php
        $testimonials = [
            ['name' => 'Rahim Uddin',     'role' => 'E-commerce Owner',       'color' => '7C3AED',
             'text_en' => 'The ready-made e-commerce solution saved us months of development. Exceptional quality and the team\'s support was outstanding.',
             'text_bn' => 'রেডিমেড ই-কমার্স সমাধানটি আমাদের মাসের পর মাস ডেভেলপমেন্ট বাঁচিয়েছে। অসাধারণ মান এবং দলের সাপোর্ট ছিল চমৎকার।'],
            ['name' => 'Sarah Ahmed',     'role' => 'Startup Founder',         'color' => 'A855F7',
             'text_en' => 'We launched our SaaS platform in under a week using their product. The code quality and documentation are world-class.',
             'text_bn' => 'আমরা তাদের প্রোডাক্ট ব্যবহার করে এক সপ্তাহেরও কম সময়ে আমাদের SaaS প্ল্যাটফর্ম চালু করেছি। কোড মান এবং ডকুমেন্টেশন বিশ্বমানের।'],
            ['name' => 'Karim Hassan',    'role' => 'Restaurant Business',     'color' => 'F59E0B',
             'text_en' => 'Their custom restaurant management system transformed our operations. Highly recommend for any business needing quality digital solutions.',
             'text_bn' => 'তাদের কাস্টম রেস্তোরাঁ ম্যানেজমেন্ট সিস্টেম আমাদের অপারেশন পরিবর্তন করে দিয়েছে। মানসম্পন্ন ডিজিটাল সমাধান প্রয়োজন এমন যেকোনো ব্যবসার জন্য অত্যন্ত সুপারিশ করি।'],
        ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($testimonials as $t)
        <div class="testimonial-card product-card p-7 flex flex-col">
            {{-- Stars --}}
            <div class="flex gap-1 mb-5" aria-label="5 stars">
                @for($s = 0; $s < 5; $s++)
                <svg width="14" height="14" viewBox="0 0 24 24" fill="#F59E0B"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                @endfor
            </div>

            {{-- Quote --}}
            <blockquote class="text-muted text-sm leading-relaxed flex-1 mb-6 {{ app()->getLocale() === 'bn' ? 'bn' : '' }}">
                "{{ app()->getLocale() === 'bn' ? $t['text_bn'] : $t['text_en'] }}"
            </blockquote>

            {{-- Author --}}
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full flex items-center justify-center text-white text-sm font-bold shrink-0"
                     style="background:linear-gradient(135deg,#{{ $t['color'] }},rgba(255,255,255,0.2))">
                    {{ substr($t['name'], 0, 1) }}
                </div>
                <div>
                    <p class="text-white text-sm font-semibold">{{ $t['name'] }}</p>
                    <p class="text-muted text-xs">{{ $t['role'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</section>

@endsection

{{-- ── Page-specific JS (GSAP + particles) ── --}}
@push('scripts')
    @vite('resources/js/pages/home.js')
@endpush
