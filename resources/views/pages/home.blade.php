@extends('layouts.app')

@section('title', 'North Pixel — One Stop IT Solution')
@section('description', 'North Pixel is your One Stop IT Solution — web development, mobile apps, cloud management, cyber security, AI automation, digital marketing, and more. Trusted by businesses worldwide.')

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
                 border border-primary/25 bg-primary/6 text-primary text-xs font-semibold
                 tracking-wide uppercase mb-7">
                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                One Stop IT Solution
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
                {{-- <a href="{{ route('products.index') }}" class="btn-ghost">
                    Browse Ready-Made Software
                </a> --}}
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
     SERVICES — 11 International Services
     ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ --}}
<section id="services" class="py-24 bg-white" aria-labelledby="services-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="text-center mb-14 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">Our Services</p>
            <h2 id="services-heading"
                class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-text mb-4">
                Everything Your Business<br class="hidden sm:block"> <span class="grad-text">Needs to Grow Online</span>
            </h2>
            <p class="text-muted max-w-2xl mx-auto text-base sm:text-lg">
                From web development and cloud management to AI automation and cyber security — one team, all your IT needs covered.
            </p>
        </div>

        @php
        $services = [
            ['title'=>'Web Development',          'desc'=>'Custom websites and web applications built with modern frameworks — fast, secure, and scalable.', 'href'=>route('services.web'),         'color'=>'#EF1B3F', 'icon'=>'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4'],
            ['title'=>'Mobile App Development',   'desc'=>'Native and cross-platform iOS & Android apps that deliver seamless user experiences.',           'href'=>route('services.mobile'),      'color'=>'#3B82F6', 'icon'=>'M12 18h.01M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z'],
            ['title'=>'Domain & Hosting',         'desc'=>'Domain registration, managed hosting, VPS, SSL certificates, and business email — all handled.',  'href'=>route('services.domain'),      'color'=>'#3B82F6', 'icon'=>'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9'],
            ['title'=>'Cloud Management',         'desc'=>'AWS, GCP, and Azure infrastructure design, migration, cost optimisation, and 24/7 monitoring.',   'href'=>route('services.cloud'),       'color'=>'#06B6D4', 'icon'=>'M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z'],
            ['title'=>'DevOps & Server',          'desc'=>'CI/CD pipelines, infrastructure as code, container orchestration, and server automation.',        'href'=>route('services.devops'),      'color'=>'#F59E0B', 'icon'=>'M5 3l14 9-14 9V3z'],
            ['title'=>'Cyber Security',           'desc'=>'Security audits, penetration testing, firewall setup, DDoS protection, and compliance consulting.','href'=>route('services.security'),    'color'=>'#EF1B3F', 'icon'=>'M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'],
            ['title'=>'Graphics & Branding',      'desc'=>'Logos, brand identities, UI/UX design, social media graphics, and motion design that convert.',   'href'=>route('services.graphics'),    'color'=>'#8B5CF6', 'icon'=>'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'],
            ['title'=>'Digital Marketing',        'desc'=>'Data-driven SEO, PPC, social media, content, and email marketing to grow your online revenue.',   'href'=>route('services.marketing'),   'color'=>'#059669', 'icon'=>'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10'],
            ['title'=>'AI & Automation',          'desc'=>'Chatbots, workflow automation, document processing, and ML-powered features integrated into your systems.','href'=>route('services.ai'), 'color'=>'#8B5CF6', 'icon'=>'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531'],
            ['title'=>'Software Maintenance',     'desc'=>'Bug fixes, feature updates, code reviews, performance tuning, and long-term support for your applications.','href'=>route('services.maintenance'),'color'=>'#06B6D4','icon'=>'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z'],
            ['title'=>'Server Maintenance',       'desc'=>'24/7 uptime monitoring, patch management, automated backups, and incident response for your servers.','href'=>route('services.server'), 'color'=>'#059669', 'icon'=>'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
        ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 mb-5">
            @foreach($services as $i => $svc)
            <div class="service-card reveal delay-{{ min(($i%4+1)*100, 400) }}">
                <div class="h-0.5 w-full" style="background:{{ $svc['color'] }}"></div>
                <div class="p-6">
                    <div class="mb-4 w-10 h-10 rounded-xl flex items-center justify-center"
                         style="background:{{ $svc['color'] }}0D;border:1px solid {{ $svc['color'] }}20">
                        <svg width="18" height="18" fill="none" stroke="{{ $svc['color'] }}" stroke-width="1.8" viewBox="0 0 24 24">
                            <path d="{{ $svc['icon'] }}"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-bold text-text mb-2">{{ $svc['title'] }}</h3>
                    <p class="text-muted text-xs leading-relaxed mb-4">{{ $svc['desc'] }}</p>
                    <a href="{{ $svc['href'] }}" class="inline-flex items-center gap-1 text-xs font-semibold transition-opacity hover:opacity-70"
                       style="color:{{ $svc['color'] }}">
                        Learn More
                        <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Featured: Ready-Made — hidden --}}

    </div>
</section>


{{-- Ready-Made Software Products section — hidden --}}


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
                Trusted by Businesses<br><span class="grad-text">Around the World</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $testimonials = [
                ['name' => 'Saleh Ahmed',   'role' => 'E-commerce Owner, Dhaka',
                 'text' => 'The ready-made e-commerce solution saved us months of development time and cost. The code quality is exceptional and the post-launch support has been outstanding.'],
                ['name' => 'Aminul Islam',   'role' => 'Co-Founder, SaaS Startup',
                 'text' => 'We launched our SaaS platform in under a week using their product. Clean architecture, great documentation, and a team that actually responds when you need them.'],
                ['name' => 'Dipankar Roy', 'role' => 'Owner, Restaurant Chain',
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
