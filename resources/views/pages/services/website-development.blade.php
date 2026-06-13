@extends('layouts.app')

@section('title', __('svc_web.page_title'))
@section('description', __('svc_web.page_desc'))

@section('content')

{{-- ── HERO ── --}}
<section class="hero-light relative overflow-hidden pt-[70px]" aria-labelledby="svc-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-16 lg:py-24 grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">

        {{-- Copy --}}
        <div class="text-center lg:text-left reveal">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-primary/25
                 bg-primary/6 text-primary text-xs font-semibold tracking-wide uppercase mb-6">
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                </svg>
                {{ __('svc_web.hero_badge') }}
            </div>

            <h1 id="svc-heading" class="text-4xl sm:text-5xl lg:text-[3.25rem] font-extrabold leading-[1.1] tracking-tight mb-5 text-text">
                {{ __('svc_web.hero_heading_1') }}<br>
                <span class="grad-text">{{ __('svc_web.hero_heading_accent') }}</span>
            </h1>

            <p class="text-muted text-base sm:text-lg leading-relaxed max-w-lg mx-auto lg:mx-0 mb-8">
                {{ __('svc_web.hero_sub') }}
            </p>

            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3">
                <a href="{{ route('custom-request') }}" class="btn-primary">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                    {{ __('svc_web.cta_primary') }}
                </a>
                <a href="{{ route('services.ready') }}" class="btn-ghost">
                    {{ __('svc_web.cta_secondary') }}
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>

        {{-- Visual: dark code editor (appropriate for dev context) --}}
        <div class="hidden lg:flex relative items-center justify-center reveal delay-200" aria-hidden="true">
            <div class="relative w-full max-w-md">
                <div class="rounded-2xl overflow-hidden border border-black/8 shadow-2xl shadow-black/12" style="background:#0D0D14">
                    {{-- Editor chrome --}}
                    <div class="flex items-center gap-2 px-4 py-3 border-b border-white/8" style="background:#161622">
                        <span class="w-3 h-3 rounded-full bg-red-500/70"></span>
                        <span class="w-3 h-3 rounded-full bg-yellow-500/70"></span>
                        <span class="w-3 h-3 rounded-full bg-green-500/70"></span>
                        <span class="ml-3 text-[11px] text-white/40 font-mono">app/Http/Controllers/HomeController.php</span>
                    </div>
                    {{-- Code lines --}}
                    <div class="p-5 font-mono text-xs leading-7">
                        <p><span class="text-purple-400">class</span> <span class="text-green-400">HomeController</span> <span class="text-white/80">extends</span> <span class="text-green-400">Controller</span></p>
                        <p><span class="text-white/80">{</span></p>
                        <p>&nbsp;&nbsp;<span class="text-purple-400">public function</span> <span class="text-yellow-300">index</span><span class="text-white/80">(): View</span></p>
                        <p>&nbsp;&nbsp;<span class="text-white/80">{</span></p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">$products</span> = <span class="text-green-400">Product</span>::<span class="text-yellow-300">featured</span><span class="text-white/80">()</span></p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-><span class="text-yellow-300">with</span><span class="text-white/80">(</span><span class="text-orange-300">'category'</span><span class="text-white/80">)</span></p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-><span class="text-yellow-300">get</span><span class="text-white/80">();</span></p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">return</span> <span class="text-yellow-300">view</span><span class="text-white/80">(</span><span class="text-orange-300">'pages.home'</span><span class="text-white/80">, compact(</span><span class="text-orange-300">'products'</span><span class="text-white/80">));</span></p>
                        <p>&nbsp;&nbsp;<span class="text-white/80">}</span></p>
                        <p><span class="text-white/80">}</span><span class="code-cursor"></span></p>
                    </div>
                    {{-- Bottom bar --}}
                    <div class="flex items-center justify-between px-5 py-2.5 border-t border-white/8" style="background:#161622">
                        <div class="flex gap-2">
                            <span class="px-2 py-0.5 rounded text-xs" style="background:rgba(239,27,63,0.18);color:#FF8899">PHP 8.2</span>
                            <span class="px-2 py-0.5 rounded text-xs" style="background:rgba(16,185,129,0.15);color:#6EE7B7">Laravel 12</span>
                        </div>
                        <span class="text-white/30 text-xs">Ln 12, Col 1</span>
                    </div>
                </div>
                {{-- Floating badges --}}
                <div class="absolute -top-3 -right-3 glass rounded-full px-3 py-1.5 flex items-center gap-2 shadow-xl z-10 text-xs font-semibold text-text border border-green-500/20">
                    <span class="w-2 h-2 rounded-full bg-green-400 animate-ping absolute"></span>
                    <span class="w-2 h-2 rounded-full bg-green-400 relative shrink-0"></span>
                    Production Ready
                </div>
                <div class="absolute -bottom-3 -left-3 glass rounded-2xl px-4 py-2.5 shadow-xl z-10">
                    <p class="text-muted text-xs">Timeline</p>
                    <p class="text-lg font-extrabold grad-text">4 Weeks</p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ── WHAT WE OFFER ── --}}
<section class="py-24 bg-surface" aria-labelledby="offer-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('svc_web.offer_label') }}</p>
            <h2 id="offer-heading" class="text-3xl sm:text-4xl font-extrabold text-text mb-4">{{ __('svc_web.offer_heading') }}</h2>
            <p class="text-muted max-w-xl mx-auto">{{ __('svc_web.offer_sub') }}</p>
        </div>

        @php
        $feats = [
            ['title' => __('svc_web.feat_1_title'), 'desc' => __('svc_web.feat_1_desc'), 'color' => '#EF1B3F',
             'icon' => 'M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z'],
            ['title' => __('svc_web.feat_2_title'), 'desc' => __('svc_web.feat_2_desc'), 'color' => '#3B82F6',
             'icon' => 'M3 3h18v18H3V3zm9 4v4m0 4h.01'],
            ['title' => __('svc_web.feat_3_title'), 'desc' => __('svc_web.feat_3_desc'), 'color' => '#F59E0B',
             'icon' => 'M13 2L3 14h9l-1 8 10-12h-9l1-8z'],
            ['title' => __('svc_web.feat_4_title'), 'desc' => __('svc_web.feat_4_desc'), 'color' => '#059669',
             'icon' => 'M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'],
            ['title' => __('svc_web.feat_5_title'), 'desc' => __('svc_web.feat_5_desc'), 'color' => '#06B6D4',
             'icon' => 'M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
            ['title' => __('svc_web.feat_6_title'), 'desc' => __('svc_web.feat_6_desc'), 'color' => '#8B5CF6',
             'icon' => 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'],
        ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($feats as $i => $f)
            <div class="bg-white border border-black/6 rounded-2xl p-6 transition hover:shadow-md hover:-translate-y-1 reveal delay-{{ ($i%3+1)*100 }}">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-4"
                     style="background:{{ $f['color'] }}0D;border:1px solid {{ $f['color'] }}22">
                    <svg width="20" height="20" fill="none" stroke="{{ $f['color'] }}" stroke-width="1.8" viewBox="0 0 24 24">
                        <path d="{{ $f['icon'] }}"/>
                    </svg>
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
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('svc_web.process_label') }}</p>
            <h2 id="process-heading" class="text-3xl sm:text-4xl font-extrabold text-text">{{ __('svc_web.process_heading') }}</h2>
        </div>
        @php
        $steps = [
            ['num'=>1,'title'=>__('svc_web.step_1_title'),'desc'=>__('svc_web.step_1_desc'),'color'=>'#EF1B3F',
             'icon'=>'M1 12S5 4 12 4s11 8 11 8-4 8-11 8S1 12 1 12zM12 9a3 3 0 100 6 3 3 0 000-6z'],
            ['num'=>2,'title'=>__('svc_web.step_2_title'),'desc'=>__('svc_web.step_2_desc'),'color'=>'#8B5CF6',
             'icon'=>'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z'],
            ['num'=>3,'title'=>__('svc_web.step_3_title'),'desc'=>__('svc_web.step_3_desc'),'color'=>'#F59E0B',
             'icon'=>'M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
            ['num'=>4,'title'=>__('svc_web.step_4_title'),'desc'=>__('svc_web.step_4_desc'),'color'=>'#059669',
             'icon'=>'M13 2L3 14h9l-1 8 10-12h-9l1-8z'],
        ];
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 relative">
            <div class="hidden lg:block absolute top-9 left-[12.5%] right-[12.5%] h-px bg-black/8" aria-hidden="true"></div>
            @foreach($steps as $i => $s)
            <div class="text-center reveal delay-{{ ($i+1)*100 }}">
                <div class="relative w-16 h-16 rounded-full border border-black/8 bg-surface flex items-center justify-center mx-auto mb-5">
                    <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full flex items-center justify-center text-xs font-black text-white"
                          style="background:{{ $s['color'] }}">{{ $s['num'] }}</span>
                    <svg width="22" height="22" fill="none" stroke="{{ $s['color'] }}" stroke-width="1.8" viewBox="0 0 24 24">
                        <path d="{{ $s['icon'] }}"/>
                    </svg>
                </div>
                <h3 class="font-bold text-text text-sm mb-2">{{ $s['title'] }}</h3>
                <p class="text-muted text-sm leading-relaxed">{{ $s['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ── TECH STACK ── --}}
<section class="py-20 bg-surface" aria-labelledby="tech-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-10 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('svc_web.tech_label') }}</p>
            <h2 id="tech-heading" class="text-2xl sm:text-3xl font-extrabold text-text">{{ __('svc_web.tech_heading') }}</h2>
        </div>
        <div class="flex flex-wrap justify-center gap-3 reveal delay-100">
            @foreach(['Laravel','PHP 8.2','Next.js','React','Vue.js','Tailwind CSS','MySQL','Redis','TypeScript','Vite','Docker','Nginx'] as $tech)
            <span class="tech-pill px-4 py-2 text-sm font-medium">{{ $tech }}</span>
            @endforeach
        </div>
    </div>
</section>


{{-- ── FAQ ── --}}
<section class="py-20 bg-surface" aria-labelledby="faq-heading">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('svc_web.faq_label') }}</p>
            <h2 id="faq-heading" class="text-3xl font-extrabold text-text">{{ __('svc_web.faq_heading') }}</h2>
        </div>
        <div x-data="{}">
            @foreach([
                ['q'=>__('svc_web.faq_1_q'),'a'=>__('svc_web.faq_1_a')],
                ['q'=>__('svc_web.faq_2_q'),'a'=>__('svc_web.faq_2_a')],
                ['q'=>__('svc_web.faq_3_q'),'a'=>__('svc_web.faq_3_a')],
                ['q'=>__('svc_web.faq_4_q'),'a'=>__('svc_web.faq_4_a')],
            ] as $i => $faq)
            <div class="faq-item reveal delay-{{ ($i+1)*100 }}" x-data="{ open: false }">
                <button @click="open = !open"
                        class="w-full flex items-center justify-between py-5 text-left gap-4"
                        :aria-expanded="open">
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
<section class="py-20 bg-text" aria-labelledby="cta-web-heading">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center reveal">
        <h2 id="cta-web-heading" class="text-3xl sm:text-4xl font-extrabold text-white mb-4">
            {{ __('svc_web.cta_heading') }}
        </h2>
        <p class="text-white/55 max-w-lg mx-auto mb-8">{{ __('svc_web.cta_sub') }}</p>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('custom-request') }}" class="btn-primary">
                {{ __('svc_web.cta_primary') }}
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('contact') }}" class="btn-ghost-dark">Contact Us</a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    @vite('resources/js/pages/services.js')
@endpush
