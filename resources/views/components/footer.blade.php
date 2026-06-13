{{-- Site footer — dark background --}}
<footer class="mt-0" role="contentinfo" style="background:#0D0D14">
    <div class="max-w-7xl mx-auto px-6 pt-16 pb-8">

        {{-- Main grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 mb-12">

            {{-- Brand column (wider) --}}
            <div class="lg:col-span-2">
                <a href="{{ route('home') }}" class="inline-flex mb-5">
                    <x-logo size="lg" />
                </a>
                <p class="text-white/50 text-sm leading-relaxed max-w-xs mb-6">
                    Your One Stop IT Solution — web development, cloud, security, AI, marketing,
                    and more. Trusted by businesses worldwide.
                </p>

                {{-- Social links --}}
                <div class="flex items-center gap-2">
                    @if(!empty($settings['facebook_url']))
                    <a href="{{ $settings['facebook_url'] }}" target="_blank" rel="noopener noreferrer"
                       class="w-9 h-9 rounded-xl flex items-center justify-center text-white/40 transition-all duration-200
                              border border-white/10 hover:border-primary/50 hover:text-white hover:bg-primary/15"
                       aria-label="Facebook">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    @endif
                    @if(!empty($settings['whatsapp_number']))
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number']) }}"
                       target="_blank" rel="noopener noreferrer"
                       class="w-9 h-9 rounded-xl flex items-center justify-center text-white/40 transition-all duration-200
                              border border-white/10 hover:border-[#25D366]/50 hover:text-white hover:bg-[#25D366]/15"
                       aria-label="WhatsApp">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </a>
                    @endif
                </div>
            </div>

            {{-- Services --}}
            <div>
                <h3 class="text-white text-sm font-semibold mb-5 flex items-center gap-2">
                    <span class="w-1 h-4 rounded-full bg-primary inline-block"></span>
                    Services
                </h3>
                <ul class="space-y-3" role="list">
                    @foreach([
                        [route('services.web'),         'Web Development'],
                        [route('services.mobile'),      'Mobile App Development'],
                        [route('services.domain'),      'Domain & Hosting'],
                        [route('services.cloud'),       'Cloud Management'],
                        [route('services.devops'),      'DevOps & Server'],
                        [route('services.security'),    'Cyber Security'],
                        [route('services.graphics'),    'Graphics & Branding'],
                        [route('services.marketing'),   'Digital Marketing'],
                        [route('services.ai'),          'AI & Automation'],
                        [route('services.maintenance'), 'Software Maintenance'],
                        [route('services.server'),      'Server Maintenance'],
                        [route('services.ready'),       'Ready-Made Software'],
                    ] as [$href, $label])
                    <li>
                        <a href="{{ $href }}"
                           class="text-white/50 text-sm hover:text-white transition-colors duration-150 flex items-center gap-1.5 group">
                            <span class="w-0 group-hover:w-2 h-px bg-primary transition-all duration-200 rounded-full"></span>
                            {{ $label }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Quick links --}}
            <div>
                <h3 class="text-white text-sm font-semibold mb-5 flex items-center gap-2">
                    <span class="w-1 h-4 rounded-full bg-primary inline-block"></span>
                    Company
                </h3>
                <ul class="space-y-3" role="list">
                    @foreach([
                        [route('home'),      'Home'],
                        ['/products',        'Products'],
                        ['/custom-request',  'Custom Request'],
                        ['/about',           'About Us'],
                        ['/contact',         'Contact'],
                    ] as [$href, $label])
                    <li>
                        <a href="{{ $href }}"
                           class="text-white/50 text-sm hover:text-white transition-colors duration-150 flex items-center gap-1.5 group">
                            <span class="w-0 group-hover:w-2 h-px bg-primary transition-all duration-200 rounded-full"></span>
                            {{ $label }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h3 class="text-white text-sm font-semibold mb-5 flex items-center gap-2">
                    <span class="w-1 h-4 rounded-full bg-primary inline-block"></span>
                    Contact
                </h3>
                <ul class="space-y-3" role="list">
                    @if(!empty($settings['contact_email']))
                    <li>
                        <a href="mailto:{{ $settings['contact_email'] }}"
                           class="flex items-start gap-2.5 text-white/50 text-sm hover:text-white transition-colors duration-150 group">
                            <svg class="shrink-0 mt-0.5" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                            {{ $settings['contact_email'] }}
                        </a>
                    </li>
                    @endif
                    @if(!empty($settings['whatsapp_number']))
                    <li>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number']) }}"
                           class="flex items-start gap-2.5 text-white/50 text-sm hover:text-white transition-colors duration-150 group">
                            <svg class="shrink-0 mt-0.5" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81 19.79 19.79 0 01.08 1.18 2 2 0 012.07 0h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L6.91 7.91a16 16 0 006.72 6.72l1.28-.8a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/>
                            </svg>
                            {{ $settings['whatsapp_number'] }}
                        </a>
                    </li>
                    @endif
                    @if(!empty($settings['contact_address']))
                    <li class="flex items-start gap-2.5 text-white/50 text-sm">
                        <svg class="shrink-0 mt-0.5" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                        {{ $settings['contact_address'] }}
                    </li>
                    @endif
                </ul>
            </div>

        </div>

        {{-- Bottom bar --}}
        <div class="border-t border-white/8 pt-6 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-white/35 text-xs">
                &copy; {{ date('Y') }} {{ $settings['site_name'] ?? config('app.name') }}. All rights reserved.
            </p>
            <div class="flex items-center gap-6">
                <a href="/privacy" class="text-white/35 text-xs hover:text-white/70 transition-colors duration-150">Privacy Policy</a>
                <a href="/terms"   class="text-white/35 text-xs hover:text-white/70 transition-colors duration-150">Terms of Service</a>
                <span class="text-white/25 text-xs flex items-center gap-1">
                    Made with
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="#EF1B3F">
                        <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/>
                    </svg>
                    in Bangladesh
                </span>
            </div>
        </div>

    </div>
</footer>
