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
        <a href="{{ route('home') }}" class="shrink-0 flex items-center gap-2.5">
            <x-logo size="lg" />
            <span class="text-base font-extrabold tracking-tight text-text leading-none">
                North <span class="grad-text">Pixel</span>
            </span>
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
                     class="absolute top-full left-1/2 -translate-x-1/2 mt-2 w-[520px] bg-white rounded-2xl
                            shadow-xl shadow-black/10 border border-black/6 py-3 z-50"
                     role="menu">

                    <div class="grid grid-cols-2 gap-x-1 px-2">
                        <a href="{{ route('services.web') }}" class="dropdown-item" role="menuitem">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                            Web Development
                        </a>
                        <a href="{{ route('services.mobile') }}" class="dropdown-item" role="menuitem">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 18h.01M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"/></svg>
                            Mobile App Development
                        </a>
                        <a href="{{ route('services.domain') }}" class="dropdown-item" role="menuitem">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                            Domain & Hosting
                        </a>
                        <a href="{{ route('services.cloud') }}" class="dropdown-item" role="menuitem">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/></svg>
                            Cloud Management
                        </a>
                        <a href="{{ route('services.devops') }}" class="dropdown-item" role="menuitem">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 3l14 9-14 9V3z"/></svg>
                            DevOps & Server
                        </a>
                        <a href="{{ route('services.security') }}" class="dropdown-item" role="menuitem">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            Cyber Security
                        </a>
                        <a href="{{ route('services.graphics') }}" class="dropdown-item" role="menuitem">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Graphics & Branding
                        </a>
                        <a href="{{ route('services.marketing') }}" class="dropdown-item" role="menuitem">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10"/></svg>
                            Digital Marketing
                        </a>
                        <a href="{{ route('services.ai') }}" class="dropdown-item" role="menuitem">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                            AI & Automation
                        </a>
                        <a href="{{ route('services.maintenance') }}" class="dropdown-item" role="menuitem">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><circle cx="12" cy="12" r="3"/></svg>
                            Software Maintenance
                        </a>
                        <a href="{{ route('services.server') }}" class="dropdown-item" role="menuitem">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            Server Maintenance
                        </a>
                    </div>

                    {{-- Ready-Made Software hidden --}}
                </div>
            </li>

            {{-- Products hidden --}}
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
