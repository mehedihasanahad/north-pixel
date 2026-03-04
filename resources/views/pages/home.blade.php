@extends('layouts.app')

@section('title', ($settings['site_name'] ?? config('app.name')) . ' — ' . __('hero.headline_1') . ' ' . __('hero.headline_accent'))

@section('meta')
    <meta property="og:title"       content="{{ $settings['site_name'] ?? config('app.name') }}">
    <meta property="og:description" content="{{ __('hero.sub') }}">
    <meta property="og:type"        content="website">
    <meta name="theme-color"        content="#7C3AED">
@endsection

{{-- ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
     HERO  —  Full viewport, GSAP animated
     ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ --}}
@section('content')

{{-- ── HERO ───────────────────────────────────────────────────── --}}
<section class="relative min-h-screen flex flex-col justify-center overflow-hidden hero-glow pt-16"
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

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 py-20 lg:py-28 grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

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
                <a href="#products" class="btn-primary magnetic">
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

            {{-- Trust line --}}
            <div id="hero-trust" class="flex items-center justify-center lg:justify-start gap-3 mt-7">
                <div class="flex -space-x-2">
                    @foreach(['7C3AED','A855F7','F59E0B','6D28D9'] as $c)
                    <div class="w-8 h-8 rounded-full border-2 border-bg flex items-center justify-center text-[10px] font-bold text-white"
                         style="background:#{{ $c }}">
                        {{ chr(rand(65,90)) }}
                    </div>
                    @endforeach
                </div>
                <p class="text-muted text-sm">
                    <span class="text-white font-semibold">{{ $settings['clients_count'] ?? '500' }}+</span>
                    {{ app()->getLocale() === 'bn' ? 'ক্লায়েন্ট আমাদের বিশ্বাস করেন' : 'clients trust us' }}
                </p>
            </div>
        </div>

        {{-- ── RIGHT: Visual mockup ── --}}
        <div id="hero-visual" class="relative flex items-center justify-center" aria-hidden="true">

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


{{-- ── STATS ──────────────────────────────────────────────────── --}}
<section class="py-20 max-w-7xl mx-auto px-6" aria-labelledby="stats-heading">
    <h2 id="stats-heading" class="sr-only">{{ app()->getLocale() === 'bn' ? 'আমাদের পরিসংখ্যান' : 'Our Numbers' }}</h2>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">

        @php
            $stats = [
                ['count' => 50,   'suffix' => '+',   'label' => __('stats.products'),     'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',       'color' => 'from-primary/20 to-purple-500/10'],
                ['count' => 500,  'suffix' => '+',   'label' => __('stats.clients'),      'icon' => 'M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zM23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75', 'color' => 'from-accent/20 to-yellow-500/5'],
                ['count' => 98,   'suffix' => '%',   'label' => __('stats.satisfaction'), 'icon' => 'M22 11.08V12a10 10 0 11-5.93-9.14M22 4L12 14.01l-3-3',                   'color' => 'from-green-500/20 to-emerald-500/5'],
                ['value' => '24/7', 'label' => __('stats.support'), 'icon' => 'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z', 'color' => 'from-blue-500/20 to-cyan-500/5'],
            ];
        @endphp

        @foreach($stats as $i => $stat)
        <div class="stat-card reveal delay-{{ ($i+1)*100 }}">
            {{-- Icon --}}
            <div class="w-12 h-12 rounded-2xl bg-linear-to-br {{ $stat['color'] }} flex items-center justify-center mx-auto mb-4">
                <svg width="22" height="22" fill="none" stroke="rgba(255,255,255,0.7)" stroke-width="1.8" viewBox="0 0 24 24">
                    <path d="{{ $stat['icon'] }}"/>
                </svg>
            </div>
            {{-- Number --}}
            <div class="stat-number text-4xl font-extrabold text-white mb-1 transition-all duration-500">
                @if(isset($stat['count']))
                    <span data-count="{{ $stat['count'] }}">0</span>{{ $stat['suffix'] ?? '' }}
                @else
                    <span class="{{ app()->getLocale() === 'bn' ? 'bn' : '' }}">{{ $stat['value'] }}</span>
                @endif
            </div>
            <p class="text-muted text-sm {{ app()->getLocale() === 'bn' ? 'bn' : '' }}">{{ $stat['label'] }}</p>
        </div>
        @endforeach

    </div>
</section>


{{-- ── PRODUCTS ───────────────────────────────────────────────── --}}
<section id="products" class="py-20 max-w-7xl mx-auto px-6"
         aria-labelledby="products-heading"
         x-data="{ filter: 'all' }">

    {{-- Section header --}}
    <div class="text-center mb-12 reveal">
        <span class="section-label">
            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            {{ __('products.section_label') }}
        </span>
        <h2 id="products-heading" class="text-3xl sm:text-4xl font-extrabold text-white mb-4 {{ app()->getLocale() === 'bn' ? 'bn' : '' }}">
            {{ __('products.heading') }}
        </h2>
        <p class="text-muted max-w-xl mx-auto {{ app()->getLocale() === 'bn' ? 'bn' : '' }}">
            {{ __('products.sub') }}
        </p>
    </div>

    {{-- Category filter --}}
    @if($categories->count())
    <div class="flex flex-wrap justify-center gap-2 mb-10 reveal delay-100">
        <button @click="filter = 'all'"
                :class="filter === 'all' ? 'active' : ''"
                class="tech-pill px-4 py-1.5 text-sm font-medium">
            {{ __('products.filter_all') }}
        </button>
        @foreach($categories as $cat)
        <button @click="filter = '{{ $cat->slug }}'"
                :class="filter === '{{ $cat->slug }}' ? 'active' : ''"
                class="tech-pill px-4 py-1.5 text-sm font-medium">
            {{ app()->getLocale() === 'bn' && $cat->name_bn ? $cat->name_bn : $cat->name_en }}
        </button>
        @endforeach
    </div>
    @endif

    {{-- Products grid --}}
    @if($products->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products as $product)
            <div x-show="filter === 'all' || filter === '{{ $product->category?->slug }}'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="reveal delay-{{ (($loop->index % 3) + 1) * 100 }}">
                @include('components.product-card', ['product' => $product])
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12 reveal">
            <a href="/products" class="btn-ghost">
                {{ __('common.view_all') }}
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    @else
        <p class="text-center text-muted py-16 {{ app()->getLocale() === 'bn' ? 'bn' : '' }}">
            {{ __('products.empty') }}
        </p>
    @endif

</section>


{{-- ── PROCESS ────────────────────────────────────────────────── --}}
<section class="py-24 relative overflow-hidden" aria-labelledby="process-heading">
    {{-- Subtle bg --}}
    <div class="absolute inset-0 bg-linear-to-b from-surface/0 via-surface/60 to-surface/0 pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-6">
        {{-- Header --}}
        <div class="text-center mb-16 reveal">
            <span class="section-label">
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                {{ __('process.section_label') }}
            </span>
            <h2 id="process-heading" class="text-3xl sm:text-4xl font-extrabold text-white {{ app()->getLocale() === 'bn' ? 'bn' : '' }}">
                {{ __('process.heading') }}
            </h2>
        </div>

        @php
            $steps = [
                ['num' => 1, 'title' => __('process.step_1_title'), 'desc' => __('process.step_1_desc'),
                 'icon' => 'M1 12S5 4 12 4s11 8 11 8-4 8-11 8S1 12 1 12zM12 9a3 3 0 100 6 3 3 0 000-6z',
                 'color' => 'rgba(124,58,237,0.8)'],
                ['num' => 2, 'title' => __('process.step_2_title'), 'desc' => __('process.step_2_desc'),
                 'icon' => 'M9 11l3 3L22 4M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11',
                 'color' => 'rgba(168,85,247,0.8)'],
                ['num' => 3, 'title' => __('process.step_3_title'), 'desc' => __('process.step_3_desc'),
                 'icon' => 'M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z',
                 'color' => 'rgba(245,158,11,0.8)'],
                ['num' => 4, 'title' => __('process.step_4_title'), 'desc' => __('process.step_4_desc'),
                 'icon' => 'M13 2L3 14h9l-1 8 10-12h-9l1-8z',
                 'color' => 'rgba(16,185,129,0.8)'],
            ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-4 relative">
            {{-- Connecting line (desktop) --}}
            <div class="hidden lg:block absolute top-10 left-[12.5%] right-[12.5%] h-px bg-white/6" aria-hidden="true">
                <div class="process-line-fill h-full bg-linear-to-r from-primary via-purple-500 to-accent w-0 transition-all duration-[2s] ease-in-out" id="process-line"></div>
            </div>

            @foreach($steps as $i => $step)
            <div class="process-step text-center reveal delay-{{ ($i+1)*100 }}">
                {{-- Numbered icon --}}
                <div class="process-icon relative">
                    <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full flex items-center justify-center text-xs font-black text-white"
                          style="background: {{ $step['color'] }}">
                        {{ $step['num'] }}
                    </span>
                    <svg width="26" height="26" fill="none" stroke="{{ $step['color'] }}" stroke-width="1.8" viewBox="0 0 24 24">
                        <path d="{{ $step['icon'] }}"/>
                    </svg>
                </div>
                <h3 class="font-bold text-white text-base mb-2 {{ app()->getLocale() === 'bn' ? 'bn' : '' }}">{{ $step['title'] }}</h3>
                <p  class="text-muted text-sm leading-relaxed {{ app()->getLocale() === 'bn' ? 'bn' : '' }}">{{ $step['desc'] }}</p>
            </div>
            @endforeach
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
