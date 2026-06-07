@extends('layouts.app')

@section('title', 'North Pixel — Software Development Company in Bangladesh')
@section('description', 'North Pixel builds custom web & mobile apps, business automation systems, AI-powered software, and ready-made solutions for businesses in Bangladesh. 500+ happy clients.')

@section('content')

{{-- ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
     HERO
     ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ --}}
<section class="hero-light relative overflow-hidden pt-24 pb-20 lg:pb-15"
         aria-labelledby="hero-heading">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">

        {{-- LEFT: Copy --}}
        <div class="text-center lg:text-left reveal">

            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full
                 border border-black/10 bg-surface text-muted text-xs font-semibold
                 tracking-wide uppercase mb-7">
                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                Software Solutions · Bangladesh
            </div>

            {{-- Headline --}}
            <h1 id="hero-heading"
                class="text-4xl sm:text-5xl lg:text-[3.5rem] font-extrabold leading-[1.1] tracking-tight mb-5 text-text">
                We Build Software<br>
                That <span class="grad-text">Grows Your Business</span>
            </h1>

            {{-- Sub --}}
            <p class="text-muted text-base sm:text-lg leading-relaxed max-w-lg mx-auto lg:mx-0 mb-8">
                From custom web &amp; mobile apps to AI-powered automation and ready-made solutions —
                we deliver software that works, on time, every time.
            </p>

            {{-- CTAs --}}
            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3">
                <a href="{{ route('custom-request') }}" class="btn-primary">
                    Start Your Project
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('products.index') }}" class="btn-ghost">
                    Browse Ready-Made Software
                </a>
            </div>

            {{-- Trust indicators --}}
            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-6 mt-9 pt-7 border-t border-black/6">
                @foreach([
                    ['500+', 'Happy Clients'],
                    ['50+',  'Products Built'],
                    ['99%',  'Satisfaction Rate'],
                ] as $chip)
                <div class="flex items-center gap-2">
                    <span class="font-black text-text text-base">{{ $chip[0] }}</span>
                    <span class="text-muted text-xs">{{ $chip[1] }}</span>
                </div>
                @endforeach
            </div>
        </div>

        {{-- RIGHT: Browser mockup --}}
        <div class="hidden lg:flex relative items-center justify-center reveal delay-200" aria-hidden="true">

            <div class="relative w-full max-w-md rounded-2xl overflow-hidden border border-black/8 shadow-2xl shadow-black/10">

                {{-- Browser chrome --}}
                <div class="flex items-center gap-2 px-4 py-3 border-b border-black/6 bg-surface">
                    <span class="w-3 h-3 rounded-full bg-red-400/60"></span>
                    <span class="w-3 h-3 rounded-full bg-yellow-400/60"></span>
                    <span class="w-3 h-3 rounded-full bg-green-400/60"></span>
                    <div class="flex-1 mx-3 px-3 py-1 rounded-md text-xs text-muted text-center bg-white border border-black/6">
                        northpixel.com
                    </div>
                </div>

                {{-- Content area --}}
                <div class="bg-white p-5 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg shrink-0 flex items-center justify-center"
                             style="background:linear-gradient(135deg,#EF1B3F,#CC1430)">
                            <svg width="14" height="14" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                            </svg>
                        </div>
                        <div class="flex-1 space-y-1.5">
                            <div class="h-2.5 rounded-full bg-black/8 w-1/2"></div>
                            <div class="h-1.5 rounded-full bg-black/5 w-1/3"></div>
                        </div>
                        <div class="px-3 py-1.5 rounded-full text-xs font-semibold text-white shrink-0"
                             style="background:#059669">Live</div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        @foreach([
                            ['E-Commerce Store', '#EF1B3F'],
                            ['Restaurant App',   '#F59E0B'],
                        ] as $card)
                        <div class="rounded-xl overflow-hidden border border-black/6">
                            <div class="aspect-video flex items-center justify-center"
                                 style="background:{{ $card[1] }}0D">
                                <svg width="20" height="20" fill="none" stroke="{{ $card[1] }}" stroke-width="1.5" viewBox="0 0 24 24">
                                    <rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/>
                                </svg>
                            </div>
                            <div class="p-2.5 bg-white">
                                <div class="text-xs font-semibold text-text">{{ $card[0] }}</div>
                                <div class="h-1.5 rounded bg-black/6 w-3/4 mt-1"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="grid grid-cols-3 gap-2">
                        @foreach([['#EF1B3F','50+','Products'],['#F59E0B','99%','Rating'],['#059669','24/7','Support']] as $s)
                        <div class="rounded-xl p-2.5 text-center border border-black/6 bg-surface">
                            <p class="text-sm font-black" style="color:{{ $s[0] }}">{{ $s[1] }}</p>
                            <p class="text-[10px] text-muted mt-0.5">{{ $s[2] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Floating badges --}}
            <div class="absolute -top-3 -right-4 glass rounded-full px-3 py-1.5 flex items-center gap-2 shadow-lg text-xs font-semibold text-text z-10">
                <span class="w-2 h-2 rounded-full bg-green-400 animate-ping absolute"></span>
                <span class="w-2 h-2 rounded-full bg-green-400 relative shrink-0"></span>
                Live Preview
            </div>

            <div class="absolute -bottom-3 -left-4 glass rounded-2xl px-4 py-2.5 shadow-lg z-10">
                <p class="text-xs text-muted mb-0.5">Happy Clients</p>
                <p class="text-xl font-black grad-text leading-tight">500+</p>
            </div>
        </div>
    </div>
</section>



{{-- ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
     STATS
     ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ --}}
<section class="py-20 bg-white" aria-label="Company statistics">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">
            @php
            $stats = [
                ['value' => '50+',  'label' => 'Products Built',    'sub' => 'Ready-made software solutions', 'color' => '#EF1B3F'],
                ['value' => '500+', 'label' => 'Happy Clients',     'sub' => 'Businesses across Bangladesh',  'color' => '#F59E0B'],
                ['value' => '99%',  'label' => 'Satisfaction Rate', 'sub' => 'Client-rated project quality',  'color' => '#059669'],
                ['value' => '24/7', 'label' => 'Expert Support',    'sub' => 'Always here when you need us',  'color' => '#3B82F6'],
            ];
            @endphp
            @foreach($stats as $i => $stat)
            <div class="stat-card reveal delay-{{ ($i+1)*100 }}">
                <div class="text-4xl lg:text-5xl font-black mb-1" style="color:{{ $stat['color'] }}">{{ $stat['value'] }}</div>
                <p class="text-text text-sm font-semibold mb-0.5">{{ $stat['label'] }}</p>
                <p class="text-muted text-xs">{{ $stat['sub'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
     HOW WE WORK
     ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ --}}
<section class="py-24 bg-surface" aria-labelledby="process-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="text-center mb-14 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">Our Process</p>
            <h2 id="process-heading"
                class="text-3xl sm:text-4xl font-extrabold text-text mb-4">
                How We <span class="grad-text">Deliver</span>
            </h2>
            <p class="text-muted max-w-xl mx-auto text-base">
                A clear, structured process — so you always know what's happening and what comes next.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @php
            $steps = [
                ['num' => '01', 'color' => '#EF1B3F', 'icon' => 'M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z',
                 'title' => 'Discovery',
                 'desc'  => 'We map your goals, target users, and technical requirements in a focused kick-off session.'],
                ['num' => '02', 'color' => '#8B5CF6', 'icon' => 'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z',
                 'title' => 'Plan & Design',
                 'desc'  => 'Wireframes, architecture, and UI mockups — you approve everything before a single line of code is written.'],
                ['num' => '03', 'color' => '#F59E0B', 'icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
                 'title' => 'Build & Test',
                 'desc'  => 'Agile development with regular demos and reviews. Quality-tested at every stage, no surprises at delivery.'],
                ['num' => '04', 'color' => '#059669', 'icon' => 'M5 3l14 9-14 9V3z',
                 'title' => 'Launch & Support',
                 'desc'  => 'We deploy, hand over full ownership, and stay available for post-launch support whenever you need us.'],
            ];
            @endphp

            @foreach($steps as $i => $step)
            <div class="bg-white border border-black/6 rounded-2xl p-6 reveal delay-{{ ($i+1)*100 }}">
                <div class="flex items-center gap-3 mb-5">
                    <span class="text-xs font-black tracking-wider px-2.5 py-1 rounded-full"
                          style="background:{{ $step['color'] }}10;color:{{ $step['color'] }}">
                        {{ $step['num'] }}
                    </span>
                    <div class="flex-1 h-px" style="background:{{ $step['color'] }}18"></div>
                    <div class="w-9 h-9 rounded-xl flex items-center justify-center"
                         style="background:{{ $step['color'] }}10;border:1px solid {{ $step['color'] }}20">
                        <svg width="16" height="16" fill="none" stroke="{{ $step['color'] }}" stroke-width="2" viewBox="0 0 24 24">
                            <path d="{{ $step['icon'] }}"/>
                        </svg>
                    </div>
                </div>
                <h3 class="font-bold text-text mb-2 text-sm">{{ $step['title'] }}</h3>
                <p class="text-muted text-sm leading-relaxed">{{ $step['desc'] }}</p>
            </div>
            @endforeach
        </div>

    </div>
</section>


{{-- ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
     SERVICES — 5 Business Areas
     ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ --}}
<section id="services" class="py-24 bg-white" aria-labelledby="services-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="text-center mb-14 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">What We Do</p>
            <h2 id="services-heading"
                class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-text mb-4">
                Five Ways We Help<br class="hidden sm:block"> <span class="grad-text">Your Business Grow</span>
            </h2>
            <p class="text-muted max-w-2xl mx-auto text-base sm:text-lg">
                From custom-built software to AI integration — we solve real business problems with technology that delivers measurable results.
            </p>
        </div>

        @php
        $services = [
            [
                'title' => 'Custom Software Development',
                'desc'  => 'Web applications, mobile apps (iOS & Android), and desktop software — built from scratch to your exact specifications using modern, scalable technology stacks.',
                'tags'  => ['Web Applications', 'Mobile Apps (iOS & Android)', 'Desktop Software'],
                'href'  => route('services.web'),
                'color' => '#C8102E',
                'icon'  => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
                'featured' => false,
            ],
            [
                'title' => 'Business Process Automation',
                'desc'  => 'Eliminate repetitive manual tasks and reduce human error. We automate your workflows — from data entry and reporting to order processing and team notifications.',
                'tags'  => ['Workflow Automation', 'System Integration', 'Reduce Manual Work'],
                'href'  => route('custom-request'),
                'color' => '#7C3AED',
                'icon'  => 'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15',
                'featured' => false,
            ],
            [
                'title' => 'AI Integration',
                'desc'  => 'Add intelligence to your existing software. We integrate LLMs, chatbots, predictive analytics, and smart recommendation systems into your current platforms.',
                'tags'  => ['LLM & Chatbots', 'Predictive Analytics', 'Smart Recommendations'],
                'href'  => route('custom-request'),
                'color' => '#1D4ED8',
                'icon'  => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
                'featured' => false,
            ],
            [
                'title' => 'Performance Improvement',
                'desc'  => 'Slow software costs you customers and money. We audit, diagnose, and fix performance bottlenecks — improving load times, Core Web Vitals, and database efficiency.',
                'tags'  => ['Speed Audit & Fix', 'Core Web Vitals', 'Database Optimization'],
                'href'  => route('services.speedup'),
                'color' => '#B45309',
                'icon'  => 'M13 10V3L4 14h7v7l9-11h-7z',
                'featured' => false,
            ],
            [
                'title' => 'Ready-Made Software',
                'desc'  => 'Launch today with a production-ready web application. Browse our catalog of 50+ professionally built products — live preview, one-click order, go live within 24 hours.',
                'tags'  => ['50+ Products', 'Live Preview Available', 'Deploy in 24 Hours'],
                'href'  => route('services.ready'),
                'color' => '#C8102E',
                'icon'  => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',
                'featured' => true,
            ],
        ];
        @endphp

        {{-- 2-col top row --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
            @foreach(array_slice($services, 0, 2) as $i => $svc)
            <div class="service-card reveal delay-{{ ($i+1)*100 }}">
                <div class="h-0.5 w-full" style="background:{{ $svc['color'] }}"></div>
                <div class="p-7 lg:p-8">
                    <div class="mb-5 w-11 h-11 rounded-xl flex items-center justify-center"
                         style="background:{{ $svc['color'] }}0D;border:1px solid {{ $svc['color'] }}20">
                        <svg width="20" height="20" fill="none" stroke="{{ $svc['color'] }}" stroke-width="1.8" viewBox="0 0 24 24">
                            <path d="{{ $svc['icon'] }}"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-text mb-2">{{ $svc['title'] }}</h3>
                    <p class="text-muted text-sm leading-relaxed mb-5">{{ $svc['desc'] }}</p>
                    <div class="flex flex-wrap gap-1.5 mb-5">
                        @foreach($svc['tags'] as $tag)
                        <span class="text-xs px-2.5 py-1 rounded-full font-medium"
                              style="background:{{ $svc['color'] }}0A;border:1px solid {{ $svc['color'] }}18;color:{{ $svc['color'] }}">
                            {{ $tag }}
                        </span>
                        @endforeach
                    </div>
                    <a href="{{ $svc['href'] }}" class="inline-flex items-center gap-1.5 text-sm font-semibold transition-opacity hover:opacity-70"
                       style="color:{{ $svc['color'] }}">
                        Learn More
                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- 2-col middle row --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
            @foreach(array_slice($services, 2, 2) as $i => $svc)
            <div class="service-card reveal delay-{{ ($i+1)*150 }}">
                <div class="h-0.5 w-full" style="background:{{ $svc['color'] }}"></div>
                <div class="p-7 lg:p-8">
                    <div class="mb-5 w-11 h-11 rounded-xl flex items-center justify-center"
                         style="background:{{ $svc['color'] }}0D;border:1px solid {{ $svc['color'] }}20">
                        <svg width="20" height="20" fill="none" stroke="{{ $svc['color'] }}" stroke-width="1.8" viewBox="0 0 24 24">
                            <path d="{{ $svc['icon'] }}"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-text mb-2">{{ $svc['title'] }}</h3>
                    <p class="text-muted text-sm leading-relaxed mb-5">{{ $svc['desc'] }}</p>
                    <div class="flex flex-wrap gap-1.5 mb-5">
                        @foreach($svc['tags'] as $tag)
                        <span class="text-xs px-2.5 py-1 rounded-full font-medium"
                              style="background:{{ $svc['color'] }}0A;border:1px solid {{ $svc['color'] }}18;color:{{ $svc['color'] }}">
                            {{ $tag }}
                        </span>
                        @endforeach
                    </div>
                    <a href="{{ $svc['href'] }}" class="inline-flex items-center gap-1.5 text-sm font-semibold transition-opacity hover:opacity-70"
                       style="color:{{ $svc['color'] }}">
                        Learn More
                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Featured: Ready-Made — full width --}}
        @php $svc = $services[4]; @endphp
        <div class="service-card service-card--featured reveal delay-200">
            <div class="h-0.5 w-full" style="background:linear-gradient(90deg,#C8102E,#EF1B3F,#F59E0B)"></div>
            <div class="grid lg:grid-cols-2 gap-0">
                <div class="p-8 lg:p-10 flex flex-col justify-center">
                    <div class="inline-flex items-center gap-1.5 self-start mb-4 px-3 py-1 rounded-full text-xs font-bold tracking-wide uppercase"
                         style="background:rgba(200,16,46,0.08);border:1px solid rgba(200,16,46,0.20);color:#C8102E">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                        Most Popular
                    </div>
                    <div class="mb-4 w-11 h-11 rounded-xl flex items-center justify-center"
                         style="background:rgba(200,16,46,0.08);border:1px solid rgba(200,16,46,0.18)">
                        <svg width="20" height="20" fill="none" stroke="#C8102E" stroke-width="1.8" viewBox="0 0 24 24">
                            <path d="{{ $svc['icon'] }}"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl lg:text-3xl font-extrabold text-text mb-3">{{ $svc['title'] }}</h3>
                    <p class="text-muted leading-relaxed mb-5">{{ $svc['desc'] }}</p>
                    <div class="flex flex-wrap gap-1.5 mb-6">
                        @foreach($svc['tags'] as $tag)
                        <span class="text-xs px-2.5 py-1 rounded-full font-medium"
                              style="background:rgba(200,16,46,0.07);border:1px solid rgba(200,16,46,0.16);color:#C8102E">
                            {{ $tag }}
                        </span>
                        @endforeach
                    </div>
                    <a href="{{ $svc['href'] }}" class="btn-primary self-start">
                        Browse Products
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
                <div class="hidden lg:flex items-center justify-center p-8 lg:p-10 bg-surface" aria-hidden="true">
                    <div class="w-full max-w-sm space-y-3">
                        @foreach([
                            ['E-Commerce Store',    '#C8102E', 'Multi-vendor marketplace'],
                            ['Restaurant App',       '#B45309', 'Online ordering & POS'],
                            ['HR Management System', '#1D4ED8', 'Payroll & attendance'],
                        ] as $mini)
                        <div class="flex items-center gap-3 rounded-xl px-4 py-3 border border-black/6 bg-white shadow-sm">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center shrink-0"
                                 style="background:{{ $mini[1] }}0D">
                                <svg width="14" height="14" fill="none" stroke="{{ $mini[1] }}" stroke-width="1.5" viewBox="0 0 24 24">
                                    <rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-text text-sm font-semibold truncate">{{ $mini[0] }}</p>
                                <p class="text-muted text-xs">{{ $mini[2] }}</p>
                            </div>
                            <div class="w-2 h-2 rounded-full bg-green-400 shrink-0"></div>
                        </div>
                        @endforeach
                        <p class="text-center text-muted text-xs pt-1">50+ products ready to explore</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


{{-- ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
     OUR WORK / PORTFOLIO
     ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ --}}
@if($products->isNotEmpty())
<section class="py-24 bg-surface" aria-labelledby="work-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="text-center mb-14 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">Our Work</p>
            <h2 id="work-heading" class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-text mb-4">
                Ready-Made Software <span class="grad-text">Products</span>
            </h2>
            <p class="text-muted max-w-2xl mx-auto text-base">
                Production-ready web applications you can preview live, order instantly, and deploy within 24 hours.
                Fully customisable to match your brand and business needs.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products->take(6) as $i => $product)
            <div class="reveal delay-{{ min(($i+1)*100, 400) }}">
                <x-product-card :product="$product" />
            </div>
            @endforeach
        </div>

        <div class="text-center mt-10 reveal">
            <a href="{{ route('products.index') }}" class="btn-ghost">
                View All Products
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>

    </div>
</section>
@endif


{{-- ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
     WHY CHOOSE US
     ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ --}}
<section class="py-24 bg-white" aria-labelledby="why-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="text-center mb-14 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">Why Choose Us</p>
            <h2 id="why-heading" class="text-3xl sm:text-4xl font-extrabold text-text mb-4">
                What Makes North Pixel <span class="grad-text">Different</span>
            </h2>
            <p class="text-muted max-w-xl mx-auto text-base">
                We combine fast delivery with production-grade quality — and we stay with you after launch.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            @php
            $capabilities = [
                ['icon' => 'M13 2L3 14h9l-1 8 10-12h-9l1-8z', 'color' => '#C8102E',
                 'title' => 'Fast Delivery',
                 'desc'  => 'Projects delivered in 7–14 days for standard builds. We plan realistically and execute without unnecessary delays.'],
                ['icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4', 'color' => '#7C3AED',
                 'title' => 'Fully Custom',
                 'desc'  => 'Every feature is engineered around your specific business logic — no templates, no shortcuts.'],
                ['icon' => 'M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z', 'color' => '#059669',
                 'title' => 'Secure & Reliable',
                 'desc'  => 'Industry-standard security practices, regular updates, and monitoring built in from day one.'],
                ['icon' => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z', 'color' => '#B45309',
                 'title' => '24/7 Support',
                 'desc'  => 'Reach our team anytime via WhatsApp or Messenger. Real people, real answers — not automated responses.'],
            ];
            @endphp

            @foreach($capabilities as $i => $cap)
            <div class="capability-card reveal delay-{{ ($i+1)*100 }}">
                <div class="capability-icon" style="background:{{ $cap['color'] }}0D;border-color:{{ $cap['color'] }}20">
                    <svg width="20" height="20" fill="none" stroke="{{ $cap['color'] }}" stroke-width="1.8" viewBox="0 0 24 24">
                        <path d="{{ $cap['icon'] }}"/>
                    </svg>
                </div>
                <h3 class="font-bold text-text mb-2 text-sm">{{ $cap['title'] }}</h3>
                <p class="text-muted text-sm leading-relaxed">{{ $cap['desc'] }}</p>
            </div>
            @endforeach
        </div>

    </div>
</section>


{{-- ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
     CUSTOM PROJECT CTA
     ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ --}}
<section class="py-24 bg-text" aria-labelledby="custom-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">

            <div class="reveal">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full
                     border border-white/12 text-white/50 text-xs font-semibold tracking-widest uppercase mb-6">
                    Custom Build
                </span>
                <h2 id="custom-heading" class="text-3xl sm:text-4xl font-extrabold text-white mb-5">
                    Have a Specific Project in Mind?
                </h2>
                <p class="text-white/55 leading-relaxed mb-8 max-w-md text-base">
                    Tell us what you need — whether it's a new application, an automation system, or AI integration into your existing software.
                    We'll scope it, plan it, and deliver it.
                </p>

                <ul class="space-y-3 mb-8" role="list">
                    @foreach([
                        'Free consultation and project scoping',
                        'Fixed-price quotes with no hidden costs',
                        'Full source code ownership on delivery',
                        'Post-launch support included as standard',
                    ] as $feat)
                    <li class="flex items-center gap-3 text-sm">
                        <span class="w-5 h-5 rounded-full flex items-center justify-center shrink-0"
                              style="background:rgba(200,16,46,0.18);border:1px solid rgba(200,16,46,0.30)">
                            <svg width="10" height="10" fill="none" stroke="#EF1B3F" stroke-width="2.5" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>
                        </span>
                        <span class="text-white/65">{{ $feat }}</span>
                    </li>
                    @endforeach
                </ul>

                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('custom-request') }}" class="btn-primary">
                        Request a Free Quote
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    <a href="{{ route('contact') }}" class="btn-ghost-dark">
                        Talk to Us First
                    </a>
                </div>
            </div>

            <div class="hidden lg:block reveal delay-200" aria-hidden="true">
                <div class="code-block">
                    <p><span class="code-comment">// Your project specification</span></p>
                    <p><span class="code-keyword">const</span> <span class="code-fn">project</span> = {</p>
                    <p>&nbsp;&nbsp;<span class="code-keyword">type</span>: <span class="code-string">"web_app"</span>,</p>
                    <p>&nbsp;&nbsp;<span class="code-keyword">tech</span>: [<span class="code-string">"Laravel"</span>, <span class="code-string">"React"</span>],</p>
                    <p>&nbsp;&nbsp;<span class="code-keyword">timeline</span>: <span class="code-string">"7–14 days"</span>,</p>
                    <p>&nbsp;&nbsp;<span class="code-keyword">budget</span>: <span class="code-string">"fixed_price"</span>,</p>
                    <p>&nbsp;&nbsp;<span class="code-keyword">ownership</span>: <span class="code-string">"100% yours"</span></p>
                    <p>}</p>
                    <p class="mt-2"><span class="code-comment">// We make it happen</span></p>
                    <p><span class="code-fn">launch</span>(<span class="code-fn">project</span>)<span class="code-cursor"></span></p>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
     TESTIMONIALS
     ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ --}}
<section id="testimonials" class="py-24 bg-surface" aria-labelledby="testimonials-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="text-center mb-14 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">Client Stories</p>
            <h2 id="testimonials-heading" class="text-3xl sm:text-4xl font-extrabold text-text">
                Trusted by Businesses<br><span class="grad-text">Across Bangladesh</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $testimonials = [
                ['name' => 'Rahim Uddin',   'role' => 'E-commerce Owner, Dhaka',
                 'text' => 'The ready-made e-commerce solution saved us months of development time and cost. The code quality is exceptional and the post-launch support has been outstanding.'],
                ['name' => 'Sarah Ahmed',   'role' => 'Co-Founder, SaaS Startup',
                 'text' => 'We launched our SaaS platform in under a week using their product. Clean architecture, great documentation, and a team that actually responds when you need them.'],
                ['name' => 'Karim Hassan', 'role' => 'Owner, Restaurant Chain',
                 'text' => 'Their custom restaurant management system replaced three different tools we were using. Operations are smoother, errors are down, and staff love how easy it is to use.'],
            ];
            @endphp

            @foreach($testimonials as $i => $t)
            <div class="bg-white border border-black/6 rounded-2xl p-7 flex flex-col reveal delay-{{ ($i+1)*100 }}">
                <div class="flex gap-1 mb-5" aria-label="5 out of 5 stars">
                    @for($s = 0; $s < 5; $s++)
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="#F59E0B">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    @endfor
                </div>
                <blockquote class="text-muted text-sm leading-relaxed flex-1 mb-6">
                    "{{ $t['text'] }}"
                </blockquote>
                <div class="flex items-center gap-3 pt-4 border-t border-black/6">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-xs font-bold shrink-0 bg-text">
                        {{ substr($t['name'], 0, 1) }}
                    </div>
                    <div>
                        <p class="text-text text-sm font-semibold">{{ $t['name'] }}</p>
                        <p class="text-muted text-xs">{{ $t['role'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

@endsection

@push('scripts')
    @vite('resources/js/pages/home.js')
@endpush
