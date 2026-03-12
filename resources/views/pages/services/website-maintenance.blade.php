@extends('layouts.app')

@section('title', __('svc_maintain.page_title'))
@section('description', __('svc_maintain.page_desc'))

@push('seo')
<meta name="theme-color" content="#10B981">
@endpush

@section('content')
@php $locale = app()->getLocale(); $bn = $locale === 'bn'; @endphp

{{-- ── HERO ────────────────────────────────────────────────────── --}}
<section class="relative min-h-[90vh] flex flex-col justify-start overflow-hidden pt-16"
         style="background:radial-gradient(ellipse at 15% 50%,rgba(16,185,129,0.14) 0%,transparent 55%),radial-gradient(ellipse at 80% 30%,rgba(6,182,212,0.1) 0%,transparent 55%),var(--color-bg)"
         aria-labelledby="svc-heading">

    <canvas id="particle-canvas" aria-hidden="true"></canvas>
    <div class="hero-grid absolute inset-0 pointer-events-none" aria-hidden="true"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 pt-4 pb-12 lg:py-20 grid lg:grid-cols-2 gap-12 items-center">

        <div class="text-center lg:text-left">
            <div class="svc-hero-badge inline-flex items-center gap-2 px-4 py-1.5 rounded-full border mb-6 text-xs font-semibold tracking-wide uppercase"
                 style="border-color:rgba(16,185,129,0.35);background:rgba(16,185,129,0.08);color:#6EE7B7">
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                {{ __('svc_maintain.hero_badge') }}
            </div>
            <h1 id="svc-heading" class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-[1.1] tracking-tight mb-5 {{ $bn ? 'bn' : '' }}">
                @foreach(explode(' ', __('svc_maintain.hero_heading_1')) as $word)
                    <span class="svc-hero-word inline-block">{{ $word }}&nbsp;</span>
                @endforeach
                <br>
                <span style="background:linear-gradient(135deg,#10B981,#06B6D4);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">{{ __('svc_maintain.hero_heading_accent') }}</span>
            </h1>
            <p class="text-muted text-base sm:text-lg leading-relaxed max-w-lg mx-auto lg:mx-0 mb-8 {{ $bn ? 'bn' : '' }}">{{ __('svc_maintain.hero_sub') }}</p>
            <div class="svc-hero-ctas flex flex-wrap items-center justify-center lg:justify-start gap-3">
                <a href="{{ route('contact') }}" class="btn-primary magnetic" style="background:linear-gradient(135deg,#10B981,#06B6D4)">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    {{ __('svc_maintain.cta_primary') }}
                </a>
                <a href="{{ route('contact') }}" class="btn-ghost magnetic">{{ __('svc_maintain.cta_secondary') }}<svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
            </div>
        </div>

        {{-- Visual: Shield + uptime stats --}}
        <div class="svc-hero-visual hidden lg:flex relative items-center justify-center" aria-hidden="true">
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                <div class="w-72 h-72 rounded-full" style="background:radial-gradient(circle,rgba(16,185,129,0.15) 0%,transparent 70%)"></div>
            </div>
            <div class="relative w-full max-w-sm">
                <div class="rounded-2xl border border-white/8 p-6 shadow-2xl" style="background:var(--color-surface-2)">
                    {{-- Shield icon --}}
                    <div class="flex items-center gap-4 mb-6">
                        <div id="shield-icon" class="w-14 h-14 rounded-2xl flex items-center justify-center shrink-0 relative"
                             style="background:linear-gradient(135deg,rgba(16,185,129,0.2),rgba(6,182,212,0.1));border:1px solid rgba(16,185,129,0.3)">
                            <svg width="26" height="26" fill="none" stroke="#10B981" stroke-width="1.8" viewBox="0 0 24 24">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                <path d="M9 12l2 2 4-4"/>
                            </svg>
                            {{-- Pulse rings --}}
                            <span class="absolute inset-0 rounded-2xl animate-ping opacity-20" style="background:rgba(16,185,129,0.3)"></span>
                        </div>
                        <div>
                            <p class="text-white font-bold">{{ $bn ? 'সুরক্ষিত ও পর্যবেক্ষণে' : 'Secured & Monitored' }}</p>
                            <p class="text-muted text-sm">{{ $bn ? '২৪/৭ সক্রিয়' : '24/7 active' }}</p>
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
                            ['label'=>'Uptime','value'=>'99.97%','color'=>'#10B981','w'=>98],
                            ['label'=>$bn ? 'ব্যাকআপ (আজকের)' : 'Backup (today)','value'=>$bn ? 'সম্পন্ন' : 'Done','color'=>'#06B6D4','w'=>100],
                            ['label'=>$bn ? 'সিকিউরিটি স্ক্যান' : 'Security Scan','value'=>$bn ? 'পরিষ্কার' : 'Clean','color'=>'#A855F7','w'=>100],
                            ['label'=>$bn ? 'পারফরম্যান্স' : 'Performance','value'=>'92/100','color'=>'#F59E0B','w'=>92],
                        ] as $row)
                        <div class="flex items-center gap-3">
                            <span class="text-muted text-xs w-28 shrink-0">{{ $row['label'] }}</span>
                            <div class="flex-1 h-1.5 rounded-full bg-white/6">
                                <div class="h-full rounded-full metric-bar" style="width:0%;background:{{ $row['color'] }};transition:width 1.5s ease;--target-w:{{ $row['w'] }}%"></div>
                            </div>
                            <span class="text-xs font-bold shrink-0" style="color:{{ $row['color'] }}">{{ $row['value'] }}</span>
                        </div>
                        @endforeach
                    </div>
                    {{-- Last backup --}}
                    <div class="mt-4 pt-4 border-t border-white/6 flex items-center justify-between text-xs">
                        <span class="text-muted">{{ $bn ? 'শেষ ব্যাকআপ' : 'Last backup' }}</span>
                        <span class="text-green-400 font-semibold">{{ $bn ? '২ ঘণ্টা আগে' : '2 hours ago' }}</span>
                    </div>
                </div>
                <div class="absolute -top-3 -right-3 glass rounded-2xl px-3 py-2 shadow-xl border border-green-500/20">
                    <p class="text-muted text-[10px]">{{ $bn ? 'রেসপন্স SLA' : 'Response SLA' }}</p>
                    <p class="text-lg font-extrabold text-green-400">4h</p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ── WHAT'S INCLUDED ─────────────────────────────────────────── --}}
<section class="py-24 max-w-7xl mx-auto px-4 sm:px-6" aria-labelledby="offer-heading">
    <div class="text-center mb-14 reveal">
        <span class="section-label" style="background:rgba(16,185,129,0.1);border-color:rgba(16,185,129,0.3);color:#6EE7B7">{{ __('svc_maintain.offer_label') }}</span>
        <h2 id="offer-heading" class="text-3xl sm:text-4xl font-extrabold text-white mb-4 {{ $bn ? 'bn' : '' }}">{{ __('svc_maintain.offer_heading') }}</h2>
        <p class="text-muted max-w-xl mx-auto {{ $bn ? 'bn' : '' }}">{{ __('svc_maintain.offer_sub') }}</p>
    </div>
    @php
    $feats=[
        ['title'=>__('svc_maintain.feat_1_title'),'desc'=>__('svc_maintain.feat_1_desc'),'color'=>'#10B981','icon'=>'M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'],
        ['title'=>__('svc_maintain.feat_2_title'),'desc'=>__('svc_maintain.feat_2_desc'),'color'=>'#06B6D4','icon'=>'M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12'],
        ['title'=>__('svc_maintain.feat_3_title'),'desc'=>__('svc_maintain.feat_3_desc'),'color'=>'#A855F7','icon'=>'M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z'],
        ['title'=>__('svc_maintain.feat_4_title'),'desc'=>__('svc_maintain.feat_4_desc'),'color'=>'#F59E0B','icon'=>'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15'],
        ['title'=>__('svc_maintain.feat_5_title'),'desc'=>__('svc_maintain.feat_5_desc'),'color'=>'#7C3AED','icon'=>'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
        ['title'=>__('svc_maintain.feat_6_title'),'desc'=>__('svc_maintain.feat_6_desc'),'color'=>'#EC4899','icon'=>'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'],
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
            <span class="section-label" style="background:rgba(16,185,129,0.1);border-color:rgba(16,185,129,0.3);color:#6EE7B7">{{ __('svc_maintain.process_label') }}</span>
            <h2 id="process-heading" class="text-3xl sm:text-4xl font-extrabold text-white {{ $bn ? 'bn' : '' }}">{{ __('svc_maintain.process_heading') }}</h2>
        </div>
        @php
        $steps=[
            ['num'=>1,'title'=>__('svc_maintain.step_1_title'),'desc'=>__('svc_maintain.step_1_desc'),'color'=>'rgba(16,185,129,0.8)','icon'=>'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4'],
            ['num'=>2,'title'=>__('svc_maintain.step_2_title'),'desc'=>__('svc_maintain.step_2_desc'),'color'=>'rgba(6,182,212,0.8)','icon'=>'M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z'],
            ['num'=>3,'title'=>__('svc_maintain.step_3_title'),'desc'=>__('svc_maintain.step_3_desc'),'color'=>'rgba(245,158,11,0.8)','icon'=>'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
            ['num'=>4,'title'=>__('svc_maintain.step_4_title'),'desc'=>__('svc_maintain.step_4_desc'),'color'=>'rgba(168,85,247,0.8)','icon'=>'M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z'],
        ];
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-4 relative">
            <div class="hidden lg:block absolute top-10 left-[12.5%] right-[12.5%] h-px bg-white/6" aria-hidden="true">
                <div class="process-line-fill h-full w-0" id="process-line" style="background:linear-gradient(90deg,#10B981,#06B6D4,#A855F7)"></div>
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


{{-- ── PRICING PLANS ───────────────────────────────────────────── --}}
<section class="py-24 relative overflow-hidden" aria-labelledby="pricing-heading">
    <div class="absolute inset-0 bg-linear-to-b from-surface/0 via-surface/40 to-surface/0 pointer-events-none"></div>
    <div class="relative max-w-5xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14 reveal">
            <span class="section-label" style="background:rgba(16,185,129,0.1);border-color:rgba(16,185,129,0.3);color:#6EE7B7">{{ __('svc_maintain.pricing_label') }}</span>
            <h2 id="pricing-heading" class="text-3xl sm:text-4xl font-extrabold text-white mb-3 {{ $bn ? 'bn' : '' }}">{{ __('svc_maintain.pricing_heading') }}</h2>
            <p class="text-muted {{ $bn ? 'bn' : '' }}">{{ __('svc_maintain.pricing_sub') }}</p>
        </div>
        @php
        $pkgs=[
            ['name'=>__('svc_maintain.pkg_1_name'),'price'=>__('svc_maintain.pkg_1_price'),'desc'=>__('svc_maintain.pkg_1_desc'),'color'=>'#10B981','featured'=>false,
             'perks'=>['Uptime monitoring','Weekly backups','Monthly security scan','1 bug fix / month','Monthly report']],
            ['name'=>__('svc_maintain.pkg_2_name'),'price'=>__('svc_maintain.pkg_2_price'),'desc'=>__('svc_maintain.pkg_2_desc'),'color'=>'#06B6D4','featured'=>true,
             'perks'=>['Daily backups','Continuous monitoring','Unlimited minor bug fixes','Priority response','Content updates','Monthly report']],
            ['name'=>__('svc_maintain.pkg_3_name'),'price'=>__('svc_maintain.pkg_3_price'),'desc'=>__('svc_maintain.pkg_3_desc'),'color'=>'#A855F7','featured'=>false,
             'perks'=>['All Pro features','4-hour response SLA','Proactive optimization','Dedicated engineer','Direct hotline','Quarterly review']],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            @foreach($pkgs as $i => $pkg)
            <div class="product-card p-7 flex flex-col reveal delay-{{ ($i+1)*100 }}" style="{{ $pkg['featured'] ? 'border-color:rgba(6,182,212,0.4);box-shadow:0 0 48px rgba(6,182,212,0.12)' : '' }}">
                @if($pkg['featured'])
                <div class="inline-flex items-center gap-1.5 self-start mb-3 px-3 py-1 rounded-full text-xs font-bold uppercase" style="background:rgba(6,182,212,0.15);border:1px solid rgba(6,182,212,0.35);color:#67E8F9">
                    <span class="w-1.5 h-1.5 rounded-full animate-pulse" style="background:#06B6D4"></span>
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
                <a href="{{ route('contact') }}" class="{{ $pkg['featured'] ? 'btn-primary' : 'btn-ghost' }} w-full justify-center" style="{{ $pkg['featured'] ? 'background:linear-gradient(135deg,#10B981,#06B6D4)' : '' }}">
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
        <span class="section-label" style="background:rgba(16,185,129,0.1);border-color:rgba(16,185,129,0.3);color:#6EE7B7">{{ __('svc_maintain.faq_label') }}</span>
        <h2 id="faq-heading" class="text-3xl font-extrabold text-white {{ $bn ? 'bn' : '' }}">{{ __('svc_maintain.faq_heading') }}</h2>
    </div>
    <div x-data="{}">
        @foreach([['q'=>__('svc_maintain.faq_1_q'),'a'=>__('svc_maintain.faq_1_a')],['q'=>__('svc_maintain.faq_2_q'),'a'=>__('svc_maintain.faq_2_a')],['q'=>__('svc_maintain.faq_3_q'),'a'=>__('svc_maintain.faq_3_a')],['q'=>__('svc_maintain.faq_4_q'),'a'=>__('svc_maintain.faq_4_a')]] as $i => $faq)
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
    <div class="rounded-3xl overflow-hidden reveal" style="background:linear-gradient(135deg,rgba(16,185,129,0.1),rgba(6,182,212,0.05));border:1px solid rgba(16,185,129,0.25)">
        <div class="p-10 sm:p-14 lg:p-16 text-center">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4 {{ $bn ? 'bn' : '' }}">{{ __('svc_maintain.cta_heading') }}</h2>
            <p class="text-muted max-w-lg mx-auto mb-8 {{ $bn ? 'bn' : '' }}">{{ __('svc_maintain.cta_sub') }}</p>
            <div class="flex flex-wrap items-center justify-center gap-3">
                <a href="{{ route('contact') }}" class="btn-primary magnetic" style="background:linear-gradient(135deg,#10B981,#06B6D4)">{{ __('svc_maintain.cta_primary') }}</a>
                <a href="{{ route('contact') }}" class="btn-ghost magnetic">{{ __('svc_maintain.cta_secondary') }}</a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    @vite('resources/js/pages/services.js')
@endpush
