{{-- Site footer --}}
<footer class="border-t border-white/6 mt-24" role="contentinfo">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-14">

            {{-- Brand column --}}
            <div class="lg:col-span-2">
                <a href="{{ route('home') }}" class="inline-flex mb-4">
                    <img src="{{ asset('assets/images/logo.jpeg') }}" alt="{{ $settings['site_name'] ?? config('app.name') }}" class="h-12 w-auto rounded-xl object-contain">
                </a>
                <p class="text-muted text-sm leading-relaxed max-w-xs">
                    {{ __('footer.tagline') }}
                </p>
                {{-- Social links --}}
                <div class="flex items-center gap-3 mt-5">
                    @if(!empty($settings['facebook_url']))
                    <a href="{{ $settings['facebook_url'] }}" target="_blank" rel="noopener noreferrer"
                       class="w-9 h-9 rounded-lg bg-white/5 border border-white/8 flex items-center justify-center text-muted hover:text-white hover:bg-primary/20 hover:border-primary/40 transition"
                       aria-label="Facebook">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    @endif
                    @if(!empty($settings['whatsapp_number']))
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number']) }}" target="_blank" rel="noopener noreferrer"
                       class="w-9 h-9 rounded-lg bg-white/5 border border-white/8 flex items-center justify-center text-muted hover:text-white hover:bg-[#25D366]/20 hover:border-[#25D366]/40 transition"
                       aria-label="WhatsApp">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    </a>
                    @endif
                </div>
            </div>

            {{-- Navigation --}}
            <div>
                <h3 class="text-white font-semibold text-sm mb-5">{{ __('footer.nav_heading') }}</h3>
                <ul class="space-y-3" role="list">
                    @foreach([
                        [route('home'),    __('nav.home')],
                        ['/products',      __('nav.products')],
                        ['/custom-request',__('nav.custom')],
                        ['/about',         __('nav.about')],
                        ['/contact',       __('nav.contact')],
                    ] as [$href, $label])
                    <li><a href="{{ $href }}" class="text-muted text-sm hover:text-white transition">{{ $label }}</a></li>
                    @endforeach
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h3 class="text-white font-semibold text-sm mb-5">{{ __('footer.contact_heading') }}</h3>
                <ul class="space-y-3" role="list">
                    @if(!empty($settings['contact_email']))
                    <li>
                        <a href="mailto:{{ $settings['contact_email'] }}" class="flex items-center gap-2 text-muted text-sm hover:text-white transition">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            {{ $settings['contact_email'] }}
                        </a>
                    </li>
                    @endif
                    @if(!empty($settings['whatsapp_number']))
                    <li>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number']) }}" class="flex items-center gap-2 text-muted text-sm hover:text-white transition">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81 19.79 19.79 0 01.08 1.18 2 2 0 012.07 0h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L6.91 7.91a16 16 0 006.72 6.72l1.28-.8a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/></svg>
                            {{ $settings['whatsapp_number'] }}
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        {{-- Bottom bar --}}
        <div class="border-t border-white/6 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-muted text-xs">
                &copy; {{ date('Y') }} {{ $settings['site_name'] ?? config('app.name') }}. {{ __('footer.rights') }}
            </p>
            <div class="flex items-center gap-5">
                <a href="/privacy" class="text-muted text-xs hover:text-white transition">{{ __('footer.privacy') }}</a>
                <a href="/terms"   class="text-muted text-xs hover:text-white transition">{{ __('footer.terms') }}</a>
                <span class="text-subtle text-xs flex items-center gap-1">
                    {{ __('footer.made_with') }}
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="#EF4444"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
                    {{ __('footer.in') }}
                </span>
            </div>
        </div>
    </div>
</footer>
