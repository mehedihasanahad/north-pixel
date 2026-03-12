@extends('layouts.app')

@section('title', __('svc_web.page_title'))
@section('description', __('svc_web.page_desc'))

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

        {{-- Copy --}}
        <div class="text-center lg:text-left">
            <div class="svc-hero-badge inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-primary/30 bg-primary/8 text-purple-300 text-xs font-semibold tracking-wide uppercase mb-6">
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><path d="M16 2v4M8 2v4M2 10h20"/></svg>
                {{ __('svc_web.hero_badge') }}
            </div>

            <h1 id="svc-heading" class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-[1.1] tracking-tight mb-5 {{ $bn ? 'bn' : '' }}">
                @foreach(explode(' ', __('svc_web.hero_heading_1')) as $word)
                    <span class="svc-hero-word inline-block">{{ $word }}&nbsp;</span>
                @endforeach
                <br>
                <span class="grad-text">{{ __('svc_web.hero_heading_accent') }}</span>
            </h1>

            <p class="text-muted text-base sm:text-lg leading-relaxed max-w-lg mx-auto lg:mx-0 mb-8 {{ $bn ? 'bn' : '' }}">
                {{ __('svc_web.hero_sub') }}
            </p>

            <div class="svc-hero-ctas flex flex-wrap items-center justify-center lg:justify-start gap-3">
                <a href="{{ route('custom-request') }}" class="btn-primary magnetic">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                    {{ __('svc_web.cta_primary') }}
                </a>
                <a href="{{ route('services.ready') }}" class="btn-ghost magnetic">
                    {{ __('svc_web.cta_secondary') }}
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>

        {{-- Visual: Code editor mockup --}}
        <div class="svc-hero-visual hidden lg:flex relative items-center justify-center" aria-hidden="true">
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                <div class="w-72 h-72 rounded-full" style="background:radial-gradient(circle,rgba(124,58,237,0.2) 0%,transparent 70%)"></div>
            </div>
            <div class="relative w-full max-w-md">
                <div class="rounded-2xl overflow-hidden border border-white/10 shadow-2xl shadow-primary/20" style="background:var(--color-surface-2)">
                    {{-- Editor chrome --}}
                    <div class="flex items-center gap-2 px-4 py-3 border-b border-white/6" style="background:var(--color-surface)">
                        <span class="w-3 h-3 rounded-full bg-red-500/70"></span>
                        <span class="w-3 h-3 rounded-full bg-yellow-500/70"></span>
                        <span class="w-3 h-3 rounded-full bg-green-500/70"></span>
                        <span class="ml-3 text-xs text-muted font-mono">app/Http/Controllers/HomeController.php</span>
                    </div>
                    {{-- Code lines --}}
                    <div class="p-5 font-mono text-xs leading-7 space-y-0.5">
                        <p><span class="text-purple-400">class</span> <span class="text-green-400">HomeController</span> <span class="text-white">extends</span> <span class="text-green-400">Controller</span></p>
                        <p><span class="text-white">{</span></p>
                        <p>&nbsp;&nbsp;<span class="text-purple-400">public function</span> <span class="text-yellow-300">index</span><span class="text-white">(): View</span></p>
                        <p>&nbsp;&nbsp;<span class="text-white">{</span></p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$products</span> = <span class="text-green-400">Product</span>::<span class="text-yellow-300">featured</span><span class="text-white">()</span></p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-><span class="text-yellow-300">with</span><span class="text-white">(</span><span class="text-orange-300">'category'</span><span class="text-white">)</span></p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-><span class="text-yellow-300">active</span><span class="text-white">()</span></p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-><span class="text-yellow-300">get</span><span class="text-white">();</span></p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">return</span> <span class="text-yellow-300">view</span><span class="text-white">(</span><span class="text-orange-300">'pages.home'</span><span class="text-white">, compact(</span><span class="text-orange-300">'products'</span><span class="text-white">));</span></p>
                        <p>&nbsp;&nbsp;<span class="text-white">}</span></p>
                        <p><span class="text-white">}</span><span class="code-cursor"></span></p>
                    </div>
                    {{-- Bottom bar --}}
                    <div class="flex items-center justify-between px-5 py-2.5 border-t border-white/6" style="background:var(--color-surface)">
                        <div class="flex gap-3">
                            <span class="px-2 py-0.5 rounded text-xs" style="background:rgba(124,58,237,0.2);color:#C4B5FD">PHP 8.2</span>
                            <span class="px-2 py-0.5 rounded text-xs" style="background:rgba(16,185,129,0.15);color:#6EE7B7">Laravel 12</span>
                        </div>
                        <span class="text-muted text-xs">Ln 12, Col 1</span>
                    </div>
                </div>
                {{-- Floating badges --}}
                <div class="absolute -top-3 -right-3 glass rounded-full px-3 py-1.5 flex items-center gap-2 shadow-xl z-10 text-xs font-semibold text-white border border-primary/20">
                    <span class="w-2 h-2 rounded-full bg-green-400 animate-ping absolute"></span>
                    <span class="w-2 h-2 rounded-full bg-green-400 relative shrink-0"></span>
                    {{ $bn ? 'প্রোডাকশন রেডি' : 'Production Ready' }}
                </div>
                <div class="absolute -bottom-3 -left-3 glass rounded-2xl px-4 py-2.5 shadow-xl z-10 border border-primary/20">
                    <p class="text-muted text-xs">{{ $bn ? 'টাইমলাইন' : 'Timeline' }}</p>
                    <p class="text-lg font-extrabold grad-text">{{ $bn ? '৪ সপ্তাহ' : '4 Weeks' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ── WHAT WE OFFER ───────────────────────────────────────────── --}}
<section class="py-24 max-w-7xl mx-auto px-4 sm:px-6" aria-labelledby="offer-heading">
    <div class="text-center mb-14 reveal">
        <span class="section-label">{{ __('svc_web.offer_label') }}</span>
        <h2 id="offer-heading" class="text-3xl sm:text-4xl font-extrabold text-white mb-4 {{ $bn ? 'bn' : '' }}">{{ __('svc_web.offer_heading') }}</h2>
        <p class="text-muted max-w-xl mx-auto {{ $bn ? 'bn' : '' }}">{{ __('svc_web.offer_sub') }}</p>
    </div>

    @php
    $feats = [
        ['title' => __('svc_web.feat_1_title'), 'desc' => __('svc_web.feat_1_desc'), 'color' => '#7C3AED',
         'icon' => 'M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z'],
        ['title' => __('svc_web.feat_2_title'), 'desc' => __('svc_web.feat_2_desc'), 'color' => '#A855F7',
         'icon' => 'M3 3h18v18H3V3zm9 4v4m0 4h.01'],
        ['title' => __('svc_web.feat_3_title'), 'desc' => __('svc_web.feat_3_desc'), 'color' => '#F59E0B',
         'icon' => 'M13 2L3 14h9l-1 8 10-12h-9l1-8z'],
        ['title' => __('svc_web.feat_4_title'), 'desc' => __('svc_web.feat_4_desc'), 'color' => '#10B981',
         'icon' => 'M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'],
        ['title' => __('svc_web.feat_5_title'), 'desc' => __('svc_web.feat_5_desc'), 'color' => '#06B6D4',
         'icon' => 'M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
        ['title' => __('svc_web.feat_6_title'), 'desc' => __('svc_web.feat_6_desc'), 'color' => '#EC4899',
         'icon' => 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'],
    ];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach($feats as $i => $f)
        <div class="tilt-card product-card p-6 reveal delay-{{ ($i % 3 + 1) * 100 }}">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-4"
                 style="background:{{ $f['color'] }}18;border:1px solid {{ $f['color'] }}30">
                <svg width="22" height="22" fill="none" stroke="{{ $f['color'] }}" stroke-width="1.8" viewBox="0 0 24 24">
                    <path d="{{ $f['icon'] }}"/>
                </svg>
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
            <span class="section-label">{{ __('svc_web.process_label') }}</span>
            <h2 id="process-heading" class="text-3xl sm:text-4xl font-extrabold text-white {{ $bn ? 'bn' : '' }}">
                {{ __('svc_web.process_heading') }}
            </h2>
        </div>
        @php
        $steps = [
            ['num'=>1,'title'=>__('svc_web.step_1_title'),'desc'=>__('svc_web.step_1_desc'),'color'=>'rgba(124,58,237,0.8)','icon'=>'M1 12S5 4 12 4s11 8 11 8-4 8-11 8S1 12 1 12zM12 9a3 3 0 100 6 3 3 0 000-6z'],
            ['num'=>2,'title'=>__('svc_web.step_2_title'),'desc'=>__('svc_web.step_2_desc'),'color'=>'rgba(168,85,247,0.8)','icon'=>'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z'],
            ['num'=>3,'title'=>__('svc_web.step_3_title'),'desc'=>__('svc_web.step_3_desc'),'color'=>'rgba(245,158,11,0.8)','icon'=>'M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
            ['num'=>4,'title'=>__('svc_web.step_4_title'),'desc'=>__('svc_web.step_4_desc'),'color'=>'rgba(16,185,129,0.8)','icon'=>'M13 2L3 14h9l-1 8 10-12h-9l1-8z'],
        ];
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-4 relative">
            <div class="hidden lg:block absolute top-10 left-[12.5%] right-[12.5%] h-px bg-white/6" aria-hidden="true">
                <div class="process-line-fill h-full bg-linear-to-r from-primary via-purple-500 to-accent w-0" id="process-line"></div>
            </div>
            @foreach($steps as $i => $s)
            <div class="process-step text-center reveal delay-{{ ($i+1)*100 }}">
                <div class="process-icon relative">
                    <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full flex items-center justify-center text-xs font-black text-white"
                          style="background:{{ $s['color'] }}">{{ $s['num'] }}</span>
                    <svg width="26" height="26" fill="none" stroke="{{ $s['color'] }}" stroke-width="1.8" viewBox="0 0 24 24">
                        <path d="{{ $s['icon'] }}"/>
                    </svg>
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
        <span class="section-label">{{ __('svc_web.tech_label') }}</span>
        <h2 id="tech-heading" class="text-2xl sm:text-3xl font-extrabold text-white {{ $bn ? 'bn' : '' }}">{{ __('svc_web.tech_heading') }}</h2>
    </div>
    <div class="flex flex-wrap justify-center gap-3 reveal delay-100">
        @foreach(['Laravel','PHP 8.2','Next.js','React','Vue.js','Tailwind CSS','MySQL','Redis','TypeScript','Vite','Docker','Nginx'] as $tech)
        <span class="tech-pill px-4 py-2 text-sm font-medium">{{ $tech }}</span>
        @endforeach
    </div>
</section>


{{-- ── PRICING ─────────────────────────────────────────────────── --}}
<section class="py-24 relative overflow-hidden" aria-labelledby="pricing-heading">
    <div class="absolute inset-0 bg-linear-to-b from-surface/0 via-surface/40 to-surface/0 pointer-events-none"></div>
    <div class="relative max-w-5xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14 reveal">
            <span class="section-label">{{ __('svc_web.pricing_label') }}</span>
            <h2 id="pricing-heading" class="text-3xl sm:text-4xl font-extrabold text-white mb-3 {{ $bn ? 'bn' : '' }}">{{ __('svc_web.pricing_heading') }}</h2>
            <p class="text-muted {{ $bn ? 'bn' : '' }}">{{ __('svc_web.pricing_sub') }}</p>
        </div>
        @php
        $pkgs = [
            ['name'=>__('svc_web.pkg_1_name'),'price'=>__('svc_web.pkg_1_price'),'desc'=>__('svc_web.pkg_1_desc'),
             'color'=>'#7C3AED','featured'=>false,
             'perks'=>['Landing page / 5-page site','Mobile responsive','SEO basics','Contact form','1 round of revisions']],
            ['name'=>__('svc_web.pkg_2_name'),'price'=>__('svc_web.pkg_2_price'),'desc'=>__('svc_web.pkg_2_desc'),
             'color'=>'#A855F7','featured'=>true,
             'perks'=>['Full-stack web app','Auth system','Admin panel','API integrations','Deployment + SSL','3 rounds of revisions']],
            ['name'=>__('svc_web.pkg_3_name'),'price'=>__('svc_web.pkg_3_price'),'desc'=>__('svc_web.pkg_3_desc'),
             'color'=>'#F59E0B','featured'=>false,
             'perks'=>['Unlimited complexity','Multi-tenant / SaaS','Custom architecture','Dedicated engineer','Priority support','Custom timeline']],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            @foreach($pkgs as $i => $pkg)
            <div class="product-card p-7 flex flex-col reveal delay-{{ ($i+1)*100 }} {{ $pkg['featured'] ? 'border-primary/40' : '' }}"
                 style="{{ $pkg['featured'] ? 'box-shadow:0 0 48px rgba(124,58,237,0.2)' : '' }}">
                @if($pkg['featured'])
                <div class="inline-flex items-center gap-1.5 self-start mb-3 px-3 py-1 rounded-full text-xs font-bold uppercase"
                     style="background:rgba(124,58,237,0.15);border:1px solid rgba(124,58,237,0.3);color:#C4B5FD">
                    <span class="w-1.5 h-1.5 rounded-full bg-accent animate-pulse"></span>
                    {{ $bn ? 'সবচেয়ে জনপ্রিয়' : 'Most Popular' }}
                </div>
                @endif
                <p class="text-muted text-xs font-semibold uppercase tracking-wide mb-1">{{ $pkg['name'] }}</p>
                <p class="text-3xl font-extrabold mb-1" style="color:{{ $pkg['color'] }}">{{ $pkg['price'] }}</p>
                <p class="text-muted text-sm mb-5 {{ $bn ? 'bn' : '' }}">{{ $pkg['desc'] }}</p>
                <ul class="space-y-2.5 mb-7 flex-1">
                    @foreach($pkg['perks'] as $perk)
                    <li class="flex items-center gap-2.5 text-sm text-muted">
                        <span class="w-4 h-4 rounded-full flex items-center justify-center shrink-0"
                              style="background:{{ $pkg['color'] }}18;border:1px solid {{ $pkg['color'] }}30">
                            <svg width="8" height="8" fill="none" stroke="{{ $pkg['color'] }}" stroke-width="3" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>
                        </span>
                        {{ $perk }}
                    </li>
                    @endforeach
                </ul>
                <a href="{{ route('custom-request') }}" class="{{ $pkg['featured'] ? 'btn-primary' : 'btn-ghost' }} w-full justify-center">
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
        <span class="section-label">{{ __('svc_web.faq_label') }}</span>
        <h2 id="faq-heading" class="text-3xl font-extrabold text-white {{ $bn ? 'bn' : '' }}">{{ __('svc_web.faq_heading') }}</h2>
    </div>
    @php
    $faqs = [
        ['q' => __('svc_web.faq_1_q'), 'a' => __('svc_web.faq_1_a')],
        ['q' => __('svc_web.faq_2_q'), 'a' => __('svc_web.faq_2_a')],
        ['q' => __('svc_web.faq_3_q'), 'a' => __('svc_web.faq_3_a')],
        ['q' => __('svc_web.faq_4_q'), 'a' => __('svc_web.faq_4_a')],
    ];
    @endphp
    <div class="space-y-0" x-data="{}">
        @foreach($faqs as $i => $faq)
        <div class="faq-item reveal delay-{{ ($i+1)*100 }}" x-data="{ open: false }">
            <button @click="open = !open"
                    class="w-full flex items-center justify-between py-5 text-left"
                    :aria-expanded="open">
                <span class="text-white font-semibold pr-4 {{ $bn ? 'bn' : '' }}">{{ $faq['q'] }}</span>
                <span class="shrink-0 w-7 h-7 rounded-full border border-white/12 flex items-center justify-center transition-transform duration-300"
                      :class="open ? 'rotate-45 border-primary/50 bg-primary/10' : ''">
                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                </span>
            </button>
            <div x-show="open" x-collapse>
                <p class="pb-5 text-muted text-sm leading-relaxed {{ $bn ? 'bn' : '' }}">{{ $faq['a'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>


{{-- ── FINAL CTA ───────────────────────────────────────────────── --}}
<section class="py-20 max-w-7xl mx-auto px-4 sm:px-6" aria-labelledby="cta-heading">
    <div class="grad-border rounded-3xl overflow-hidden reveal">
        <div class="p-10 sm:p-14 lg:p-16 text-center" style="background:linear-gradient(135deg,rgba(124,58,237,0.08),rgba(245,158,11,0.04))">
            <div class="w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6"
                 style="background:linear-gradient(135deg,rgba(124,58,237,0.2),rgba(168,85,247,0.1));border:1px solid rgba(124,58,237,0.3)">
                <svg width="28" height="28" fill="none" stroke="#A855F7" stroke-width="1.8" viewBox="0 0 24 24">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><path d="M16 2v4M8 2v4M2 10h20"/>
                </svg>
            </div>
            <h2 id="cta-heading" class="text-3xl sm:text-4xl font-extrabold text-white mb-4 {{ $bn ? 'bn' : '' }}">
                {{ __('svc_web.cta_heading') }}
            </h2>
            <p class="text-muted max-w-lg mx-auto mb-8 {{ $bn ? 'bn' : '' }}">{{ __('svc_web.cta_sub') }}</p>
            <div class="flex flex-wrap items-center justify-center gap-3">
                <a href="{{ route('custom-request') }}" class="btn-primary magnetic">
                    {{ __('svc_web.cta_primary') }}
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('contact') }}" class="btn-ghost magnetic">
                    {{ $bn ? 'যোগাযোগ করুন' : 'Contact Us' }}
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    @vite('resources/js/pages/services.js')
@endpush
