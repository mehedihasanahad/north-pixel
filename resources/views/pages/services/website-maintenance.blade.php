@extends('layouts.app')

@section('title', __('svc_maintain.page_title'))
@section('description', __('svc_maintain.page_desc'))

@section('content')

{{-- ── HERO ── --}}
<section class="hero-light relative overflow-hidden pt-[70px]" aria-labelledby="svc-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-16 lg:py-24 grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">

        {{-- Copy --}}
        <div class="text-center lg:text-left reveal">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border mb-6 text-xs font-semibold tracking-wide uppercase"
                 style="border-color:rgba(5,150,105,0.30);background:rgba(5,150,105,0.07);color:#059669">
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
                {{ __('svc_maintain.hero_badge') }}
            </div>

            <h1 id="svc-heading" class="text-4xl sm:text-5xl lg:text-[3.25rem] font-extrabold leading-[1.1] tracking-tight mb-5 text-text">
                {{ __('svc_maintain.hero_heading_1') }}<br>
                <span style="background:linear-gradient(135deg,#059669,#06B6D4);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">
                    {{ __('svc_maintain.hero_heading_accent') }}
                </span>
            </h1>

            <p class="text-muted text-base sm:text-lg leading-relaxed max-w-lg mx-auto lg:mx-0 mb-8">
                {{ __('svc_maintain.hero_sub') }}
            </p>

            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3">
                <a href="{{ route('contact') }}" class="btn-primary" style="background:linear-gradient(135deg,#059669,#06B6D4)">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    {{ __('svc_maintain.cta_primary') }}
                </a>
                <a href="{{ route('contact') }}" class="btn-ghost">
                    {{ __('svc_maintain.cta_secondary') }}
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>

        {{-- Visual: monitoring dashboard (kept dark — fits a security monitoring style) --}}
        <div class="hidden lg:flex relative items-center justify-center reveal delay-200" aria-hidden="true">
            <div class="relative w-full max-w-sm">
                <div class="rounded-2xl border border-black/8 p-6 shadow-2xl shadow-black/10" style="background:#0D0D14">
                    {{-- Shield icon --}}
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center shrink-0 relative"
                             style="background:linear-gradient(135deg,rgba(5,150,105,0.25),rgba(6,182,212,0.12));border:1px solid rgba(5,150,105,0.35)">
                            <svg width="26" height="26" fill="none" stroke="#059669" stroke-width="1.8" viewBox="0 0 24 24">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                <path d="M9 12l2 2 4-4"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-white font-bold text-sm">Secured & Monitored</p>
                            <p class="text-white/40 text-xs">24/7 active</p>
                        </div>
                        <div class="ml-auto shrink-0">
                            <span class="flex items-center gap-1.5 text-green-400 text-sm font-bold">
                                <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                                Online
                            </span>
                        </div>
                    </div>
                    {{-- Stat rows --}}
                    <div class="space-y-3">
                        @foreach([
                            ['label'=>'Uptime',         'value'=>'99.97%','color'=>'#059669','w'=>98],
                            ['label'=>'Backup (today)', 'value'=>'Done',  'color'=>'#06B6D4','w'=>100],
                            ['label'=>'Security Scan',  'value'=>'Clean', 'color'=>'#8B5CF6','w'=>100],
                            ['label'=>'Performance',    'value'=>'92/100','color'=>'#F59E0B','w'=>92],
                        ] as $row)
                        <div class="flex items-center gap-3">
                            <span class="text-white/40 text-xs w-28 shrink-0">{{ $row['label'] }}</span>
                            <div class="flex-1 h-1.5 rounded-full bg-white/8">
                                <div class="h-full rounded-full metric-bar" style="width:0%;background:{{ $row['color'] }};transition:width 1.5s ease;--target-w:{{ $row['w'] }}%"></div>
                            </div>
                            <span class="text-xs font-bold shrink-0" style="color:{{ $row['color'] }}">{{ $row['value'] }}</span>
                        </div>
                        @endforeach
                    </div>
                    <div class="mt-4 pt-4 border-t border-white/8 flex items-center justify-between text-xs">
                        <span class="text-white/40">Last backup</span>
                        <span class="text-green-400 font-semibold">2 hours ago</span>
                    </div>
                </div>
                <div class="absolute -top-3 -right-3 glass rounded-2xl px-3 py-2 shadow-xl">
                    <p class="text-muted text-[10px]">Response SLA</p>
                    <p class="text-lg font-extrabold text-green-500">4h</p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ── WHAT'S INCLUDED ── --}}
<section class="py-24 bg-surface" aria-labelledby="offer-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('svc_maintain.offer_label') }}</p>
            <h2 id="offer-heading" class="text-3xl sm:text-4xl font-extrabold text-text mb-4">{{ __('svc_maintain.offer_heading') }}</h2>
            <p class="text-muted max-w-xl mx-auto">{{ __('svc_maintain.offer_sub') }}</p>
        </div>
        @php
        $feats=[
            ['title'=>__('svc_maintain.feat_1_title'),'desc'=>__('svc_maintain.feat_1_desc'),'color'=>'#059669','icon'=>'M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'],
            ['title'=>__('svc_maintain.feat_2_title'),'desc'=>__('svc_maintain.feat_2_desc'),'color'=>'#06B6D4','icon'=>'M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12'],
            ['title'=>__('svc_maintain.feat_3_title'),'desc'=>__('svc_maintain.feat_3_desc'),'color'=>'#8B5CF6','icon'=>'M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z'],
            ['title'=>__('svc_maintain.feat_4_title'),'desc'=>__('svc_maintain.feat_4_desc'),'color'=>'#F59E0B','icon'=>'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15'],
            ['title'=>__('svc_maintain.feat_5_title'),'desc'=>__('svc_maintain.feat_5_desc'),'color'=>'#EF1B3F','icon'=>'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['title'=>__('svc_maintain.feat_6_title'),'desc'=>__('svc_maintain.feat_6_desc'),'color'=>'#3B82F6','icon'=>'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'],
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
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('svc_maintain.process_label') }}</p>
            <h2 id="process-heading" class="text-3xl sm:text-4xl font-extrabold text-text">{{ __('svc_maintain.process_heading') }}</h2>
        </div>
        @php
        $steps=[
            ['num'=>1,'title'=>__('svc_maintain.step_1_title'),'desc'=>__('svc_maintain.step_1_desc'),'color'=>'#059669','icon'=>'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4'],
            ['num'=>2,'title'=>__('svc_maintain.step_2_title'),'desc'=>__('svc_maintain.step_2_desc'),'color'=>'#06B6D4','icon'=>'M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z'],
            ['num'=>3,'title'=>__('svc_maintain.step_3_title'),'desc'=>__('svc_maintain.step_3_desc'),'color'=>'#F59E0B','icon'=>'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
            ['num'=>4,'title'=>__('svc_maintain.step_4_title'),'desc'=>__('svc_maintain.step_4_desc'),'color'=>'#8B5CF6','icon'=>'M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z'],
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


{{-- ── PRICING ── --}}
<section class="py-24 bg-surface" aria-labelledby="pricing-heading">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('svc_maintain.pricing_label') }}</p>
            <h2 id="pricing-heading" class="text-3xl sm:text-4xl font-extrabold text-text mb-3">{{ __('svc_maintain.pricing_heading') }}</h2>
            <p class="text-muted">{{ __('svc_maintain.pricing_sub') }}</p>
        </div>
        @php
        $pkgs=[
            ['name'=>__('svc_maintain.pkg_1_name'),'price'=>__('svc_maintain.pkg_1_price'),'desc'=>__('svc_maintain.pkg_1_desc'),'color'=>'#059669','featured'=>false,
             'perks'=>['Uptime monitoring','Weekly backups','Monthly security scan','1 bug fix / month','Monthly report']],
            ['name'=>__('svc_maintain.pkg_2_name'),'price'=>__('svc_maintain.pkg_2_price'),'desc'=>__('svc_maintain.pkg_2_desc'),'color'=>'#EF1B3F','featured'=>true,
             'perks'=>['Daily backups','Continuous monitoring','Unlimited minor bug fixes','Priority response','Content updates','Monthly report']],
            ['name'=>__('svc_maintain.pkg_3_name'),'price'=>__('svc_maintain.pkg_3_price'),'desc'=>__('svc_maintain.pkg_3_desc'),'color'=>'#06B6D4','featured'=>false,
             'perks'=>['All Pro features','4-hour response SLA','Proactive optimization','Dedicated engineer','Direct hotline','Quarterly review']],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            @foreach($pkgs as $i => $pkg)
            <div class="bg-white border rounded-2xl p-7 flex flex-col reveal delay-{{ ($i+1)*100 }}
                 {{ $pkg['featured'] ? 'border-primary/30 shadow-lg shadow-primary/8' : 'border-black/8' }}">
                @if($pkg['featured'])
                <div class="inline-flex items-center gap-1.5 self-start mb-4 px-3 py-1 rounded-full text-xs font-bold uppercase"
                     style="background:rgba(239,27,63,0.08);border:1px solid rgba(239,27,63,0.20);color:#EF1B3F">
                    <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                    Most Popular
                </div>
                @endif
                <p class="text-muted text-xs font-semibold uppercase tracking-wide mb-1">{{ $pkg['name'] }}</p>
                <p class="text-3xl font-extrabold mb-1" style="color:{{ $pkg['color'] }}">{{ $pkg['price'] }}</p>
                <p class="text-muted text-sm mb-5">{{ $pkg['desc'] }}</p>
                <ul class="space-y-2.5 mb-7 flex-1">
                    @foreach($pkg['perks'] as $perk)
                    <li class="flex items-center gap-2.5 text-sm text-muted">
                        <span class="w-4 h-4 rounded-full flex items-center justify-center shrink-0"
                              style="background:{{ $pkg['color'] }}12;border:1px solid {{ $pkg['color'] }}25">
                            <svg width="8" height="8" fill="none" stroke="{{ $pkg['color'] }}" stroke-width="3" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>
                        </span>
                        {{ $perk }}
                    </li>
                    @endforeach
                </ul>
                <a href="{{ route('contact') }}" class="{{ $pkg['featured'] ? 'btn-primary' : 'btn-ghost' }} w-full justify-center">
                    Get Started
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ── FAQ ── --}}
<section class="py-20 bg-white" aria-labelledby="faq-heading">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('svc_maintain.faq_label') }}</p>
            <h2 id="faq-heading" class="text-3xl font-extrabold text-text">{{ __('svc_maintain.faq_heading') }}</h2>
        </div>
        <div x-data="{}">
            @foreach([
                ['q'=>__('svc_maintain.faq_1_q'),'a'=>__('svc_maintain.faq_1_a')],
                ['q'=>__('svc_maintain.faq_2_q'),'a'=>__('svc_maintain.faq_2_a')],
                ['q'=>__('svc_maintain.faq_3_q'),'a'=>__('svc_maintain.faq_3_a')],
                ['q'=>__('svc_maintain.faq_4_q'),'a'=>__('svc_maintain.faq_4_a')],
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
<section class="py-20 bg-text" aria-labelledby="cta-maintain-heading">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center reveal">
        <h2 id="cta-maintain-heading" class="text-3xl sm:text-4xl font-extrabold text-white mb-4">{{ __('svc_maintain.cta_heading') }}</h2>
        <p class="text-white/55 max-w-lg mx-auto mb-8">{{ __('svc_maintain.cta_sub') }}</p>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('contact') }}" class="btn-primary">
                {{ __('svc_maintain.cta_primary') }}
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('contact') }}" class="btn-ghost-dark">{{ __('svc_maintain.cta_secondary') }}</a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    @vite('resources/js/pages/services.js')
@endpush
