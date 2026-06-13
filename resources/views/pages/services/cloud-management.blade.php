@extends('layouts.app')
@section('title', 'Cloud Management & Optimization — One Stop IT Solution')
@section('description', 'Expert AWS, GCP, and Azure cloud management, cost optimization, auto-scaling, and infrastructure design for businesses of all sizes.')
@section('content')

<section class="hero-light relative overflow-hidden pt-[70px]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-16 lg:py-24 grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
        <div class="text-center lg:text-left reveal">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-[#06B6D4]/25 bg-[#06B6D4]/6 text-[#0891B2] text-xs font-semibold tracking-wide uppercase mb-6">
                <span class="w-1.5 h-1.5 rounded-full animate-pulse" style="background:#06B6D4"></span>
                Cloud Management
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-[3.25rem] font-extrabold leading-[1.1] tracking-tight mb-5 text-text">
                Cloud Infrastructure<br><span style="background:linear-gradient(135deg,#06B6D4,#3B82F6);-webkit-background-clip:text;-webkit-text-fill-color:transparent">Built to Scale</span>
            </h1>
            <p class="text-muted text-base sm:text-lg leading-relaxed max-w-lg mx-auto lg:mx-0 mb-8">
                We design, migrate, and optimise cloud environments on AWS, GCP, and Azure — reducing costs, improving reliability, and scaling with your business.
            </p>
            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3">
                <a href="{{ route('custom-request') }}" class="btn-primary">Start Cloud Journey</a>
                <a href="{{ route('contact') }}" class="btn-ghost">Talk to an Expert <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
            </div>
        </div>
        <div class="hidden lg:flex items-center justify-center reveal delay-200" aria-hidden="true">
            <div class="w-full max-w-md rounded-2xl overflow-hidden border border-black/8 shadow-2xl shadow-black/10" style="background:#0D0D14">
                <div class="flex items-center gap-2 px-4 py-3 border-b border-white/8">
                    <span class="w-3 h-3 rounded-full bg-red-500/60"></span><span class="w-3 h-3 rounded-full bg-yellow-500/60"></span><span class="w-3 h-3 rounded-full bg-green-500/60"></span>
                    <span class="text-white/40 text-xs ml-2">Cloud Dashboard</span>
                </div>
                <div class="p-5 space-y-3 font-mono text-xs">
                    @foreach([['CPU Usage','42%','#06B6D4',42],['Memory','67%','#3B82F6',67],['Disk I/O','28%','#059669',28],['Network','55%','#F59E0B',55]] as $m)
                    <div>
                        <div class="flex justify-between text-white/50 mb-1"><span>{{ $m[0] }}</span><span style="color:{{ $m[2] }}">{{ $m[1] }}</span></div>
                        <div class="h-1.5 rounded-full bg-white/10"><div class="h-full rounded-full metric-bar transition-all duration-700" style="width:0%;background:{{ $m[2] }};--target-w:{{ $m[3] }}%"></div></div>
                    </div>
                    @endforeach
                    <div class="pt-2 border-t border-white/8 flex items-center justify-between text-white/40">
                        <span>3 regions active</span><span class="text-green-400">All systems operational</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">Our Services</p>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-text mb-4">Full-Spectrum Cloud Management</h2>
        </div>
        @php $feats=[
            ['Cloud Migration','Move your on-premise or legacy infrastructure to AWS, GCP, or Azure with zero-downtime migration strategies.','#06B6D4','M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z'],
            ['Cost Optimisation','Analyse resource usage, right-size instances, leverage reserved capacity, and cut cloud spend by up to 40%.','#059669','M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['Auto-Scaling','Configure intelligent auto-scaling policies to handle traffic spikes automatically without over-provisioning.','#3B82F6','M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15'],
            ['Cloud Security','IAM policies, VPC configuration, security groups, encryption at rest and in transit, and compliance auditing.','#EF1B3F','M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'],
            ['Backup & Disaster Recovery','Automated cross-region backups with tested recovery procedures and defined RTO/RPO targets.','#F59E0B','M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10'],
            ['Monitoring & Observability','CloudWatch, Datadog, or Grafana dashboards with custom alerts, log aggregation, and performance insights.','#8B5CF6','M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
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
            <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">Process</p>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-text">Our Cloud Engagement Process</h2>
        </div>
        @php $steps=[['1','Cloud Audit','Assess current infrastructure, costs, and identify optimisation opportunities.','#06B6D4','M9 19v-6a2 2 0 00-2-2H5'],['2','Architecture Design','Design a scalable, secure cloud architecture tailored to your workload requirements.','#3B82F6','M4 5a1 1 0 011-1h14a1 1 0 011 1v2'],['3','Migration & Deploy','Execute the migration plan with staged rollouts and automated rollback capabilities.','#F59E0B','M8 7h12m0 0l-4-4m4 4l-4 4'],['4','Optimise & Monitor','Continuous cost optimisation, performance tuning, and 24/7 monitoring post-migration.','#059669','M13 10V3L4 14h7v7l9-11h-7z']]; @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 relative">
            <div class="hidden lg:block absolute top-9 left-[12.5%] right-[12.5%] h-px bg-black/8"></div>
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
        <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">Cloud Platforms & Tools</p>
        <div class="flex flex-wrap justify-center gap-3 mt-6">
            @foreach(['AWS','Google Cloud','Microsoft Azure','Terraform','Docker','Kubernetes','Ansible','CloudFlare','Datadog','Prometheus','Grafana','Redis'] as $t)
            <span class="tech-pill px-4 py-2 text-sm font-medium">{{ $t }}</span>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12 reveal"><p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">FAQ</p><h2 class="text-3xl font-extrabold text-text">Common Questions</h2></div>
        <div x-data="{}">
            @foreach([['Which cloud provider do you recommend?','We\'re provider-agnostic — we recommend based on your workload, budget, and existing stack. AWS is best for most businesses, GCP excels for ML/data, Azure suits Microsoft-heavy environments.'],['Can you reduce our existing cloud bill?','Yes — our cloud cost audit typically identifies 20–40% savings through rightsizing, reserved instances, and eliminating unused resources.'],['Do you offer 24/7 support?','Yes, we offer managed cloud plans with 24/7 monitoring and on-call support with defined SLA response times.'],['Can you manage a multi-cloud setup?','Absolutely. We manage hybrid and multi-cloud environments, including on-prem to cloud connectivity via VPN or Direct Connect.']] as $i=>$faq)
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
        <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4">Optimise Your Cloud Today</h2>
        <p class="text-white/55 max-w-lg mx-auto mb-8">Get a free cloud cost audit and see exactly where you can save money and improve performance.</p>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('custom-request') }}" class="btn-primary">Request Free Audit</a>
            <a href="{{ route('contact') }}" class="btn-ghost-dark">Contact Us</a>
        </div>
    </div>
</section>
@endsection
@push('scripts') @vite('resources/js/pages/services.js') @endpush
