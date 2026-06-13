@extends('layouts.app')
@section('title', 'Graphics Design & Branding — One Stop IT Solution')
@section('description', 'Professional logo design, brand identity, UI/UX design, social media graphics, and creative branding solutions for businesses worldwide.')
@section('content')

<section class="hero-light relative overflow-hidden pt-[70px]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-16 lg:py-24 grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
        <div class="text-center lg:text-left reveal">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-[#8B5CF6]/25 bg-[#8B5CF6]/6 text-[#7C3AED] text-xs font-semibold tracking-wide uppercase mb-6">
                <span class="w-1.5 h-1.5 rounded-full animate-pulse" style="background:#8B5CF6"></span>
                Graphics & Branding
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-[3.25rem] font-extrabold leading-[1.1] tracking-tight mb-5 text-text">
                Design That Makes<br><span style="background:linear-gradient(135deg,#8B5CF6,#EC4899);-webkit-background-clip:text;-webkit-text-fill-color:transparent">Your Brand Memorable</span>
            </h1>
            <p class="text-muted text-base sm:text-lg leading-relaxed max-w-lg mx-auto lg:mx-0 mb-8">
                We create visual identities that connect with your audience — from logos and brand guidelines to UI/UX designs and marketing materials that convert.
            </p>
            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3">
                <a href="{{ route('custom-request') }}" class="btn-primary" style="background:linear-gradient(135deg,#8B5CF6,#EC4899)">Start Your Project</a>
                <a href="{{ route('contact') }}" class="btn-ghost">See Our Work <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
            </div>
        </div>
        <div class="hidden lg:flex items-center justify-center reveal delay-200" aria-hidden="true">
            <div class="w-full max-w-md space-y-3">
                <div class="rounded-2xl border border-black/8 bg-white shadow-lg p-5">
                    <p class="text-xs text-muted mb-3 font-semibold uppercase tracking-wide">Brand Identity Package</p>
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 rounded-xl flex items-center justify-center" style="background:linear-gradient(135deg,#8B5CF6,#EC4899)">
                            <svg width="24" height="24" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14"/><rect x="2" y="4" width="20" height="16" rx="2"/></svg>
                        </div>
                        <div>
                            <p class="text-text font-bold text-sm">YourBrand</p>
                            <p class="text-muted text-xs">Modern • Professional • Unique</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        @foreach(['#8B5CF6','#EC4899','#0D0D14','#F8F8FA'] as $c)
                        <div class="w-8 h-8 rounded-lg border border-black/8" style="background:{{ $c }}"></div>
                        @endforeach
                        <span class="text-xs text-muted self-center ml-1">Brand Colors</span>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-3">
                    @foreach([['Logo Design','#8B5CF6'],['UI/UX','#EC4899'],['Social Kit','#3B82F6']] as $item)
                    <div class="rounded-xl border border-black/6 bg-surface p-3 text-center">
                        <div class="w-8 h-8 rounded-lg mx-auto mb-2 flex items-center justify-center" style="background:{{ $item[1] }}15">
                            <svg width="12" height="12" fill="none" stroke="{{ $item[1] }}" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2l2 7h7l-5.5 4 2 7L12 16l-5.5 4 2-7L3 9h7z"/></svg>
                        </div>
                        <span class="text-text text-xs font-semibold">{{ $item[0] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14 reveal"><p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">Services</p><h2 class="text-3xl sm:text-4xl font-extrabold text-text mb-4">Creative Services We Offer</h2></div>
        @php $feats=[
            ['Logo & Brand Identity','Distinctive logos, brand guidelines, colour palettes, and typography systems that tell your brand story.','#8B5CF6','M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'],
            ['UI/UX Design','User-centred interface design for web and mobile apps — wireframes, prototypes, and high-fidelity mockups in Figma.','#EC4899','M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
            ['Social Media Graphics','Scroll-stopping post templates, story designs, and ad creatives for Instagram, Facebook, LinkedIn, and more.','#3B82F6','M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316'],
            ['Print & Marketing','Brochures, flyers, business cards, banners, and packaging design ready for professional print production.','#F59E0B','M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z'],
            ['Motion Graphics','Animated logos, explainer videos, and social media animations that bring your brand to life.','#059669','M15 10l4.553-2.069A1 1 0 0121 8.87v6.26a1 1 0 01-1.447.894L15 14M3 8a2 2 0 012-2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z'],
            ['Brand Refresh','Modernise your existing brand while retaining recognition — logo evolution, updated visual language, new brand toolkit.','#EF1B3F','M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15'],
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
        <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">Design Tools</p>
        <div class="flex flex-wrap justify-center gap-3 mt-6">
            @foreach(['Figma','Adobe Illustrator','Adobe Photoshop','Adobe After Effects','Adobe InDesign','Canva Pro','Sketch','Blender','LottieFiles','Principle','Framer','Zeplin'] as $t)
            <span class="tech-pill px-4 py-2 text-sm font-medium">{{ $t }}</span>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-surface">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12 reveal"><p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">FAQ</p><h2 class="text-3xl font-extrabold text-text">Common Questions</h2></div>
        <div x-data="{}">
            @foreach([['How many revisions are included?','All projects include at least 3 rounds of revisions. We work until you\'re 100% satisfied with the result.'],['Do you provide source files?','Yes — you receive all editable source files (Figma, AI, PSD) along with production-ready exports in all required formats.'],['Can you design for both web and print?','Absolutely. We deliver web-optimised assets (PNG, SVG, WebP) and print-ready files (CMYK PDF, EPS) as needed.'],['How long does a brand identity project take?','A full brand identity project typically takes 2–4 weeks — this includes the logo, colour system, typography, and brand guidelines.']] as $i=>$faq)
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
        <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4">Build a Brand People Remember</h2>
        <p class="text-white/55 max-w-lg mx-auto mb-8">Great design is more than aesthetics — it builds trust and drives conversions. Let's create something extraordinary.</p>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('custom-request') }}" class="btn-primary">Start Your Project</a>
            <a href="{{ route('contact') }}" class="btn-ghost-dark">Contact Us</a>
        </div>
    </div>
</section>
@endsection
@push('scripts') @vite('resources/js/pages/services.js') @endpush
