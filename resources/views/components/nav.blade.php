{{-- Sticky navbar — opacity ramps up with scroll --}}
<header
    x-data="{ opacity: 0 }"
    x-init="window.addEventListener('scroll', () => { opacity = Math.min(1, window.scrollY / 120) }, { passive: true })"
    :style="`background: rgba(9,9,11,${(opacity * 0.75).toFixed(2)}); backdrop-filter: blur(${Math.round(opacity * 12)}px); -webkit-backdrop-filter: blur(${Math.round(opacity * 12)}px); border-bottom: 1px solid rgba(255,255,255,${(opacity * 0.07).toFixed(2)}); box-shadow: 0 4px 20px rgba(0,0,0,${(opacity * 0.4).toFixed(2)})`"
    class="fixed top-0 inset-x-0 z-50 transition-[background,box-shadow] duration-150"
    role="banner"
>
    <nav class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between" aria-label="Main navigation">

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="shrink-0">
            <x-logo size="md" />
        </a>

        {{-- Desktop links --}}
        <ul class="hidden lg:flex items-center gap-7" role="list">
            <li><a href="{{ route('home') }}"  class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">{{ __('nav.home') }}</a></li>
            <li><a href="/products"            class="nav-link {{ request()->is('products*') ? 'active' : '' }}">{{ __('nav.products') }}</a></li>
            <li><a href="/custom-request"      class="nav-link {{ request()->is('custom*') ? 'active' : '' }}">{{ __('nav.custom') }}</a></li>
            <li><a href="/about"               class="nav-link {{ request()->is('about') ? 'active' : '' }}">{{ __('nav.about') }}</a></li>
            <li><a href="/contact"             class="nav-link {{ request()->is('contact') ? 'active' : '' }}">{{ __('nav.contact') }}</a></li>
        </ul>

        {{-- Right side --}}
        <div class="hidden lg:flex items-center gap-3">
            {{-- Language switch --}}
            <form method="POST" action="{{ route('locale.switch', app()->getLocale() === 'en' ? 'bn' : 'en') }}">
                @csrf
                <button type="submit"
                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-full border border-white/10 text-muted text-sm font-medium hover:border-primary/40 hover:text-white transition-all"
                    title="{{ __('nav.lang_switch') }}"
                >
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20"/></svg>
                    {{ __('nav.lang_switch') }}
                </button>
            </form>

            @guest
                <a href="/login"    class="nav-link text-sm">{{ __('nav.login') }}</a>
                <a href="/register" class="btn-primary" style="padding:0.45rem 1.2rem;font-size:0.875rem">
                    {{ __('nav.register') }}
                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            @endguest
            @auth
                <a href="/dashboard" class="btn-ghost" style="padding:0.45rem 1.2rem;font-size:0.875rem">{{ __('nav.dashboard') }}</a>
            @endauth
        </div>

        {{-- Mobile hamburger --}}
        <button
            @click="$store.ui.openDrawer()"
            class="lg:hidden p-2 rounded-lg text-muted hover:text-white hover:bg-white/5 transition"
            aria-label="Open menu"
            aria-expanded="false"
        >
            <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </nav>
</header>
