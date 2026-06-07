@extends('layouts.app')

@section('title', __('svc_mobile.page_title'))
@section('description', __('svc_mobile.page_desc'))

@section('content')

{{-- ── HERO ── --}}
<section class="hero-light relative overflow-hidden pt-[70px]" aria-labelledby="svc-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-16 lg:py-24 grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">

        {{-- Copy --}}
        <div class="text-center lg:text-left reveal">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border mb-6 text-xs font-semibold tracking-wide uppercase"
                 style="border-color:rgba(59,130,246,0.30);background:rgba(59,130,246,0.07);color:#3B82F6">
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M12 18h.01M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                </svg>
                {{ __('svc_mobile.hero_badge') }}
            </div>

            <h1 id="svc-heading" class="text-4xl sm:text-5xl lg:text-[3.25rem] font-extrabold leading-[1.1] tracking-tight mb-5 text-text">
                {{ __('svc_mobile.hero_heading_1') }}<br>
                <span style="background:linear-gradient(135deg,#3B82F6,#8B5CF6);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">
                    {{ __('svc_mobile.hero_heading_accent') }}
                </span>
            </h1>

            <p class="text-muted text-base sm:text-lg leading-relaxed max-w-lg mx-auto lg:mx-0 mb-8">
                {{ __('svc_mobile.hero_sub') }}
            </p>

            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3">
                <a href="{{ route('custom-request') }}" class="btn-primary">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 18h.01M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"/></svg>
                    {{ __('svc_mobile.cta_primary') }}
                </a>
                <a href="{{ route('contact') }}" class="btn-ghost">
                    Talk to Us
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>

        {{-- Visual: phone frames --}}
        <div class="hidden lg:flex relative items-center justify-center reveal delay-200" aria-hidden="true">
            <div class="relative flex gap-4 items-end">
                {{-- Phone 1 (Android) --}}
                <div class="relative w-36 rounded-[2rem] border-2 shadow-2xl shadow-black/12 overflow-hidden bg-surface"
                     style="height:260px;border-color:rgba(59,130,246,0.30)">
                    <div class="h-7 flex items-center justify-center bg-surface border-b border-black/6">
                        <div class="w-12 h-1.5 rounded-full bg-black/10"></div>
                    </div>
                    <div class="p-2.5 space-y-2 bg-white">
                        <div class="h-16 rounded-xl" style="background:linear-gradient(135deg,rgba(59,130,246,0.12),rgba(139,92,246,0.08))"></div>
                        <div class="grid grid-cols-2 gap-1.5">
                            @for($i=0;$i<4;$i++)
                            <div class="rounded-lg p-2 bg-surface border border-black/6">
                                <div class="w-5 h-5 rounded-md mb-1.5" style="background:rgba(59,130,246,0.15)"></div>
                                <div class="h-1.5 rounded bg-black/8 w-3/4 mb-1"></div>
                                <div class="h-1 rounded bg-black/5 w-1/2"></div>
                            </div>
                            @endfor
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-10 flex items-center justify-around px-4 border-t border-black/6 bg-surface">
                        @for($i=0;$i<4;$i++)
                        <div class="w-5 h-5 rounded-full" style="background:{{ $i===0 ? 'rgba(59,130,246,0.4)' : 'rgba(0,0,0,0.06)' }}"></div>
                        @endfor
                    </div>
                </div>

                {{-- Phone 2 (iOS) --}}
                <div class="relative w-36 rounded-[2.2rem] border-2 shadow-2xl shadow-black/12 overflow-hidden bg-surface"
                     style="height:290px;border-color:rgba(139,92,246,0.30)">
                    <div class="h-8 flex items-center justify-center bg-surface border-b border-black/6">
                        <div class="w-20 h-4 rounded-full bg-black/8"></div>
                    </div>
                    <div class="p-2.5 space-y-2 bg-white">
                        <div class="h-24 rounded-2xl" style="background:linear-gradient(135deg,rgba(139,92,246,0.12),rgba(59,130,246,0.08))">
                            <div class="h-full flex items-center justify-center">
                                <div class="text-center">
                                    <div class="w-10 h-10 rounded-full mx-auto mb-1.5" style="background:rgba(139,92,246,0.20)"></div>
                                    <div class="h-1.5 rounded bg-black/10 w-16 mx-auto"></div>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-1.5">
                            @for($i=0;$i<3;$i++)
                            <div class="flex items-center gap-2 rounded-xl p-2 bg-surface border border-black/6">
                                <div class="w-6 h-6 rounded-lg shrink-0" style="background:rgba(139,92,246,{{ 0.15+$i*0.08 }})"></div>
                                <div class="flex-1">
                                    <div class="h-1.5 rounded bg-black/8 w-3/4 mb-1"></div>
                                    <div class="h-1 rounded bg-black/5 w-1/2"></div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>

                {{-- Platform badges --}}
                <div class="absolute -top-3 left-0 z-10 text-white text-[9px] font-black px-2 py-1 rounded-full" style="background:#3B82F6">Android</div>
                <div class="absolute -top-3 right-0 z-10 text-white text-[9px] font-black px-2 py-1 rounded-full" style="background:#8B5CF6">iOS</div>
            </div>

            <div class="absolute top-4 left-0 glass rounded-2xl px-3 py-2 shadow-xl">
                <p class="text-muted text-[10px]">Single Codebase</p>
                <p class="text-text text-sm font-bold">iOS + Android</p>
            </div>
            <div class="absolute bottom-4 right-0 glass rounded-2xl px-3 py-2 shadow-xl">
                <p class="text-muted text-[10px]">Ship in</p>
                <p class="text-lg font-extrabold" style="background:linear-gradient(135deg,#3B82F6,#8B5CF6);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">6 Weeks</p>
            </div>
        </div>
    </div>
</section>


{{-- ── WHAT WE BUILD ── --}}
<section class="py-24 bg-surface" aria-labelledby="offer-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('svc_mobile.offer_label') }}</p>
            <h2 id="offer-heading" class="text-3xl sm:text-4xl font-extrabold text-text mb-4">{{ __('svc_mobile.offer_heading') }}</h2>
            <p class="text-muted max-w-xl mx-auto">{{ __('svc_mobile.offer_sub') }}</p>
        </div>
        @php
        $feats = [
            ['title'=>__('svc_mobile.feat_1_title'),'desc'=>__('svc_mobile.feat_1_desc'),'color'=>'#3B82F6','icon'=>'M12 18h.01M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z'],
            ['title'=>__('svc_mobile.feat_2_title'),'desc'=>__('svc_mobile.feat_2_desc'),'color'=>'#8B5CF6','icon'=>'M3 3h18v18H3V3zm6 9l2 2 4-4'],
            ['title'=>__('svc_mobile.feat_3_title'),'desc'=>__('svc_mobile.feat_3_desc'),'color'=>'#F59E0B','icon'=>'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z'],
            ['title'=>__('svc_mobile.feat_4_title'),'desc'=>__('svc_mobile.feat_4_desc'),'color'=>'#06B6D4','icon'=>'M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4'],
            ['title'=>__('svc_mobile.feat_5_title'),'desc'=>__('svc_mobile.feat_5_desc'),'color'=>'#059669','icon'=>'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
            ['title'=>__('svc_mobile.feat_6_title'),'desc'=>__('svc_mobile.feat_6_desc'),'color'=>'#EF1B3F','icon'=>'M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12'],
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
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('svc_mobile.process_label') }}</p>
            <h2 id="process-heading" class="text-3xl sm:text-4xl font-extrabold text-text">{{ __('svc_mobile.process_heading') }}</h2>
        </div>
        @php
        $steps=[
            ['num'=>1,'title'=>__('svc_mobile.step_1_title'),'desc'=>__('svc_mobile.step_1_desc'),'color'=>'#3B82F6','icon'=>'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
            ['num'=>2,'title'=>__('svc_mobile.step_2_title'),'desc'=>__('svc_mobile.step_2_desc'),'color'=>'#8B5CF6','icon'=>'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z'],
            ['num'=>3,'title'=>__('svc_mobile.step_3_title'),'desc'=>__('svc_mobile.step_3_desc'),'color'=>'#F59E0B','icon'=>'M12 18h.01M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z'],
            ['num'=>4,'title'=>__('svc_mobile.step_4_title'),'desc'=>__('svc_mobile.step_4_desc'),'color'=>'#059669','icon'=>'M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12'],
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


{{-- ── TECH STACK ── --}}
<section class="py-20 bg-surface" aria-labelledby="tech-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-10 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('svc_mobile.tech_label') }}</p>
            <h2 id="tech-heading" class="text-2xl sm:text-3xl font-extrabold text-text">{{ __('svc_mobile.tech_heading') }}</h2>
        </div>
        <div class="flex flex-wrap justify-center gap-3 reveal delay-100">
            @foreach(['Flutter','React Native','Dart','Firebase','REST API','SQLite','Provider / Riverpod','Push Notifications','App Store Connect','Google Play Console','Fastlane'] as $tech)
            <span class="tech-pill px-4 py-2 text-sm font-medium">{{ $tech }}</span>
            @endforeach
        </div>
    </div>
</section>


{{-- ── PRICING ── --}}
<section class="py-24 bg-white" aria-labelledby="pricing-heading">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('svc_mobile.pricing_label') }}</p>
            <h2 id="pricing-heading" class="text-3xl sm:text-4xl font-extrabold text-text mb-3">{{ __('svc_mobile.pricing_heading') }}</h2>
            <p class="text-muted">{{ __('svc_mobile.pricing_sub') }}</p>
        </div>
        @php
        $pkgs=[
            ['name'=>__('svc_mobile.pkg_1_name'),'price'=>__('svc_mobile.pkg_1_price'),'desc'=>__('svc_mobile.pkg_1_desc'),'color'=>'#3B82F6','featured'=>false,
             'perks'=>['Flutter codebase','iOS + Android','Core features only','App Store submission','1 month support']],
            ['name'=>__('svc_mobile.pkg_2_name'),'price'=>__('svc_mobile.pkg_2_price'),'desc'=>__('svc_mobile.pkg_2_desc'),'color'=>'#EF1B3F','featured'=>true,
             'perks'=>['All MVP features','Backend API','Admin dashboard','Push notifications','Analytics integration','2 months support']],
            ['name'=>__('svc_mobile.pkg_3_name'),'price'=>__('svc_mobile.pkg_3_price'),'desc'=>__('svc_mobile.pkg_3_desc'),'color'=>'#F59E0B','featured'=>false,
             'perks'=>['Multi-role architecture','Real-time features','Maps integration','Payment gateway','Dedicated engineer','Custom SLA']],
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
                <a href="{{ route('custom-request') }}" class="{{ $pkg['featured'] ? 'btn-primary' : 'btn-ghost' }} w-full justify-center">
                    Get Started
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ── FAQ ── --}}
<section class="py-20 bg-surface" aria-labelledby="faq-heading">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('svc_mobile.faq_label') }}</p>
            <h2 id="faq-heading" class="text-3xl font-extrabold text-text">{{ __('svc_mobile.faq_heading') }}</h2>
        </div>
        <div x-data="{}">
            @foreach([
                ['q'=>__('svc_mobile.faq_1_q'),'a'=>__('svc_mobile.faq_1_a')],
                ['q'=>__('svc_mobile.faq_2_q'),'a'=>__('svc_mobile.faq_2_a')],
                ['q'=>__('svc_mobile.faq_3_q'),'a'=>__('svc_mobile.faq_3_a')],
                ['q'=>__('svc_mobile.faq_4_q'),'a'=>__('svc_mobile.faq_4_a')],
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
<section class="py-20 bg-text" aria-labelledby="cta-mobile-heading">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center reveal">
        <h2 id="cta-mobile-heading" class="text-3xl sm:text-4xl font-extrabold text-white mb-4">{{ __('svc_mobile.cta_heading') }}</h2>
        <p class="text-white/55 max-w-lg mx-auto mb-8">{{ __('svc_mobile.cta_sub') }}</p>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('custom-request') }}" class="btn-primary">
                {{ __('svc_mobile.cta_primary') }}
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
