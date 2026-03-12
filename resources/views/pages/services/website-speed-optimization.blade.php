@extends('layouts.app')

@section('title', __('svc_speedup.page_title'))
@section('description', __('svc_speedup.page_desc'))

@push('seo')
<meta name="theme-color" content="#F59E0B">
@endpush

@section('content')
@php $locale = app()->getLocale(); $bn = $locale === 'bn'; @endphp

{{-- ── HERO ────────────────────────────────────────────────────── --}}
<section class="relative min-h-[90vh] flex flex-col justify-start overflow-hidden pt-16"
         style="background:radial-gradient(ellipse at 20% 50%,rgba(245,158,11,0.14) 0%,transparent 55%),radial-gradient(ellipse at 80% 30%,rgba(249,115,22,0.1) 0%,transparent 55%),var(--color-bg)"
         aria-labelledby="svc-heading">

    <canvas id="particle-canvas" aria-hidden="true"></canvas>
    <div class="hero-grid absolute inset-0 pointer-events-none" aria-hidden="true"></div>
    <div class="orb orb-gold w-80 h-80 -top-10 -right-10" aria-hidden="true"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 pt-4 pb-12 lg:py-20 grid lg:grid-cols-2 gap-12 items-center">

        <div class="text-center lg:text-left">
            <div class="svc-hero-badge inline-flex items-center gap-2 px-4 py-1.5 rounded-full border mb-6 text-xs font-semibold tracking-wide uppercase"
                 style="border-color:rgba(245,158,11,0.35);background:rgba(245,158,11,0.08);color:#FCD34D">
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                {{ __('svc_speedup.hero_badge') }}
            </div>
            <h1 id="svc-heading" class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-[1.1] tracking-tight mb-5 {{ $bn ? 'bn' : '' }}">
                @foreach(explode(' ', __('svc_speedup.hero_heading_1')) as $word)
                    <span class="svc-hero-word inline-block">{{ $word }}&nbsp;</span>
                @endforeach
                <br>
                <span style="background:linear-gradient(135deg,#F59E0B,#F97316);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">{{ __('svc_speedup.hero_heading_accent') }}</span>
            </h1>
            <p class="text-muted text-base sm:text-lg leading-relaxed max-w-lg mx-auto lg:mx-0 mb-8 {{ $bn ? 'bn' : '' }}">{{ __('svc_speedup.hero_sub') }}</p>
            <div class="svc-hero-ctas flex flex-wrap items-center justify-center lg:justify-start gap-3">
                <a href="{{ route('contact') }}" class="btn-primary magnetic" style="background:linear-gradient(135deg,#F59E0B,#F97316)">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                    {{ __('svc_speedup.cta_primary') }}
                </a>
                <a href="#pricing" class="btn-ghost magnetic">{{ __('svc_speedup.cta_secondary') }}<svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
            </div>
        </div>

        {{-- Visual: PageSpeed dial + metrics --}}
        <div class="svc-hero-visual hidden lg:flex relative items-center justify-center" aria-hidden="true">
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                <div class="w-72 h-72 rounded-full" style="background:radial-gradient(circle,rgba(245,158,11,0.18) 0%,transparent 70%)"></div>
            </div>
            <div class="relative w-full max-w-sm">
                {{-- Speed dial card --}}
                <div class="rounded-2xl border border-white/8 p-6 text-center shadow-2xl" style="background:var(--color-surface-2)">
                    <p class="text-muted text-xs font-semibold uppercase tracking-wide mb-4">PageSpeed Score</p>
                    {{-- SVG dial --}}
                    <div class="relative w-40 h-40 mx-auto mb-4">
                        <svg viewBox="0 0 100 100" class="w-full h-full -rotate-90">
                            <circle cx="50" cy="50" r="40" fill="none" stroke="rgba(255,255,255,0.06)" stroke-width="8"/>
                            <circle id="speed-dial-ring" cx="50" cy="50" r="40" fill="none"
                                    stroke="url(#speedGrad)" stroke-width="8"
                                    stroke-linecap="round"
                                    stroke-dasharray="251.2"
                                    stroke-dashoffset="251.2"/>
                            <defs>
                                <linearGradient id="speedGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                                    <stop offset="0%" stop-color="#F59E0B"/>
                                    <stop offset="100%" stop-color="#10B981"/>
                                </linearGradient>
                            </defs>
                        </svg>
                        <div class="absolute inset-0 flex flex-col items-center justify-center">
                            <span id="speed-score" class="text-4xl font-extrabold text-white" data-target="94">0</span>
                            <span class="text-green-400 text-xs font-bold">{{ $bn ? 'চমৎকার' : 'Excellent' }}</span>
                        </div>
                    </div>
                    {{-- Metric bars --}}
                    <div class="space-y-3 text-left">
                        @foreach([['LCP','1.2s','#10B981',85],['CLS','0.05','#F59E0B',90],['INP','< 100ms','#10B981',92]] as $m)
                        <div>
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-muted font-medium">{{ $m[0] }}</span>
                                <span class="font-bold" style="color:{{ $m[2] }}">{{ $m[1] }}</span>
                            </div>
                            <div class="h-1.5 rounded-full bg-white/6">
                                <div class="h-full rounded-full metric-bar" style="width:0%;background:{{ $m[2] }};transition:width 1.5s ease;--target-w:{{ $m[3] }}%"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                {{-- Before badge --}}
                <div class="absolute -top-3 -left-3 glass rounded-2xl px-3 py-2 shadow-xl border border-red-500/20">
                    <p class="text-muted text-[10px]">{{ $bn ? 'আগে' : 'Before' }}</p>
                    <p class="text-2xl font-extrabold text-red-400">32</p>
                </div>
                <div class="absolute -bottom-3 -right-3 glass rounded-2xl px-3 py-2 shadow-xl border border-green-500/20">
                    <p class="text-muted text-[10px]">{{ $bn ? 'পরে' : 'After' }}</p>
                    <p class="text-2xl font-extrabold text-green-400">94</p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ── WHAT WE FIX ─────────────────────────────────────────────── --}}
<section class="py-24 max-w-7xl mx-auto px-4 sm:px-6" aria-labelledby="offer-heading">
    <div class="text-center mb-14 reveal">
        <span class="section-label" style="background:rgba(245,158,11,0.1);border-color:rgba(245,158,11,0.3);color:#FCD34D">{{ __('svc_speedup.offer_label') }}</span>
        <h2 id="offer-heading" class="text-3xl sm:text-4xl font-extrabold text-white mb-4 {{ $bn ? 'bn' : '' }}">{{ __('svc_speedup.offer_heading') }}</h2>
        <p class="text-muted max-w-xl mx-auto {{ $bn ? 'bn' : '' }}">{{ __('svc_speedup.offer_sub') }}</p>
    </div>
    @php
    $feats = [
        ['title'=>__('svc_speedup.feat_1_title'),'desc'=>__('svc_speedup.feat_1_desc'),'color'=>'#10B981','icon'=>'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
        ['title'=>__('svc_speedup.feat_2_title'),'desc'=>__('svc_speedup.feat_2_desc'),'color'=>'#06B6D4','icon'=>'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'],
        ['title'=>__('svc_speedup.feat_3_title'),'desc'=>__('svc_speedup.feat_3_desc'),'color'=>'#F59E0B','icon'=>'M13 2L3 14h9l-1 8 10-12h-9l1-8z'],
        ['title'=>__('svc_speedup.feat_4_title'),'desc'=>__('svc_speedup.feat_4_desc'),'color'=>'#7C3AED','icon'=>'M5 12h14M12 5l7 7-7 7'],
        ['title'=>__('svc_speedup.feat_5_title'),'desc'=>__('svc_speedup.feat_5_desc'),'color'=>'#A855F7','icon'=>'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064'],
        ['title'=>__('svc_speedup.feat_6_title'),'desc'=>__('svc_speedup.feat_6_desc'),'color'=>'#EC4899','icon'=>'M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4'],
    ];
    @endphp
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach($feats as $i => $f)
        <div class="tilt-card product-card p-6 reveal delay-{{ ($i%3+1)*100 }}">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-4" style="background:{{ $f['color'] }}18;border:1px solid {{ $f['color'] }}30">
                <svg width="22" height="22" fill="none" stroke="{{ $f['color'] }}" stroke-width="1.8" viewBox="0 0 24 24"><path d="{{ $f['icon'] }}"/></svg>
            </div>
            <h3 class="text-white font-bold mb-2 {{ $bn ? 'bn' : '' }}">{{ $f['title'] }}</h3>
            <p class="text-muted text-sm leading-relaxed {{ $bn ? 'bn' : '' }}">{{ $f['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>


{{-- ── PROCESS ─────────────────────────────────────────────────── --}}
<section class="py-24 relative overflow-hidden" aria-labelledby="process-heading">
    <div class="absolute inset-0 bg-linear-to-b from-surface/0 via-surface/60 to-surface/0 pointer-events-none"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-16 reveal">
            <span class="section-label" style="background:rgba(245,158,11,0.1);border-color:rgba(245,158,11,0.3);color:#FCD34D">{{ __('svc_speedup.process_label') }}</span>
            <h2 id="process-heading" class="text-3xl sm:text-4xl font-extrabold text-white {{ $bn ? 'bn' : '' }}">{{ __('svc_speedup.process_heading') }}</h2>
        </div>
        @php
        $steps=[
            ['num'=>1,'title'=>__('svc_speedup.step_1_title'),'desc'=>__('svc_speedup.step_1_desc'),'color'=>'rgba(245,158,11,0.8)','icon'=>'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
            ['num'=>2,'title'=>__('svc_speedup.step_2_title'),'desc'=>__('svc_speedup.step_2_desc'),'color'=>'rgba(249,115,22,0.8)','icon'=>'M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12'],
            ['num'=>3,'title'=>__('svc_speedup.step_3_title'),'desc'=>__('svc_speedup.step_3_desc'),'color'=>'rgba(16,185,129,0.8)','icon'=>'M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
            ['num'=>4,'title'=>__('svc_speedup.step_4_title'),'desc'=>__('svc_speedup.step_4_desc'),'color'=>'rgba(6,182,212,0.8)','icon'=>'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
        ];
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-4 relative">
            <div class="hidden lg:block absolute top-10 left-[12.5%] right-[12.5%] h-px bg-white/6" aria-hidden="true">
                <div class="process-line-fill h-full w-0" id="process-line" style="background:linear-gradient(90deg,#F59E0B,#F97316,#10B981)"></div>
            </div>
            @foreach($steps as $i => $s)
            <div class="process-step text-center reveal delay-{{ ($i+1)*100 }}">
                <div class="process-icon relative">
                    <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full flex items-center justify-center text-xs font-black text-black" style="background:{{ $s['color'] }}">{{ $s['num'] }}</span>
                    <svg width="26" height="26" fill="none" stroke="{{ $s['color'] }}" stroke-width="1.8" viewBox="0 0 24 24"><path d="{{ $s['icon'] }}"/></svg>
                </div>
                <h3 class="font-bold text-white text-base mb-2 {{ $bn ? 'bn' : '' }}">{{ $s['title'] }}</h3>
                <p class="text-muted text-sm leading-relaxed {{ $bn ? 'bn' : '' }}">{{ $s['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ── TOOLS ───────────────────────────────────────────────────── --}}
<section class="py-20 max-w-7xl mx-auto px-4 sm:px-6" aria-labelledby="tech-heading">
    <div class="text-center mb-10 reveal">
        <span class="section-label" style="background:rgba(245,158,11,0.1);border-color:rgba(245,158,11,0.3);color:#FCD34D">{{ __('svc_speedup.tech_label') }}</span>
        <h2 id="tech-heading" class="text-2xl sm:text-3xl font-extrabold text-white {{ $bn ? 'bn' : '' }}">{{ __('svc_speedup.tech_heading') }}</h2>
    </div>
    <div class="flex flex-wrap justify-center gap-3 reveal delay-100">
        @foreach(['Google PageSpeed','Lighthouse','WebPageTest','GTmetrix','Redis','Cloudflare CDN','WebP / AVIF','Laravel Telescope','OPcache','Nginx','Brotli / Gzip'] as $tool)
        <span class="tech-pill px-4 py-2 text-sm font-medium">{{ $tool }}</span>
        @endforeach
    </div>
</section>


{{-- ── PRICING ─────────────────────────────────────────────────── --}}
<section id="pricing" class="py-24 relative overflow-hidden" aria-labelledby="pricing-heading">
    <div class="absolute inset-0 bg-linear-to-b from-surface/0 via-surface/40 to-surface/0 pointer-events-none"></div>
    <div class="relative max-w-5xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14 reveal">
            <span class="section-label" style="background:rgba(245,158,11,0.1);border-color:rgba(245,158,11,0.3);color:#FCD34D">{{ __('svc_speedup.pricing_label') }}</span>
            <h2 id="pricing-heading" class="text-3xl sm:text-4xl font-extrabold text-white mb-3 {{ $bn ? 'bn' : '' }}">{{ __('svc_speedup.pricing_heading') }}</h2>
            <p class="text-muted {{ $bn ? 'bn' : '' }}">{{ __('svc_speedup.pricing_sub') }}</p>
        </div>
        @php
        $pkgs = [
            ['name'=>__('svc_speedup.pkg_1_name'),'price'=>__('svc_speedup.pkg_1_price'),'desc'=>__('svc_speedup.pkg_1_desc'),'color'=>'#F59E0B','featured'=>false,
             'perks'=>['Full Lighthouse audit','PageSpeed + GTmetrix report','Prioritized issue list','48-hour delivery','DIY or upgrade to fix']],
            ['name'=>__('svc_speedup.pkg_2_name'),'price'=>__('svc_speedup.pkg_2_price'),'desc'=>__('svc_speedup.pkg_2_desc'),'color'=>'#F97316','featured'=>true,
             'perks'=>['Complete audit','All issues fixed','Image optimization','Caching setup','Before/after report','1 month monitoring']],
            ['name'=>__('svc_speedup.pkg_3_name'),'price'=>__('svc_speedup.pkg_3_price'),'desc'=>__('svc_speedup.pkg_3_desc'),'color'=>'#10B981','featured'=>false,
             'perks'=>['Monthly performance check','Regression alerts','Quarterly re-optimization','Core Web Vitals dashboard','Priority response']],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            @foreach($pkgs as $i => $pkg)
            <div class="product-card p-7 flex flex-col reveal delay-{{ ($i+1)*100 }}" style="{{ $pkg['featured'] ? 'border-color:rgba(249,115,22,0.4);box-shadow:0 0 48px rgba(249,115,22,0.12)' : '' }}">
                @if($pkg['featured'])
                <div class="inline-flex items-center gap-1.5 self-start mb-3 px-3 py-1 rounded-full text-xs font-bold uppercase" style="background:rgba(249,115,22,0.15);border:1px solid rgba(249,115,22,0.35);color:#FED7AA">
                    <span class="w-1.5 h-1.5 rounded-full animate-pulse" style="background:#F97316"></span>
                    {{ $bn ? 'সবচেয়ে জনপ্রিয়' : 'Most Popular' }}
                </div>
                @endif
                <p class="text-muted text-xs font-semibold uppercase tracking-wide mb-1">{{ $pkg['name'] }}</p>
                <p class="text-3xl font-extrabold mb-1" style="color:{{ $pkg['color'] }}">{{ $pkg['price'] }}</p>
                <p class="text-muted text-sm mb-5 {{ $bn ? 'bn' : '' }}">{{ $pkg['desc'] }}</p>
                <ul class="space-y-2.5 mb-7 flex-1">
                    @foreach($pkg['perks'] as $perk)
                    <li class="flex items-center gap-2.5 text-sm text-muted">
                        <span class="w-4 h-4 rounded-full flex items-center justify-center shrink-0" style="background:{{ $pkg['color'] }}18;border:1px solid {{ $pkg['color'] }}30">
                            <svg width="8" height="8" fill="none" stroke="{{ $pkg['color'] }}" stroke-width="3" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>
                        </span>
                        {{ $perk }}
                    </li>
                    @endforeach
                </ul>
                <a href="{{ route('contact') }}" class="{{ $pkg['featured'] ? 'btn-accent' : 'btn-ghost' }} w-full justify-center">
                    {{ $bn ? 'শুরু করুন' : 'Get Started' }}
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ── FAQ ─────────────────────────────────────────────────────── --}}
<section class="py-20 max-w-3xl mx-auto px-4 sm:px-6" aria-labelledby="faq-heading">
    <div class="text-center mb-12 reveal">
        <span class="section-label" style="background:rgba(245,158,11,0.1);border-color:rgba(245,158,11,0.3);color:#FCD34D">{{ __('svc_speedup.faq_label') }}</span>
        <h2 id="faq-heading" class="text-3xl font-extrabold text-white {{ $bn ? 'bn' : '' }}">{{ __('svc_speedup.faq_heading') }}</h2>
    </div>
    <div x-data="{}">
        @foreach([['q'=>__('svc_speedup.faq_1_q'),'a'=>__('svc_speedup.faq_1_a')],['q'=>__('svc_speedup.faq_2_q'),'a'=>__('svc_speedup.faq_2_a')],['q'=>__('svc_speedup.faq_3_q'),'a'=>__('svc_speedup.faq_3_a')],['q'=>__('svc_speedup.faq_4_q'),'a'=>__('svc_speedup.faq_4_a')]] as $i => $faq)
        <div class="faq-item reveal delay-{{ ($i+1)*100 }}" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between py-5 text-left" :aria-expanded="open">
                <span class="text-white font-semibold pr-4 {{ $bn ? 'bn' : '' }}">{{ $faq['q'] }}</span>
                <span class="shrink-0 w-7 h-7 rounded-full border border-white/12 flex items-center justify-center transition-transform duration-300" :class="open ? 'rotate-45' : ''">
                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                </span>
            </button>
            <div x-show="open" x-collapse><p class="pb-5 text-muted text-sm leading-relaxed {{ $bn ? 'bn' : '' }}">{{ $faq['a'] }}</p></div>
        </div>
        @endforeach
    </div>
</section>


{{-- ── FINAL CTA ───────────────────────────────────────────────── --}}
<section class="py-20 max-w-7xl mx-auto px-4 sm:px-6">
    <div class="rounded-3xl overflow-hidden reveal" style="background:linear-gradient(135deg,rgba(245,158,11,0.1),rgba(249,115,22,0.05));border:1px solid rgba(245,158,11,0.25)">
        <div class="p-10 sm:p-14 lg:p-16 text-center">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4 {{ $bn ? 'bn' : '' }}">{{ __('svc_speedup.cta_heading') }}</h2>
            <p class="text-muted max-w-lg mx-auto mb-8 {{ $bn ? 'bn' : '' }}">{{ __('svc_speedup.cta_sub') }}</p>
            <div class="flex flex-wrap items-center justify-center gap-3">
                <a href="{{ route('contact') }}" class="btn-accent magnetic">{{ __('svc_speedup.cta_primary') }}</a>
                <a href="{{ route('custom-request') }}" class="btn-ghost magnetic">{{ $bn ? 'কাস্টম প্রজেক্ট' : 'Full Project' }}</a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    @vite('resources/js/pages/services.js')
@endpush
