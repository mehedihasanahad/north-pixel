@extends('layouts.app')
@section('title', 'Server Maintenance & Monitoring — One Stop IT Solution')
@section('description', '24/7 server monitoring, proactive patch management, performance tuning, automated backups, and incident response for Linux and Windows servers.')
@section('content')

<section class="hero-light relative overflow-hidden pt-[70px]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-16 lg:py-24 grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
        <div class="text-center lg:text-left reveal">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-[#06B6D4]/25 bg-[#06B6D4]/6 text-[#0891B2] text-xs font-semibold tracking-wide uppercase mb-6">
                <span class="w-1.5 h-1.5 rounded-full animate-pulse" style="background:#06B6D4"></span>
                Server Maintenance
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-[3.25rem] font-extrabold leading-[1.1] tracking-tight mb-5 text-text">
                Servers Running<br><span style="background:linear-gradient(135deg,#06B6D4,#059669);-webkit-background-clip:text;-webkit-text-fill-color:transparent">24/7 Without Worry</span>
            </h1>
            <p class="text-muted text-base sm:text-lg leading-relaxed max-w-lg mx-auto lg:mx-0 mb-8">
                We monitor, patch, tune, and secure your servers around the clock — so you get maximum uptime, peak performance, and fast incident response without the overhead of an in-house team.
            </p>
            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3">
                <a href="{{ route('custom-request') }}" class="btn-primary" style="background:linear-gradient(135deg,#06B6D4,#059669)">Get Managed Support</a>
                <a href="{{ route('contact') }}" class="btn-ghost">Talk to an Expert <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
            </div>
        </div>
        <div class="hidden lg:flex items-center justify-center reveal delay-200" aria-hidden="true">
            <div class="w-full max-w-md rounded-2xl overflow-hidden border border-black/8 shadow-2xl shadow-black/10" style="background:#0D0D14">
                <div class="flex items-center gap-2 px-4 py-3 border-b border-white/8">
                    <span class="w-3 h-3 rounded-full bg-red-500/60"></span><span class="w-3 h-3 rounded-full bg-yellow-500/60"></span><span class="w-3 h-3 rounded-full bg-green-500/60"></span>
                    <span class="text-white/40 text-xs ml-2">Server Monitor — prod-01</span>
                </div>
                <div class="p-5 space-y-3">
                    @foreach([['CPU','34%','#06B6D4',34],['RAM','58%','#3B82F6',58],['Disk','22%','#059669',22],['Network I/O','41%','#F59E0B',41]] as $m)
                    <div class="font-mono text-xs">
                        <div class="flex justify-between text-white/50 mb-1.5"><span>{{ $m[0] }}</span><span style="color:{{ $m[2] }}">{{ $m[1] }}</span></div>
                        <div class="h-1.5 rounded-full bg-white/10"><div class="h-full rounded-full metric-bar transition-all duration-700" style="width:0%;background:{{ $m[2] }};--target-w:{{ $m[3] }}%"></div></div>
                    </div>
                    @endforeach
                    <div class="flex items-center justify-between pt-2 border-t border-white/8 font-mono text-xs">
                        <span class="text-green-400">● All services running</span>
                        <span class="text-white/30">Uptime: 99.98%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14 reveal"><p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">What We Do</p><h2 class="text-3xl sm:text-4xl font-extrabold text-text mb-4">Comprehensive Server Management</h2></div>
        @php $feats=[
            ['24/7 Uptime Monitoring','Real-time monitoring with 60-second check intervals — instant alerts via Slack, SMS, or email when anything goes wrong.','#06B6D4','M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10'],
            ['Patch Management','Automated OS and software patch deployment with pre-testing in staging — stay secure without unexpected downtime.','#3B82F6','M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04'],
            ['Automated Backups','Daily incremental and weekly full backups with off-site replication — tested and documented restore procedures.','#F59E0B','M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10'],
            ['Performance Tuning','Database query optimisation, web server configuration, caching layers, and OS-level tuning for peak throughput.','#059669','M13 10V3L4 14h7v7l9-11h-7z'],
            ['Incident Response','Dedicated on-call engineers who investigate and resolve critical incidents — with a full post-mortem report after every event.','#EF1B3F','M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z'],
            ['Log Management','Centralised log aggregation with ELK stack — search, analyse, and alert on application and system logs in real time.','#8B5CF6','M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
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

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center reveal">
        <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">Tools & Stack</p>
        <div class="flex flex-wrap justify-center gap-3 mt-6">
            @foreach(['Prometheus','Grafana','Nagios','Zabbix','ELK Stack','Ansible','Cron','Logrotate','Nginx','MySQL','Redis','Linux Ubuntu / CentOS'] as $t)
            <span class="tech-pill px-4 py-2 text-sm font-medium">{{ $t }}</span>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-surface">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12 reveal"><p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">FAQ</p><h2 class="text-3xl font-extrabold text-text">Common Questions</h2></div>
        <div x-data="{}">
            @foreach([['What operating systems do you support?','We support all major Linux distributions (Ubuntu, Debian, CentOS, RHEL) and Windows Server. Both bare-metal and virtual servers are supported.'],['How quickly do you respond to incidents?','Critical incidents receive a response within 15 minutes around the clock. Our SLA defines P1 (critical) through P4 (low) response times clearly.'],['Do you manage databases as well?','Yes — we handle MySQL, PostgreSQL, MongoDB, and Redis — including replication setup, query optimisation, and backup configuration.'],['Can you manage cloud VMs the same way?','Absolutely — we manage servers on any cloud provider (AWS EC2, DigitalOcean Droplets, GCP VMs, Azure VMs) the same way as dedicated hardware.']] as $i=>$faq)
            <div class="faq-item reveal delay-{{ ($i+1)*100 }}" x-data="{ open: false }">
                <button @click="open=!open" class="w-full flex items-center justify-between py-5 text-left gap-4" :aria-expanded="open">
                    <span class="text-text font-semibold text-sm">{{ $faq[0] }}</span>
                    <span class="shrink-0 w-7 h-7 rounded-full border border-black/10 flex items-center justify-center transition-transform duration-300" :class="open?'rotate-45 border-primary/40 bg-primary/8':''"><svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span>
                </button>
                <div x-show="open" x-collapse><p class="pb-5 text-muted text-sm leading-relaxed">{{ $faq[1] }}</p></div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-text">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center reveal">
        <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4">Never Lose Sleep Over Your Servers</h2>
        <p class="text-white/55 max-w-lg mx-auto mb-8">Let our team take over your server management so you can focus on building your product.</p>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('custom-request') }}" class="btn-primary">Get Managed Support</a>
            <a href="{{ route('contact') }}" class="btn-ghost-dark">Contact Us</a>
        </div>
    </div>
</section>
@endsection
@push('scripts') @vite('resources/js/pages/services.js') @endpush
