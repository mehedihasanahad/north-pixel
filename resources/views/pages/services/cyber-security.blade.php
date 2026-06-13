@extends('layouts.app')
@section('title', 'Cyber Security Solutions — One Stop IT Solution')
@section('description', 'Comprehensive cyber security audits, penetration testing, firewall setup, DDoS protection, and compliance consulting for businesses worldwide.')
@section('content')

<section class="hero-light relative overflow-hidden pt-[70px]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-16 lg:py-24 grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
        <div class="text-center lg:text-left reveal">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-primary/25 bg-primary/6 text-primary text-xs font-semibold tracking-wide uppercase mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                Cyber Security
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-[3.25rem] font-extrabold leading-[1.1] tracking-tight mb-5 text-text">
                Protect Your Business<br><span class="grad-text">Before It's Too Late</span>
            </h1>
            <p class="text-muted text-base sm:text-lg leading-relaxed max-w-lg mx-auto lg:mx-0 mb-8">
                From penetration testing to ongoing threat monitoring — we identify vulnerabilities before attackers do and build defences that keep your data safe.
            </p>
            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3">
                <a href="{{ route('custom-request') }}" class="btn-primary">Get a Security Audit</a>
                <a href="{{ route('contact') }}" class="btn-ghost">Talk to an Expert <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
            </div>
        </div>
        <div class="hidden lg:flex items-center justify-center reveal delay-200" aria-hidden="true">
            <div class="w-full max-w-md rounded-2xl overflow-hidden border border-black/8 shadow-2xl shadow-black/10" style="background:#0D0D14">
                <div class="flex items-center gap-2 px-4 py-3 border-b border-white/8">
                    <span class="w-3 h-3 rounded-full bg-red-500/60"></span><span class="w-3 h-3 rounded-full bg-yellow-500/60"></span><span class="w-3 h-3 rounded-full bg-green-500/60"></span>
                    <span class="text-white/40 text-xs ml-2">Security Dashboard</span>
                </div>
                <div class="p-5 space-y-3 font-mono text-xs">
                    @foreach([['Firewall Status','Active','#059669'],['SSL Certificate','Valid · 365d','#059669'],['Failed Logins (24h)','3 blocked','#F59E0B'],['Malware Scan','Clean','#059669'],['Last Pen Test','7 days ago','#3B82F6'],['Threat Level','Low','#059669']] as $r)
                    <div class="flex items-center justify-between border-b border-white/6 pb-2">
                        <span class="text-white/50">{{ $r[0] }}</span>
                        <span class="font-semibold" style="color:{{ $r[2] }}">{{ $r[1] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14 reveal"><p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">Services</p><h2 class="text-3xl sm:text-4xl font-extrabold text-text mb-4">Full-Stack Security Coverage</h2></div>
        @php $feats=[
            ['Security Audit','Comprehensive review of your infrastructure, code, and configurations to identify vulnerabilities and risks.','#EF1B3F','M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622'],
            ['Penetration Testing','Ethical hacking to simulate real-world attacks and uncover exploitable vulnerabilities before bad actors do.','#3B82F6','M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4'],
            ['Firewall & WAF Setup','Configure application-layer firewalls, Web Application Firewalls (WAF), and intrusion prevention systems.','#F59E0B','M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'],
            ['DDoS Protection','Cloudflare enterprise rules, rate limiting, and traffic scrubbing to keep your services online under attack.','#059669','M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['SSL & Data Encryption','End-to-end encryption for data at rest and in transit — certificates, key management, and TLS hardening.','#8B5CF6','M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z'],
            ['Compliance Consulting','GDPR, ISO 27001, PCI-DSS, and SOC 2 readiness assessments with gap analysis and remediation roadmaps.','#06B6D4','M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414'],
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
        <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">Security Tools</p>
        <div class="flex flex-wrap justify-center gap-3 mt-6">
            @foreach(['OWASP ZAP','Nessus','Burp Suite','Metasploit','Cloudflare WAF','Fail2ban','ModSecurity','Nmap','Wireshark','ClamAV','OpenSSL','Auditd'] as $t)
            <span class="tech-pill px-4 py-2 text-sm font-medium">{{ $t }}</span>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-surface">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12 reveal"><p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">FAQ</p><h2 class="text-3xl font-extrabold text-text">Common Questions</h2></div>
        <div x-data="{}">
            @foreach([['How long does a security audit take?','A standard audit for a web application takes 3–7 business days. Enterprise-level assessments may take 2–4 weeks depending on scope.'],['What\'s the difference between a security audit and penetration testing?','An audit reviews configurations, policies, and code. Penetration testing actively attempts to exploit vulnerabilities to measure real-world risk — both are complementary.'],['Will pen testing affect my live systems?','We schedule testing during low-traffic windows and use safe testing techniques. We always agree on scope and a rules-of-engagement document before starting.'],['Do you help with GDPR compliance?','Yes — we conduct data mapping, assess processing activities, review privacy policies, and provide a remediation roadmap to meet GDPR requirements.']] as $i=>$faq)
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
        <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4">Secure Your Business Today</h2>
        <p class="text-white/55 max-w-lg mx-auto mb-8">Don't wait for a breach. Get a free security assessment and know exactly where your risks are.</p>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('custom-request') }}" class="btn-primary">Request Free Assessment</a>
            <a href="{{ route('contact') }}" class="btn-ghost-dark">Contact Us</a>
        </div>
    </div>
</section>
@endsection
@push('scripts') @vite('resources/js/pages/services.js') @endpush
