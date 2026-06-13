@extends('layouts.app')
@section('title', 'Digital Marketing Services — One Stop IT Solution')
@section('description', 'Data-driven SEO, PPC, social media marketing, content strategy, and email marketing to grow your brand and revenue online.')
@section('content')

<section class="hero-light relative overflow-hidden pt-[70px]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-16 lg:py-24 grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
        <div class="text-center lg:text-left reveal">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-[#059669]/25 bg-[#059669]/6 text-[#047857] text-xs font-semibold tracking-wide uppercase mb-6">
                <span class="w-1.5 h-1.5 rounded-full animate-pulse" style="background:#059669"></span>
                Digital Marketing
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-[3.25rem] font-extrabold leading-[1.1] tracking-tight mb-5 text-text">
                Grow Your Revenue<br><span style="background:linear-gradient(135deg,#059669,#10B981);-webkit-background-clip:text;-webkit-text-fill-color:transparent">With Data-Driven Marketing</span>
            </h1>
            <p class="text-muted text-base sm:text-lg leading-relaxed max-w-lg mx-auto lg:mx-0 mb-8">
                From SEO and paid advertising to social media and email marketing — we build marketing systems that attract the right audience and turn them into loyal customers.
            </p>
            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3">
                <a href="{{ route('custom-request') }}" class="btn-primary" style="background:linear-gradient(135deg,#059669,#10B981)">Get a Growth Plan</a>
                <a href="{{ route('contact') }}" class="btn-ghost">Talk to an Expert <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
            </div>
        </div>
        <div class="hidden lg:flex items-center justify-center reveal delay-200" aria-hidden="true">
            <div class="w-full max-w-md rounded-2xl border border-black/8 bg-white shadow-xl p-5">
                <p class="text-xs text-muted mb-4 font-semibold uppercase tracking-wide">Campaign Performance</p>
                @foreach([['Organic Traffic','+127%','#059669'],['Conversion Rate','4.8%','#3B82F6'],['Cost Per Lead','$2.40','#F59E0B'],['ROAS','5.2x','#EF1B3F']] as $m)
                <div class="flex items-center justify-between py-2.5 border-b border-black/6 last:border-0">
                    <span class="text-muted text-sm">{{ $m[0] }}</span>
                    <span class="font-extrabold text-sm" style="color:{{ $m[2] }}">{{ $m[1] }}</span>
                </div>
                @endforeach
                <div class="mt-4 flex items-center gap-2 text-xs text-muted">
                    <span class="w-2 h-2 rounded-full bg-green-400"></span>
                    All campaigns active — Last 30 days
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14 reveal"><p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">Services</p><h2 class="text-3xl sm:text-4xl font-extrabold text-text mb-4">Full-Funnel Digital Marketing</h2></div>
        @php $feats=[
            ['Search Engine Optimisation','Technical SEO, on-page optimisation, link building, and content strategy to rank on page 1 and stay there.','#059669','M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z'],
            ['PPC & Paid Advertising','Google Ads, Meta Ads, and LinkedIn Ads campaigns managed for maximum ROI with constant A/B testing.','#EF1B3F','M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5'],
            ['Social Media Marketing','Content creation, community management, and growth strategies for Instagram, Facebook, LinkedIn, and TikTok.','#3B82F6','M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684z'],
            ['Content Marketing','Blog posts, landing pages, case studies, and whitepapers that attract, educate, and convert your ideal customers.','#F59E0B','M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
            ['Email Marketing','Automated email sequences, newsletters, and drip campaigns that nurture leads and drive repeat purchases.','#8B5CF6','M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
            ['Analytics & Reporting','Monthly performance reports with actionable insights — traffic, conversions, ROAS, and custom KPI dashboards.','#06B6D4','M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z'],
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
        <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">Platforms & Tools</p>
        <div class="flex flex-wrap justify-center gap-3 mt-6">
            @foreach(['Google Analytics 4','Google Ads','Meta Ads','SEMrush','Ahrefs','Mailchimp','HubSpot','Klaviyo','Hotjar','Search Console','LinkedIn Ads','TikTok Ads'] as $t)
            <span class="tech-pill px-4 py-2 text-sm font-medium">{{ $t }}</span>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-surface">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12 reveal"><p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">FAQ</p><h2 class="text-3xl font-extrabold text-text">Common Questions</h2></div>
        <div x-data="{}">
            @foreach([['How long before I see SEO results?','SEO is a long-term strategy — expect to see measurable improvements in 3–6 months. Paid advertising delivers results from day one.'],['Do you offer fixed monthly retainers?','Yes — we offer monthly retainer plans covering SEO, content, and paid advertising with clear deliverables and KPIs each month.'],['Can you manage our social media accounts?','Yes — we handle content creation, scheduling, engagement, and growth for all major platforms.'],['Do you work with e-commerce businesses?','Absolutely — we specialise in Google Shopping, Meta Ads for e-commerce, and SEO strategies specifically for product-based businesses.']] as $i=>$faq)
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
        <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4">Ready to Grow Your Business?</h2>
        <p class="text-white/55 max-w-lg mx-auto mb-8">Get a free marketing audit and a custom growth plan tailored to your business goals and budget.</p>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('custom-request') }}" class="btn-primary">Get a Free Audit</a>
            <a href="{{ route('contact') }}" class="btn-ghost-dark">Contact Us</a>
        </div>
    </div>
</section>
@endsection
@push('scripts') @vite('resources/js/pages/services.js') @endpush
