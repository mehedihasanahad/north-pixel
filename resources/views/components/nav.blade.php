{{-- Sticky navbar --}}
<header
    x-data="{ scrolled: false }"
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 }, { passive: true })"
    :class="scrolled ? 'shadow-sm shadow-black/8 border-b border-black/8' : 'border-b border-transparent'"
    class="fixed top-0 inset-x-0 z-50 bg-white transition-all duration-200"
    role="banner"
>
    <nav class="max-w-7xl mx-auto px-6 h-[70px] flex items-center justify-between gap-8" aria-label="Main navigation">

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="shrink-0">
            <x-logo size="lg" />
        </a>

        {{-- Desktop links --}}
        <ul class="hidden lg:flex items-center gap-6" role="list">
            <li>
                <a href="{{ route('home') }}"
                   class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    Home
                </a>
            </li>

            {{-- Services dropdown --}}
            <li x-data="{ open: false }" class="relative"
                @mouseenter="open = true" @mouseleave="open = false">
                <button class="nav-link flex items-center gap-1 {{ request()->is('services*') ? 'active' : '' }}"
                        :class="open ? '!text-text' : ''"
                        aria-haspopup="true" :aria-expanded="open">
                    Services
                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"
                         class="transition-transform duration-200 opacity-60" :class="open ? 'rotate-180' : ''">
                        <path d="M6 9l6 6 6-6"/>
                    </svg>
                </button>

                <div x-show="open"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 translate-y-1"
                     class="absolute top-full left-1/2 -translate-x-1/2 mt-2 w-60 bg-white rounded-2xl
                            shadow-xl shadow-black/10 border border-black/6 py-2 z-50"
                     role="menu">

                    <a href="{{ route('services.web') }}" class="dropdown-item" role="menuitem">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                        Web Development
                    </a>
                    <a href="{{ route('services.mobile') }}" class="dropdown-item" role="menuitem">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M12 18h.01M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                        </svg>
                        Mobile Apps
                    </a>
                    <a href="{{ route('services.speedup') }}" class="dropdown-item" role="menuitem">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        Performance Improvement
                    </a>
                    <a href="{{ route('services.maintenance') }}" class="dropdown-item" role="menuitem">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                        Maintenance
                    </a>

                    <div class="my-1.5 mx-3 border-t border-black/6"></div>

                    <a href="{{ route('services.ready') }}" class="dropdown-item !font-semibold" role="menuitem"
                       style="color:#EF1B3F">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        Ready-Made Software
                    </a>
                </div>
            </li>

            <li>
                <a href="/products"
                   class="nav-link {{ request()->is('products*') ? 'active' : '' }}">
                    Products
                </a>
            </li>
            <li>
                <a href="/about"
                   class="nav-link {{ request()->is('about') ? 'active' : '' }}">
                    About
                </a>
            </li>
            <li>
                <a href="/contact"
                   class="nav-link {{ request()->is('contact') ? 'active' : '' }}">
                    Contact
                </a>
            </li>
        </ul>

        {{-- Right side --}}
        <div class="hidden lg:flex items-center gap-3 shrink-0">
            @guest
                <a href="/login"
                   class="text-muted text-sm font-medium hover:text-text transition-colors duration-150">
                    Login
                </a>
                <a href="{{ route('custom-request') }}"
                   class="btn-primary"
                   style="padding:0.5rem 1.25rem;font-size:0.875rem">
                    Get a Quote
                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            @endguest
            @auth
                <a href="/dashboard"
                   class="btn-ghost"
                   style="padding:0.5rem 1.25rem;font-size:0.875rem">
                    Dashboard
                </a>
            @endauth
        </div>

        {{-- Mobile hamburger --}}
        <button
            @click="$store.ui.openDrawer()"
            class="lg:hidden p-2 rounded-lg text-muted hover:text-text hover:bg-black/5 transition"
            aria-label="Open menu"
        >
            <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

    </nav>
</header>
