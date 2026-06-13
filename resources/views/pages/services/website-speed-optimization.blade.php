@extends('layouts.app')

@section('title', __('svc_speedup.page_title'))
@section('description', __('svc_speedup.page_desc'))

@section('content')

{{-- ── HERO ── --}}
<section class="hero-light relative overflow-hidden pt-[70px]" aria-labelledby="svc-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-16 lg:py-24 grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">

        {{-- Copy --}}
        <div class="text-center lg:text-left reveal">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border mb-6 text-xs font-semibold tracking-wide uppercase"
                 style="border-color:rgba(245,158,11,0.30);background:rgba(245,158,11,0.07);color:#B45309">
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                </svg>
                {{ __('svc_speedup.hero_badge') }}
            </div>

            <h1 id="svc-heading" class="text-4xl sm:text-5xl lg:text-[3.25rem] font-extrabold leading-[1.1] tracking-tight mb-5 text-text">
                {{ __('svc_speedup.hero_heading_1') }}<br>
                <span style="background:linear-gradient(135deg,#F59E0B,#F97316);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">
                    {{ __('svc_speedup.hero_heading_accent') }}
                </span>
            </h1>

            <p class="text-muted text-base sm:text-lg leading-relaxed max-w-lg mx-auto lg:mx-0 mb-8">
                {{ __('svc_speedup.hero_sub') }}
            </p>

            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3">
                <a href="{{ route('contact') }}" class="btn-primary" style="background:linear-gradient(135deg,#F59E0B,#F97316)">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                    {{ __('svc_speedup.cta_primary') }}
                </a>
                <a href="{{ route('custom-request') }}" class="btn-ghost">
                    Get a Free Quote
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>

        {{-- Visual: PageSpeed dial (kept dark — fits analytics dashboard style) --}}
        <div class="hidden lg:flex relative items-center justify-center reveal delay-200" aria-hidden="true">
            <div class="relative w-full max-w-sm">
                <div class="rounded-2xl border border-black/8 p-6 text-center shadow-2xl shadow-black/10" style="background:#0D0D14">
                    <p class="text-white/40 text-xs font-semibold uppercase tracking-wide mb-4">PageSpeed Score</p>
                    <div class="relative w-36 h-36 mx-auto mb-4">
                        <svg viewBox="0 0 100 100" class="w-full h-full -rotate-90">
                            <circle cx="50" cy="50" r="40" fill="none" stroke="rgba(255,255,255,0.06)" stroke-width="8"/>
                            <circle cx="50" cy="50" r="40" fill="none" stroke="url(#speedGrad)" stroke-width="8"
                                    stroke-linecap="round" stroke-dasharray="251.2"
                                    class="metric-bar" style="stroke-dashoffset:0;transition:stroke-dashoffset 1.5s ease;--target-w:0%"/>
                            <defs>
                                <linearGradient id="speedGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                                    <stop offset="0%" stop-color="#F59E0B"/>
                                    <stop offset="100%" stop-color="#10B981"/>
                                </linearGradient>
                            </defs>
                        </svg>
                        <div class="absolute inset-0 flex flex-col items-center justify-center">
                            <span class="text-4xl font-extrabold text-white">94</span>
                            <span class="text-green-400 text-xs font-bold">Excellent</span>
                        </div>
                    </div>
                    <div class="space-y-3 text-left">
                        @foreach([['LCP','1.2s','#10B981',85],['CLS','0.05','#F59E0B',90],['INP','< 100ms','#10B981',92]] as $m)
                        <div>
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-white/50 font-medium">{{ $m[0] }}</span>
                                <span class="font-bold" style="color:{{ $m[2] }}">{{ $m[1] }}</span>
                            </div>
                            <div class="h-1.5 rounded-full bg-white/8">
                                <div class="h-full rounded-full metric-bar" style="width:0%;background:{{ $m[2] }};transition:width 1.5s ease;--target-w:{{ $m[3] }}%"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="absolute -top-3 -left-3 glass rounded-2xl px-3 py-2 shadow-xl">
                    <p class="text-muted text-[10px]">Before</p>
                    <p class="text-2xl font-extrabold text-red-500">32</p>
                </div>
                <div class="absolute -bottom-3 -right-3 glass rounded-2xl px-3 py-2 shadow-xl">
                    <p class="text-muted text-[10px]">After</p>
                    <p class="text-2xl font-extrabold text-green-500">94</p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ── WHAT WE FIX ── --}}
<section class="py-24 bg-surface" aria-labelledby="offer-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('svc_speedup.offer_label') }}</p>
            <h2 id="offer-heading" class="text-3xl sm:text-4xl font-extrabold text-text mb-4">{{ __('svc_speedup.offer_heading') }}</h2>
            <p class="text-muted max-w-xl mx-auto">{{ __('svc_speedup.offer_sub') }}</p>
        </div>
        @php
        $feats=[
            ['title'=>__('svc_speedup.feat_1_title'),'desc'=>__('svc_speedup.feat_1_desc'),'color'=>'#059669','icon'=>'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
            ['title'=>__('svc_speedup.feat_2_title'),'desc'=>__('svc_speedup.feat_2_desc'),'color'=>'#06B6D4','icon'=>'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'],
            ['title'=>__('svc_speedup.feat_3_title'),'desc'=>__('svc_speedup.feat_3_desc'),'color'=>'#F59E0B','icon'=>'M13 2L3 14h9l-1 8 10-12h-9l1-8z'],
            ['title'=>__('svc_speedup.feat_4_title'),'desc'=>__('svc_speedup.feat_4_desc'),'color'=>'#EF1B3F','icon'=>'M5 12h14M12 5l7 7-7 7'],
            ['title'=>__('svc_speedup.feat_5_title'),'desc'=>__('svc_speedup.feat_5_desc'),'color'=>'#8B5CF6','icon'=>'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064'],
            ['title'=>__('svc_speedup.feat_6_title'),'desc'=>__('svc_speedup.feat_6_desc'),'color'=>'#3B82F6','icon'=>'M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4'],
        ];
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($feats as $i => $f)
            <div class="bg-white border border-black/6 rounded-2xl p-6 transition hover:shadow-md hover:-translate-y-1 reveal delay-{{ ($i%3+1)*100 }}">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-4"
                     style="background:{{ $f['color'] }}0D;border:1px solid {{ $f['color'] }}22">
                    <svg width="20" height="20" fill="none" stroke="{{ $f['color'] }}" stroke-width="1.8" viewBox="0 0 24 24"><path d="{{ $f['icon'] }}"/></svg>
                </div>
                <h3 class="text-text font-bold mb-2 text-sm">{{ $f['title'] }}</h3>
                <p class="text-muted text-sm leading-relaxed">{{ $f['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ── PROCESS ── --}}
<section class="py-24 bg-white" aria-labelledby="process-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('svc_speedup.process_label') }}</p>
            <h2 id="process-heading" class="text-3xl sm:text-4xl font-extrabold text-text">{{ __('svc_speedup.process_heading') }}</h2>
        </div>
        @php
        $steps=[
            ['num'=>1,'title'=>__('svc_speedup.step_1_title'),'desc'=>__('svc_speedup.step_1_desc'),'color'=>'#F59E0B','icon'=>'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
            ['num'=>2,'title'=>__('svc_speedup.step_2_title'),'desc'=>__('svc_speedup.step_2_desc'),'color'=>'#F97316','icon'=>'M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12'],
            ['num'=>3,'title'=>__('svc_speedup.step_3_title'),'desc'=>__('svc_speedup.step_3_desc'),'color'=>'#059669','icon'=>'M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
            ['num'=>4,'title'=>__('svc_speedup.step_4_title'),'desc'=>__('svc_speedup.step_4_desc'),'color'=>'#06B6D4','icon'=>'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
        ];
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 relative">
            <div class="hidden lg:block absolute top-9 left-[12.5%] right-[12.5%] h-px bg-black/8" aria-hidden="true"></div>
            @foreach($steps as $i => $s)
            <div class="text-center reveal delay-{{ ($i+1)*100 }}">
                <div class="relative w-16 h-16 rounded-full border border-black/8 bg-surface flex items-center justify-center mx-auto mb-5">
                    <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full flex items-center justify-center text-xs font-black text-white"
                          style="background:{{ $s['color'] }}">{{ $s['num'] }}</span>
                    <svg width="22" height="22" fill="none" stroke="{{ $s['color'] }}" stroke-width="1.8" viewBox="0 0 24 24"><path d="{{ $s['icon'] }}"/></svg>
                </div>
                <h3 class="font-bold text-text text-sm mb-2">{{ $s['title'] }}</h3>
                <p class="text-muted text-sm leading-relaxed">{{ $s['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ── TOOLS ── --}}
<section class="py-20 bg-surface" aria-labelledby="tech-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-10 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('svc_speedup.tech_label') }}</p>
            <h2 id="tech-heading" class="text-2xl sm:text-3xl font-extrabold text-text">{{ __('svc_speedup.tech_heading') }}</h2>
        </div>
        <div class="flex flex-wrap justify-center gap-3 reveal delay-100">
            @foreach(['Google PageSpeed','Lighthouse','WebPageTest','GTmetrix','Redis','Cloudflare CDN','WebP / AVIF','Laravel Telescope','OPcache','Nginx','Brotli / Gzip'] as $tool)
            <span class="tech-pill px-4 py-2 text-sm font-medium">{{ $tool }}</span>
            @endforeach
        </div>
    </div>
</section>


{{-- ── FAQ ── --}}
<section class="py-20 bg-surface" aria-labelledby="faq-heading">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('svc_speedup.faq_label') }}</p>
            <h2 id="faq-heading" class="text-3xl font-extrabold text-text">{{ __('svc_speedup.faq_heading') }}</h2>
        </div>
        <div x-data="{}">
            @foreach([
                ['q'=>__('svc_speedup.faq_1_q'),'a'=>__('svc_speedup.faq_1_a')],
                ['q'=>__('svc_speedup.faq_2_q'),'a'=>__('svc_speedup.faq_2_a')],
                ['q'=>__('svc_speedup.faq_3_q'),'a'=>__('svc_speedup.faq_3_a')],
                ['q'=>__('svc_speedup.faq_4_q'),'a'=>__('svc_speedup.faq_4_a')],
            ] as $i => $faq)
            <div class="faq-item reveal delay-{{ ($i+1)*100 }}" x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex items-center justify-between py-5 text-left gap-4" :aria-expanded="open">
                    <span class="text-text font-semibold text-sm">{{ $faq['q'] }}</span>
                    <span class="shrink-0 w-7 h-7 rounded-full border border-black/10 flex items-center justify-center transition-transform duration-300"
                          :class="open ? 'rotate-45 border-primary/40 bg-primary/8' : ''">
                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                    </span>
                </button>
                <div x-show="open" x-collapse>
                    <p class="pb-5 text-muted text-sm leading-relaxed">{{ $faq['a'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ── FINAL CTA ── --}}
<section class="py-20 bg-text" aria-labelledby="cta-speed-heading">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center reveal">
        <h2 id="cta-speed-heading" class="text-3xl sm:text-4xl font-extrabold text-white mb-4">{{ __('svc_speedup.cta_heading') }}</h2>
        <p class="text-white/55 max-w-lg mx-auto mb-8">{{ __('svc_speedup.cta_sub') }}</p>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('contact') }}" class="btn-primary">
                {{ __('svc_speedup.cta_primary') }}
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('custom-request') }}" class="btn-ghost-dark">Full Project</a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    @vite('resources/js/pages/services.js')
@endpush
