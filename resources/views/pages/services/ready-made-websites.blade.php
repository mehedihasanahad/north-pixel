@extends('layouts.app')

@section('title', __('svc_ready.page_title'))
@section('description', __('svc_ready.page_desc'))

@section('content')

{{-- ── HERO ── --}}
<section class="hero-light relative overflow-hidden pt-[70px]" aria-labelledby="svc-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-16 lg:py-24 grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">

        {{-- Copy --}}
        <div class="text-center lg:text-left reveal">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-primary/25
                 bg-primary/6 text-primary text-xs font-semibold tracking-wide uppercase mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                {{ __('svc_ready.hero_badge') }}
            </div>

            <h1 id="svc-heading" class="text-4xl sm:text-5xl lg:text-[3.25rem] font-extrabold leading-[1.1] tracking-tight mb-5 text-text">
                {{ __('svc_ready.hero_heading_1') }}<br>
                <span class="grad-text">{{ __('svc_ready.hero_heading_accent') }}</span>
            </h1>

            <p class="text-muted text-base sm:text-lg leading-relaxed max-w-lg mx-auto lg:mx-0 mb-8">
                {{ __('svc_ready.hero_sub') }}
            </p>

            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3">
                <a href="{{ route('products.index') }}" class="btn-primary">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    {{ __('svc_ready.cta_primary') }}
                </a>
                <a href="{{ route('custom-request') }}" class="btn-ghost">
                    {{ __('svc_ready.cta_secondary') }}
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>

        {{-- Visual: Light browser chrome with product catalog --}}
        <div class="hidden lg:flex relative items-center justify-center reveal delay-200" aria-hidden="true">
            <div class="relative w-full max-w-md">
                <div class="rounded-2xl overflow-hidden border border-black/8 shadow-2xl shadow-black/10">
                    {{-- Browser chrome --}}
                    <div class="flex items-center gap-2 px-4 py-3 border-b border-black/6 bg-surface">
                        <span class="w-3 h-3 rounded-full bg-red-400/50"></span>
                        <span class="w-3 h-3 rounded-full bg-yellow-400/50"></span>
                        <span class="w-3 h-3 rounded-full bg-green-400/50"></span>
                        <div class="flex-1 mx-3 px-3 py-1 rounded-md text-xs text-muted text-center bg-white border border-black/6">
                            products.yoursite.com
                        </div>
                    </div>
                    <div class="bg-white p-4 space-y-3">
                        {{-- Filter tabs --}}
                        <div class="flex gap-2">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold text-white bg-primary">All</span>
                            @foreach(['E-Commerce','Restaurant','SaaS'] as $t)
                            <span class="px-3 py-1 rounded-full text-xs text-muted border border-black/8">{{ $t }}</span>
                            @endforeach
                        </div>
                        {{-- Product cards --}}
                        @foreach([
                            ['#EF1B3F','E-Commerce Pro',    'Multi-vendor marketplace'],
                            ['#F59E0B','Restaurant App',    'Online ordering + POS'],
                            ['#059669','Portfolio CMS',     'Clean portfolio + blog'],
                        ] as $j => $prod)
                        <div class="flex items-center gap-3 rounded-xl px-3 py-2.5 border border-black/6 bg-surface">
                            <div class="w-10 h-10 rounded-lg flex items-center justify-center shrink-0"
                                 style="background:{{ $prod[0] }}0D">
                                <svg width="14" height="14" fill="none" stroke="{{ $prod[0] }}" stroke-width="1.5" viewBox="0 0 24 24">
                                    <rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-text text-sm font-semibold truncate">{{ $prod[1] }}</p>
                                <p class="text-muted text-xs">{{ $prod[2] }}</p>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-400"></span>
                                <span class="text-green-600 text-[10px] font-medium">Live Preview</span>
                            </div>
                        </div>
                        @endforeach
                        <p class="text-center text-muted text-xs pt-1">50+ more products →</p>
                    </div>
                </div>
                <div class="absolute -top-3 -right-3 glass rounded-full px-3 py-1.5 flex items-center gap-2 shadow-xl z-10 text-xs font-semibold text-text">
                    <span class="w-2 h-2 rounded-full bg-green-400 animate-ping absolute"></span>
                    <span class="w-2 h-2 rounded-full bg-green-400 relative shrink-0"></span>
                    Live Preview
                </div>
                <div class="absolute -bottom-3 -left-3 glass rounded-2xl px-4 py-2.5 shadow-xl z-10">
                    <p class="text-muted text-xs">Deploy in</p>
                    <p class="text-xl font-extrabold grad-text">1 Day</p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ── WHY READY-MADE ── --}}
<section class="py-24 bg-surface" aria-labelledby="offer-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('svc_ready.offer_label') }}</p>
            <h2 id="offer-heading" class="text-3xl sm:text-4xl font-extrabold text-text mb-4">{{ __('svc_ready.offer_heading') }}</h2>
            <p class="text-muted max-w-xl mx-auto">{{ __('svc_ready.offer_sub') }}</p>
        </div>
        @php
        $feats=[
            ['title'=>__('svc_ready.feat_1_title'),'desc'=>__('svc_ready.feat_1_desc'),'color'=>'#EF1B3F','icon'=>'M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z'],
            ['title'=>__('svc_ready.feat_2_title'),'desc'=>__('svc_ready.feat_2_desc'),'color'=>'#3B82F6','icon'=>'M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
            ['title'=>__('svc_ready.feat_3_title'),'desc'=>__('svc_ready.feat_3_desc'),'color'=>'#F59E0B','icon'=>'M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z'],
            ['title'=>__('svc_ready.feat_4_title'),'desc'=>__('svc_ready.feat_4_desc'),'color'=>'#8B5CF6','icon'=>'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01'],
            ['title'=>__('svc_ready.feat_5_title'),'desc'=>__('svc_ready.feat_5_desc'),'color'=>'#059669','icon'=>'M13 2L3 14h9l-1 8 10-12h-9l1-8z'],
            ['title'=>__('svc_ready.feat_6_title'),'desc'=>__('svc_ready.feat_6_desc'),'color'=>'#06B6D4','icon'=>'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z'],
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


{{-- ── PRODUCTS ── --}}
<section id="products" class="py-20 bg-white" aria-labelledby="products-heading" x-data="{ filter: 'all' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('products.section_label') }}</p>
            <h2 id="products-heading" class="text-3xl sm:text-4xl font-extrabold text-text mb-4">{{ __('products.heading') }}</h2>
            <p class="text-muted max-w-xl mx-auto">{{ __('products.sub') }}</p>
        </div>

        @if($categories->count())
        <div class="flex flex-wrap justify-center gap-2 mb-10 reveal delay-100">
            <button @click="filter = 'all'" :class="filter === 'all' ? 'active' : ''" class="tech-pill px-4 py-1.5 text-sm font-medium">
                {{ __('products.filter_all') }}
            </button>
            @foreach($categories as $cat)
            <button @click="filter = '{{ $cat->slug }}'" :class="filter === '{{ $cat->slug }}' ? 'active' : ''" class="tech-pill px-4 py-1.5 text-sm font-medium">
                {{ $cat->name_en }}
            </button>
            @endforeach
        </div>
        @endif

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
        <p class="text-center text-muted py-16">{{ __('products.empty') }}</p>
        @endif
    </div>
</section>


{{-- ── HOW IT WORKS ── --}}
<section class="py-24 bg-surface" aria-labelledby="process-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('svc_ready.process_label') }}</p>
            <h2 id="process-heading" class="text-3xl sm:text-4xl font-extrabold text-text">{{ __('svc_ready.process_heading') }}</h2>
        </div>
        @php
        $steps=[
            ['num'=>1,'title'=>__('svc_ready.step_1_title'),'desc'=>__('svc_ready.step_1_desc'),'color'=>'#EF1B3F','icon'=>'M1 12S5 4 12 4s11 8 11 8-4 8-11 8S1 12 1 12zM12 9a3 3 0 100 6 3 3 0 000-6z'],
            ['num'=>2,'title'=>__('svc_ready.step_2_title'),'desc'=>__('svc_ready.step_2_desc'),'color'=>'#F59E0B','icon'=>'M9 11l3 3L22 4M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11'],
            ['num'=>3,'title'=>__('svc_ready.step_3_title'),'desc'=>__('svc_ready.step_3_desc'),'color'=>'#3B82F6','icon'=>'M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z'],
            ['num'=>4,'title'=>__('svc_ready.step_4_title'),'desc'=>__('svc_ready.step_4_desc'),'color'=>'#059669','icon'=>'M13 2L3 14h9l-1 8 10-12h-9l1-8z'],
        ];
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 relative">
            <div class="hidden lg:block absolute top-9 left-[12.5%] right-[12.5%] h-px bg-black/8" aria-hidden="true"></div>
            @foreach($steps as $i => $s)
            <div class="text-center reveal delay-{{ ($i+1)*100 }}">
                <div class="relative w-16 h-16 rounded-full border border-black/8 bg-white flex items-center justify-center mx-auto mb-5">
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


{{-- ── TECH STACK ── --}}
<section class="py-20 bg-white" aria-labelledby="tech-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-10 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('svc_ready.tech_label') }}</p>
            <h2 id="tech-heading" class="text-2xl sm:text-3xl font-extrabold text-text">{{ __('svc_ready.tech_heading') }}</h2>
        </div>
        <div class="flex flex-wrap justify-center gap-3 reveal delay-100">
            @foreach(['Laravel 12','PHP 8.2','Alpine.js','Tailwind CSS v4','MySQL 8','Vite','Redis','REST API','VPS Deployment','SSL / HTTPS','Git'] as $tech)
            <span class="tech-pill px-4 py-2 text-sm font-medium">{{ $tech }}</span>
            @endforeach
        </div>
    </div>
</section>


{{-- ── FAQ ── --}}
<section class="py-20 bg-surface" aria-labelledby="faq-heading">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('svc_ready.faq_label') }}</p>
            <h2 id="faq-heading" class="text-3xl font-extrabold text-text">{{ __('svc_ready.faq_heading') }}</h2>
        </div>
        <div x-data="{}">
            @foreach([
                ['q'=>__('svc_ready.faq_1_q'),'a'=>__('svc_ready.faq_1_a')],
                ['q'=>__('svc_ready.faq_2_q'),'a'=>__('svc_ready.faq_2_a')],
                ['q'=>__('svc_ready.faq_3_q'),'a'=>__('svc_ready.faq_3_a')],
                ['q'=>__('svc_ready.faq_4_q'),'a'=>__('svc_ready.faq_4_a')],
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
<section class="py-20 bg-text" aria-labelledby="cta-ready-heading">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center reveal">
        <h2 id="cta-ready-heading" class="text-3xl sm:text-4xl font-extrabold text-white mb-4">{{ __('svc_ready.cta_heading') }}</h2>
        <p class="text-white/55 max-w-lg mx-auto mb-8">{{ __('svc_ready.cta_sub') }}</p>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('products.index') }}" class="btn-primary">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                {{ __('svc_ready.cta_primary') }}
            </a>
            <a href="{{ route('custom-request') }}" class="btn-ghost-dark">{{ __('svc_ready.cta_secondary') }}</a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    @vite('resources/js/pages/services.js')
@endpush
