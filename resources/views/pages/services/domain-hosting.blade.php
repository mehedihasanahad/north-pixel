@extends('layouts.app')
@section('title', 'Domain & Hosting Solutions — One Stop IT Solution')
@section('description', 'Reliable domain registration, managed web hosting, VPS, SSL certificates, and business email hosting for businesses worldwide.')
@section('content')

<section class="hero-light relative overflow-hidden pt-[70px]" aria-labelledby="svc-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-16 lg:py-24 grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
        <div class="text-center lg:text-left reveal">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-primary/25 bg-primary/6 text-primary text-xs font-semibold tracking-wide uppercase mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                Domain & Hosting
            </div>
            <h1 id="svc-heading" class="text-4xl sm:text-5xl lg:text-[3.25rem] font-extrabold leading-[1.1] tracking-tight mb-5 text-text">
                Reliable Hosting<br><span class="grad-text">Built for Performance</span>
            </h1>
            <p class="text-muted text-base sm:text-lg leading-relaxed max-w-lg mx-auto lg:mx-0 mb-8">
                From domain registration to managed VPS and cloud hosting — we set up, secure, and manage your entire web infrastructure so you can focus on growth.
            </p>
            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3">
                <a href="{{ route('custom-request') }}" class="btn-primary">Get a Free Quote</a>
                <a href="{{ route('contact') }}" class="btn-ghost">Talk to an Expert <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
            </div>
        </div>
        <div class="hidden lg:flex relative items-center justify-center reveal delay-200" aria-hidden="true">
            <div class="relative w-full max-w-md">
                <div class="rounded-2xl overflow-hidden border border-black/8 shadow-2xl shadow-black/10">
                    <div class="flex items-center gap-2 px-4 py-3 bg-surface border-b border-black/6">
                        <span class="w-3 h-3 rounded-full bg-red-400/50"></span><span class="w-3 h-3 rounded-full bg-yellow-400/50"></span><span class="w-3 h-3 rounded-full bg-green-400/50"></span>
                        <div class="flex-1 mx-3 px-3 py-1 rounded-md text-xs text-muted text-center bg-white border border-black/6">DNS Manager</div>
                    </div>
                    <div class="bg-white p-5 space-y-3">
                        @foreach([['yourdomain.com','A','192.168.1.1','Active'],['mail.yourdomain.com','MX','mail-server','Active'],['www.yourdomain.com','CNAME','yourdomain.com','Active']] as $r)
                        <div class="flex items-center gap-3 rounded-xl px-3 py-2.5 border border-black/6 bg-surface text-xs">
                            <span class="text-text font-semibold flex-1 truncate">{{ $r[0] }}</span>
                            <span class="px-2 py-0.5 rounded-md bg-primary/8 text-primary font-bold">{{ $r[1] }}</span>
                            <span class="text-muted truncate">{{ $r[2] }}</span>
                            <span class="w-2 h-2 rounded-full bg-green-400 shrink-0"></span>
                        </div>
                        @endforeach
                        <div class="flex items-center gap-2 mt-2 pt-2 border-t border-black/6">
                            <span class="w-2 h-2 rounded-full bg-green-400"></span>
                            <span class="text-xs text-muted">SSL Active — Expires in 365 days</span>
                        </div>
                    </div>
                </div>
                <div class="absolute -top-3 -right-3 glass rounded-full px-3 py-1.5 text-xs font-semibold text-text shadow-xl z-10 flex items-center gap-2">
                    <svg width="12" height="12" fill="none" stroke="#059669" stroke-width="2.5" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg> 99.9% Uptime
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">What We Offer</p>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-text mb-4">Everything Your Site Needs to Stay Online</h2>
        </div>
        @php $feats=[
            ['Domain Registration','Register .com, .net, .org, .io and country-code domains with full DNS management.','#EF1B3F','M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9'],
            ['Managed Web Hosting','cPanel-based shared hosting with SSD storage, daily backups, and one-click app installs.','#3B82F6','M5 12h14M12 5l7 7-7 7'],
            ['VPS & Cloud Servers','Scalable virtual private servers on leading cloud providers — fully managed and monitored.','#F59E0B','M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z'],
            ['SSL Certificates','Free Let\'s Encrypt or premium wildcard/EV SSL certificates installed and auto-renewed.','#059669','M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'],
            ['Business Email Hosting','Professional email on your domain with spam filtering, large mailboxes, and mobile sync.','#8B5CF6','M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
            ['CDN & Speed Optimisation','Cloudflare CDN integration, caching rules, and image optimisation for global fast loads.','#06B6D4','M13 10V3L4 14h7v7l9-11h-7z'],
        ]; @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($feats as $i=>$f)
            <div class="bg-white border border-black/6 rounded-2xl p-6 hover:shadow-md hover:-translate-y-1 transition reveal delay-{{ ($i%3+1)*100 }}">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-4" style="background:{{ $f[2] }}0D;border:1px solid {{ $f[2] }}22">
                    <svg width="20" height="20" fill="none" stroke="{{ $f[2] }}" stroke-width="1.8" viewBox="0 0 24 24"><path d="{{ $f[3] }}"/></svg>
                </div>
                <h3 class="text-text font-bold mb-2 text-sm">{{ $f[0] }}</h3>
                <p class="text-muted text-sm leading-relaxed">{{ $f[1] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">How We Work</p>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-text">From Registration to Live in Hours</h2>
        </div>
        @php $steps=[
            ['1','Choose Domain','We help you pick the perfect domain name and check availability across all TLDs.','#EF1B3F','M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3'],
            ['2','Select Hosting Plan','We recommend the right hosting plan based on your traffic, tech stack, and budget.','#3B82F6','M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806'],
            ['3','Configure & Secure','DNS records, SSL, email MX records, CDN, and firewall rules — all set up for you.','#F59E0B','M10.325 4.317c.426-1.756 2.924-1.756 3.35 0'],
            ['4','Monitor & Support','24/7 uptime monitoring with instant alerts and ongoing support from our team.','#059669','M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2z'],
        ]; @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 relative">
            <div class="hidden lg:block absolute top-9 left-[12.5%] right-[12.5%] h-px bg-black/8" aria-hidden="true"></div>
            @foreach($steps as $i=>$s)
            <div class="text-center reveal delay-{{ ($i+1)*100 }}">
                <div class="relative w-16 h-16 rounded-full border border-black/8 bg-white flex items-center justify-center mx-auto mb-5">
                    <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full flex items-center justify-center text-xs font-black text-white" style="background:{{ $s[3] }}">{{ $s[0] }}</span>
                    <svg width="22" height="22" fill="none" stroke="{{ $s[3] }}" stroke-width="1.8" viewBox="0 0 24 24"><path d="{{ $s[4] }}"/></svg>
                </div>
                <h3 class="font-bold text-text text-sm mb-2">{{ $s[1] }}</h3>
                <p class="text-muted text-sm leading-relaxed">{{ $s[2] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center reveal">
        <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">Technologies & Providers</p>
        <h2 class="text-2xl font-extrabold text-text mb-8">Tools & Platforms We Work With</h2>
        <div class="flex flex-wrap justify-center gap-3">
            @foreach(['Cloudflare','cPanel','Namecheap','AWS Lightsail','DigitalOcean','Let\'s Encrypt','Nginx','Apache','Linux Ubuntu','WHM','DirectAdmin','Plesk'] as $t)
            <span class="tech-pill px-4 py-2 text-sm font-medium">{{ $t }}</span>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">FAQ</p>
            <h2 class="text-3xl font-extrabold text-text">Common Questions</h2>
        </div>
        <div x-data="{}">
            @foreach([
                ['Can you transfer my existing domain?','Yes — we handle the full domain transfer process including unlocking, auth codes, and DNS migration with zero downtime.'],
                ['What if my site goes down?','Our monitoring alerts us within 60 seconds of downtime. We investigate and resolve issues immediately, often before you notice.'],
                ['Do you manage the server or just set it up?','We offer both — one-time setup or fully managed ongoing plans where we handle updates, security patches, and backups.'],
                ['Can you migrate my existing website to a new host?','Absolutely. We migrate files, databases, and email accounts with a staged cutover to ensure zero data loss.'],
            ] as $i => $faq)
            <div class="faq-item reveal delay-{{ ($i+1)*100 }}" x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex items-center justify-between py-5 text-left gap-4" :aria-expanded="open">
                    <span class="text-text font-semibold text-sm">{{ $faq[0] }}</span>
                    <span class="shrink-0 w-7 h-7 rounded-full border border-black/10 flex items-center justify-center transition-transform duration-300" :class="open ? 'rotate-45 border-primary/40 bg-primary/8' : ''">
                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                    </span>
                </button>
                <div x-show="open" x-collapse><p class="pb-5 text-muted text-sm leading-relaxed">{{ $faq[1] }}</p></div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-text">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center reveal">
        <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4">Get Your Site Online Today</h2>
        <p class="text-white/55 max-w-lg mx-auto mb-8">Fast setup, professional management, and 24/7 support — let us handle the infrastructure while you run your business.</p>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('custom-request') }}" class="btn-primary">Get a Free Quote</a>
            <a href="{{ route('contact') }}" class="btn-ghost-dark">Contact Us</a>
        </div>
    </div>
</section>

@endsection
@push('scripts') @vite('resources/js/pages/services.js') @endpush
