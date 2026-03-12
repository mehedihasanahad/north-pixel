@extends('layouts.app')

@section('title', __('svc_ready.page_title'))
@section('description', __('svc_ready.page_desc'))

@push('seo')
<meta name="theme-color" content="#7C3AED">
@endpush

@section('content')
@php $locale = app()->getLocale(); $bn = $locale === 'bn'; @endphp

{{-- ── HERO ────────────────────────────────────────────────────── --}}
<section class="relative min-h-[90vh] flex flex-col justify-start overflow-hidden hero-glow pt-16"
         aria-labelledby="svc-heading">

    <canvas id="particle-canvas" aria-hidden="true"></canvas>
    <div class="orb orb-violet w-96 h-96 -top-20 -left-20" aria-hidden="true" data-parallax="0.3"></div>
    <div class="orb orb-gold   w-72 h-72  top-1/3 right-0"  aria-hidden="true" data-parallax="-0.2"></div>
    <div class="hero-grid absolute inset-0 pointer-events-none" aria-hidden="true"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 pt-4 pb-12 lg:py-20 grid lg:grid-cols-2 gap-12 items-center">

        <div class="text-center lg:text-left">
            <div class="svc-hero-badge inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-primary/30 bg-primary/8 text-purple-300 text-xs font-semibold tracking-wide uppercase mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-accent animate-pulse"></span>
                {{ __('svc_ready.hero_badge') }}
            </div>
            <h1 id="svc-heading" class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-[1.1] tracking-tight mb-5 {{ $bn ? 'bn' : '' }}">
                @foreach(explode(' ', __('svc_ready.hero_heading_1')) as $word)
                    <span class="svc-hero-word inline-block">{{ $word }}&nbsp;</span>
                @endforeach
                <br>
                <span class="grad-text">{{ __('svc_ready.hero_heading_accent') }}</span>
            </h1>
            <p class="text-muted text-base sm:text-lg leading-relaxed max-w-lg mx-auto lg:mx-0 mb-8 {{ $bn ? 'bn' : '' }}">{{ __('svc_ready.hero_sub') }}</p>
            <div class="svc-hero-ctas flex flex-wrap items-center justify-center lg:justify-start gap-3">
                <a href="{{ route('products.index') }}" class="btn-primary magnetic">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    {{ __('svc_ready.cta_primary') }}
                </a>
                <a href="{{ route('custom-request') }}" class="btn-ghost magnetic">
                    {{ __('svc_ready.cta_secondary') }}
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>

        {{-- Visual: Animated product catalog preview --}}
        <div class="svc-hero-visual hidden lg:flex relative items-center justify-center" aria-hidden="true">
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                <div class="w-72 h-72 rounded-full" style="background:radial-gradient(circle,rgba(124,58,237,0.2) 0%,transparent 70%)"></div>
            </div>
            <div class="relative w-full max-w-md">
                {{-- Browser chrome --}}
                <div class="rounded-2xl overflow-hidden border border-white/10 shadow-2xl shadow-primary/25" style="background:var(--color-surface-2)">
                    <div class="flex items-center gap-2 px-4 py-3 border-b border-white/6" style="background:var(--color-surface)">
                        <span class="w-3 h-3 rounded-full bg-red-500/70"></span>
                        <span class="w-3 h-3 rounded-full bg-yellow-500/70"></span>
                        <span class="w-3 h-3 rounded-full bg-green-500/70"></span>
                        <div class="flex-1 mx-3 px-3 py-1 rounded-md text-xs text-muted text-center" style="background:var(--color-bg)">
                            products.yoursite.com
                        </div>
                    </div>
                    <div class="p-4 space-y-3">
                        {{-- Filter tabs --}}
                        <div class="flex gap-2">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold text-white" style="background:rgba(124,58,237,0.3)">All</span>
                            @foreach(['E-Commerce','Restaurant','SaaS'] as $t)
                            <span class="px-3 py-1 rounded-full text-xs text-muted border border-white/6">{{ $t }}</span>
                            @endforeach
                        </div>
                        {{-- Product cards --}}
                        @foreach([
                            ['from-primary/20 to-purple-500/10','E-Commerce Pro'],
                            ['from-accent/20 to-yellow-500/10','Restaurant App'],
                            ['from-green-500/20 to-emerald-500/10','Portfolio CMS'],
                        ] as $j => $prod)
                        <div class="service-mini-card flex items-center gap-3 rounded-xl px-3 py-2.5 border border-white/6" style="background:var(--color-surface);animation-delay:{{ $j*0.25 }}s">
                            <div class="w-10 h-10 rounded-lg bg-linear-to-br {{ $prod[0] }} flex items-center justify-center shrink-0">
                                <svg width="14" height="14" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="1.5" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-white text-sm font-semibold truncate">{{ $prod[1] }}</p>
                                <div class="flex items-center gap-1.5 mt-0.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-400"></span>
                                    <span class="text-green-400 text-[10px] font-medium">{{ $bn ? 'লাইভ প্রিভিউ' : 'Live Preview' }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <p class="text-center text-muted text-xs pt-1">{{ $bn ? 'আরও ৫০+ প্রোডাক্ট' : '50+ more products' }} →</p>
                    </div>
                </div>
                {{-- Badges --}}
                <div class="absolute -top-3 -right-3 glass rounded-full px-3 py-1.5 flex items-center gap-2 shadow-xl z-10 text-xs font-semibold text-white border border-green-500/20">
                    <span class="w-2 h-2 rounded-full bg-green-400 animate-ping absolute"></span>
                    <span class="w-2 h-2 rounded-full bg-green-400 relative shrink-0"></span>
                    {{ $bn ? 'লাইভ প্রিভিউ' : 'Live Preview' }}
                </div>
                <div class="absolute -bottom-3 -left-3 glass rounded-2xl px-4 py-2.5 shadow-xl z-10 border border-primary/20">
                    <p class="text-muted text-xs">{{ $bn ? 'লঞ্চ' : 'Deploy in' }}</p>
                    <p class="text-xl font-extrabold grad-text">{{ $bn ? 'এক দিনে' : '1 Day' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ── WHY READY-MADE ──────────────────────────────────────────── --}}
<section class="py-24 max-w-7xl mx-auto px-4 sm:px-6" aria-labelledby="offer-heading">
    <div class="text-center mb-14 reveal">
        <span class="section-label">{{ __('svc_ready.offer_label') }}</span>
        <h2 id="offer-heading" class="text-3xl sm:text-4xl font-extrabold text-white mb-4 {{ $bn ? 'bn' : '' }}">{{ __('svc_ready.offer_heading') }}</h2>
        <p class="text-muted max-w-xl mx-auto {{ $bn ? 'bn' : '' }}">{{ __('svc_ready.offer_sub') }}</p>
    </div>
    @php
    $feats=[
        ['title'=>__('svc_ready.feat_1_title'),'desc'=>__('svc_ready.feat_1_desc'),'color'=>'#7C3AED','icon'=>'M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z'],
        ['title'=>__('svc_ready.feat_2_title'),'desc'=>__('svc_ready.feat_2_desc'),'color'=>'#A855F7','icon'=>'M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
        ['title'=>__('svc_ready.feat_3_title'),'desc'=>__('svc_ready.feat_3_desc'),'color'=>'#F59E0B','icon'=>'M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z'],
        ['title'=>__('svc_ready.feat_4_title'),'desc'=>__('svc_ready.feat_4_desc'),'color'=>'#EC4899','icon'=>'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01'],
        ['title'=>__('svc_ready.feat_5_title'),'desc'=>__('svc_ready.feat_5_desc'),'color'=>'#10B981','icon'=>'M13 2L3 14h9l-1 8 10-12h-9l1-8z'],
        ['title'=>__('svc_ready.feat_6_title'),'desc'=>__('svc_ready.feat_6_desc'),'color'=>'#06B6D4','icon'=>'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z'],
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


{{-- ── PRODUCTS ────────────────────────────────────────────────── --}}
<section id="products" class="py-20 max-w-7xl mx-auto px-4 sm:px-6"
         aria-labelledby="products-heading"
         x-data="{ filter: 'all' }">

    <div class="text-center mb-12 reveal">
        <span class="section-label">
            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            {{ __('products.section_label') }}
        </span>
        <h2 id="products-heading" class="text-3xl sm:text-4xl font-extrabold text-white mb-4 {{ $bn ? 'bn' : '' }}">
            {{ __('products.heading') }}
        </h2>
        <p class="text-muted max-w-xl mx-auto {{ $bn ? 'bn' : '' }}">{{ __('products.sub') }}</p>
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
            {{ $bn && $cat->name_bn ? $cat->name_bn : $cat->name_en }}
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
            <a href="{{ route('products.index') }}" class="btn-ghost">
                {{ __('common.view_all') }}
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    @else
        <p class="text-center text-muted py-16 {{ $bn ? 'bn' : '' }}">{{ __('products.empty') }}</p>
    @endif

</section>


{{-- ── HOW IT WORKS (4 Steps) ──────────────────────────────────── --}}
<section class="py-24 relative overflow-hidden" aria-labelledby="process-heading">
    <div class="absolute inset-0 bg-linear-to-b from-surface/0 via-surface/60 to-surface/0 pointer-events-none"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-16 reveal">
            <span class="section-label">
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                {{ __('svc_ready.process_label') }}
            </span>
            <h2 id="process-heading" class="text-3xl sm:text-4xl font-extrabold text-white {{ $bn ? 'bn' : '' }}">{{ __('svc_ready.process_heading') }}</h2>
        </div>
        @php
        $steps=[
            ['num'=>1,'title'=>__('svc_ready.step_1_title'),'desc'=>__('svc_ready.step_1_desc'),'color'=>'rgba(124,58,237,0.8)','icon'=>'M1 12S5 4 12 4s11 8 11 8-4 8-11 8S1 12 1 12zM12 9a3 3 0 100 6 3 3 0 000-6z'],
            ['num'=>2,'title'=>__('svc_ready.step_2_title'),'desc'=>__('svc_ready.step_2_desc'),'color'=>'rgba(168,85,247,0.8)','icon'=>'M9 11l3 3L22 4M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11'],
            ['num'=>3,'title'=>__('svc_ready.step_3_title'),'desc'=>__('svc_ready.step_3_desc'),'color'=>'rgba(245,158,11,0.8)','icon'=>'M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z'],
            ['num'=>4,'title'=>__('svc_ready.step_4_title'),'desc'=>__('svc_ready.step_4_desc'),'color'=>'rgba(16,185,129,0.8)','icon'=>'M13 2L3 14h9l-1 8 10-12h-9l1-8z'],
        ];
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-4 relative">
            <div class="hidden lg:block absolute top-10 left-[12.5%] right-[12.5%] h-px bg-white/6" aria-hidden="true">
                <div class="process-line-fill h-full bg-linear-to-r from-primary via-purple-500 to-accent w-0" id="process-line"></div>
            </div>
            @foreach($steps as $i => $s)
            <div class="process-step text-center reveal delay-{{ ($i+1)*100 }}">
                <div class="process-icon relative">
                    <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full flex items-center justify-center text-xs font-black text-white" style="background:{{ $s['color'] }}">{{ $s['num'] }}</span>
                    <svg width="26" height="26" fill="none" stroke="{{ $s['color'] }}" stroke-width="1.8" viewBox="0 0 24 24"><path d="{{ $s['icon'] }}"/></svg>
                </div>
                <h3 class="font-bold text-white text-base mb-2 {{ $bn ? 'bn' : '' }}">{{ $s['title'] }}</h3>
                <p class="text-muted text-sm leading-relaxed {{ $bn ? 'bn' : '' }}">{{ $s['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ── TECH STACK ──────────────────────────────────────────────── --}}
<section class="py-20 max-w-7xl mx-auto px-4 sm:px-6" aria-labelledby="tech-heading">
    <div class="text-center mb-10 reveal">
        <span class="section-label">{{ __('svc_ready.tech_label') }}</span>
        <h2 id="tech-heading" class="text-2xl sm:text-3xl font-extrabold text-white {{ $bn ? 'bn' : '' }}">{{ __('svc_ready.tech_heading') }}</h2>
    </div>
    <div class="flex flex-wrap justify-center gap-3 reveal delay-100">
        @foreach(['Laravel 12','PHP 8.2','Alpine.js','Tailwind CSS v4','MySQL 8','Vite','GSAP','Redis','REST API','VPS Deployment','SSL / HTTPS','Git'] as $tech)
        <span class="tech-pill px-4 py-2 text-sm font-medium">{{ $tech }}</span>
        @endforeach
    </div>
</section>


{{-- ── FAQ ─────────────────────────────────────────────────────── --}}
<section class="py-20 max-w-3xl mx-auto px-4 sm:px-6" aria-labelledby="faq-heading">
    <div class="text-center mb-12 reveal">
        <span class="section-label">{{ __('svc_ready.faq_label') }}</span>
        <h2 id="faq-heading" class="text-3xl font-extrabold text-white {{ $bn ? 'bn' : '' }}">{{ __('svc_ready.faq_heading') }}</h2>
    </div>
    <div x-data="{}">
        @foreach([['q'=>__('svc_ready.faq_1_q'),'a'=>__('svc_ready.faq_1_a')],['q'=>__('svc_ready.faq_2_q'),'a'=>__('svc_ready.faq_2_a')],['q'=>__('svc_ready.faq_3_q'),'a'=>__('svc_ready.faq_3_a')],['q'=>__('svc_ready.faq_4_q'),'a'=>__('svc_ready.faq_4_a')]] as $i => $faq)
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
    <div class="grad-border rounded-3xl overflow-hidden reveal">
        <div class="p-10 sm:p-14 lg:p-16 text-center" style="background:linear-gradient(135deg,rgba(124,58,237,0.08),rgba(245,158,11,0.04))">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4 {{ $bn ? 'bn' : '' }}">{{ __('svc_ready.cta_heading') }}</h2>
            <p class="text-muted max-w-lg mx-auto mb-8 {{ $bn ? 'bn' : '' }}">{{ __('svc_ready.cta_sub') }}</p>
            <div class="flex flex-wrap items-center justify-center gap-3">
                <a href="{{ route('products.index') }}" class="btn-primary magnetic">
                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    {{ __('svc_ready.cta_primary') }}
                </a>
                <a href="{{ route('custom-request') }}" class="btn-ghost magnetic">{{ __('svc_ready.cta_secondary') }}</a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    @vite('resources/js/pages/services.js')
@endpush
