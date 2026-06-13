@extends('layouts.app')
@section('title', 'DevOps & Server Management — One Stop IT Solution')
@section('description', 'CI/CD pipelines, infrastructure as code, container orchestration, and full DevOps consulting to ship faster and more reliably.')
@section('content')

<section class="hero-light relative overflow-hidden pt-[70px]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-16 lg:py-24 grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
        <div class="text-center lg:text-left reveal">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-[#F59E0B]/25 bg-[#F59E0B]/6 text-[#D97706] text-xs font-semibold tracking-wide uppercase mb-6">
                <span class="w-1.5 h-1.5 rounded-full animate-pulse" style="background:#F59E0B"></span>
                DevOps & Infrastructure
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-[3.25rem] font-extrabold leading-[1.1] tracking-tight mb-5 text-text">
                Ship Faster With<br><span style="background:linear-gradient(135deg,#F59E0B,#F97316);-webkit-background-clip:text;-webkit-text-fill-color:transparent">Modern DevOps</span>
            </h1>
            <p class="text-muted text-base sm:text-lg leading-relaxed max-w-lg mx-auto lg:mx-0 mb-8">
                Automate your deployments, standardise your infrastructure, and build reliable pipelines — so your team ships features in minutes, not days.
            </p>
            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3">
                <a href="{{ route('custom-request') }}" class="btn-primary" style="background:linear-gradient(135deg,#F59E0B,#F97316)">Get Started</a>
                <a href="{{ route('contact') }}" class="btn-ghost">Talk to an Expert <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
            </div>
        </div>
        <div class="hidden lg:flex items-center justify-center reveal delay-200" aria-hidden="true">
            <div class="w-full max-w-md rounded-2xl overflow-hidden border border-black/8 shadow-2xl shadow-black/10" style="background:#0D0D14">
                <div class="flex items-center gap-2 px-4 py-3 border-b border-white/8">
                    <span class="w-3 h-3 rounded-full bg-red-500/60"></span><span class="w-3 h-3 rounded-full bg-yellow-500/60"></span><span class="w-3 h-3 rounded-full bg-green-500/60"></span>
                    <span class="text-white/40 text-xs ml-2">CI/CD Pipeline</span>
                </div>
                <div class="p-5 font-mono text-xs space-y-2">
                    @foreach([['Build','✓ Passed','#059669'],['Test (Unit)','✓ 247/247','#059669'],['Test (E2E)','✓ Passed','#059669'],['Docker Build','✓ 1.2s','#F59E0B'],['Deploy → Staging','✓ Live','#3B82F6'],['Deploy → Production','⟳ Running...','#F59E0B']] as $step)
                    <div class="flex items-center justify-between text-white/60">
                        <span>{{ $step[0] }}</span>
                        <span style="color:{{ $step[2] }}">{{ $step[1] }}</span>
                    </div>
                    @endforeach
                    <div class="pt-2 mt-1 border-t border-white/8 text-white/30">Pipeline: main → production • 2m 14s</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14 reveal"><p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">What We Build</p><h2 class="text-3xl sm:text-4xl font-extrabold text-text mb-4">End-to-End DevOps Services</h2></div>
        @php $feats=[
            ['CI/CD Pipelines','Automated build, test, and deploy pipelines using GitHub Actions, GitLab CI, or Jenkins — push to ship.','#F59E0B','M5 3l14 9-14 9V3z'],
            ['Infrastructure as Code','Provision and manage cloud resources with Terraform and Ansible — version-controlled, reproducible infrastructure.','#EF1B3F','M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4'],
            ['Container Orchestration','Docker containerisation and Kubernetes cluster management for scalable, resilient microservices.','#3B82F6','M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
            ['Server Hardening','Linux server configuration, SSH hardening, firewall rules, fail2ban, and security best practices.','#059669','M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'],
            ['Load Balancing & HA','Nginx/HAProxy load balancers, database replication, and high-availability architectures.','#8B5CF6','M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9'],
            ['Monitoring & Alerting','Prometheus + Grafana dashboards, centralised logging with ELK stack, and PagerDuty alerting.','#06B6D4','M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5'],
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
        <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">Tools & Platforms</p>
        <div class="flex flex-wrap justify-center gap-3 mt-6">
            @foreach(['Docker','Kubernetes','Terraform','Ansible','GitHub Actions','GitLab CI','Jenkins','Nginx','Linux','Prometheus','Grafana','ELK Stack'] as $t)
            <span class="tech-pill px-4 py-2 text-sm font-medium">{{ $t }}</span>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-surface">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12 reveal"><p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">FAQ</p><h2 class="text-3xl font-extrabold text-text">Common Questions</h2></div>
        <div x-data="{}">
            @foreach([['Do you work with our existing tech stack?','Yes — we assess your current stack and build DevOps tooling around it rather than forcing a rewrite.'],['How long does it take to set up a CI/CD pipeline?','A basic pipeline for a Laravel or Node.js app takes 1–3 days. Full infrastructure-as-code with staging and production environments typically takes 1–2 weeks.'],['Can you migrate our app to containers?','Yes — we dockerise your application, set up a container registry, and migrate to Kubernetes or Docker Swarm depending on scale.'],['Do you provide ongoing DevOps support?','Yes — we offer retainer plans covering pipeline maintenance, incident response, and infrastructure updates.']] as $i=>$faq)
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
        <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4">Automate Your Deployments</h2>
        <p class="text-white/55 max-w-lg mx-auto mb-8">Stop deploying manually. Let us build you a pipeline that ships code to production in minutes, safely and automatically.</p>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('custom-request') }}" class="btn-primary">Get a Free Quote</a>
            <a href="{{ route('contact') }}" class="btn-ghost-dark">Contact Us</a>
        </div>
    </div>
</section>
@endsection
@push('scripts') @vite('resources/js/pages/services.js') @endpush
