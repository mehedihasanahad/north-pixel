{{-- Mobile navigation drawer (light theme) --}}
<div id="mobile-overlay"
    x-data
    :class="$store.ui.drawerOpen ? 'open' : ''"
    @click="$store.ui.closeDrawer()"
    aria-hidden="true"
></div>

<aside id="mobile-drawer"
    x-data
    :class="$store.ui.drawerOpen ? 'open' : ''"
    role="dialog"
    aria-modal="true"
    aria-label="Navigation menu"
>
    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">
        <a href="{{ route('home') }}" @click="$store.ui.closeDrawer()">
            <x-logo size="sm" />
        </a>
        <button @click="$store.ui.closeDrawer()"
            class="p-1.5 rounded-lg text-muted hover:text-text hover:bg-black/5 transition"
            aria-label="{{ __('common.close') }}"
        >
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 6L6 18M6 6l12 12"/></svg>
        </button>
    </div>

    {{-- Nav links --}}
    <nav>
        <ul class="space-y-1" role="list">
            {{-- Home --}}
            <li>
                <a href="{{ route('home') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-muted hover:text-text hover:bg-black/5 transition font-medium text-sm"
                   @click="$store.ui.closeDrawer()">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" class="opacity-50">
                        <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                    </svg>
                    {{ __('nav.home') }}
                </a>
            </li>

            {{-- Services accordion --}}
            <li x-data="{ open: false }">
                <button @click="open = !open"
                        class="w-full flex items-center justify-between gap-3 px-3 py-2.5 rounded-xl text-muted hover:text-text hover:bg-black/5 transition font-medium text-sm">
                    <span class="flex items-center gap-3">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" class="opacity-50">
                            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                        </svg>
                        {{ __('nav.services') }}
                    </span>
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"
                         class="transition-transform duration-200 shrink-0" :class="open ? 'rotate-180' : ''">
                        <path d="M6 9l6 6 6-6"/>
                    </svg>
                </button>
                <div x-show="open" x-collapse class="pl-8 mt-1 space-y-0.5">
                    @foreach([
                        ['href' => route('services.web'),         'label' => 'Web Development'],
                        ['href' => route('services.mobile'),      'label' => 'Mobile Apps'],
                        ['href' => route('services.speedup'),     'label' => 'Performance'],
                        ['href' => route('services.maintenance'), 'label' => 'Maintenance'],
                        ['href' => route('services.ready'),       'label' => 'Ready-Made Software'],
                    ] as $sub)
                    <a href="{{ $sub['href'] }}"
                       class="block px-3 py-2 rounded-lg text-sm text-muted hover:text-primary hover:bg-primary/5 transition"
                       @click="$store.ui.closeDrawer()">
                        {{ $sub['label'] }}
                    </a>
                    @endforeach
                </div>
            </li>

            {{-- Products, Custom, About, Contact --}}
            @foreach([
                ['route' => '/products',       'label' => __('nav.products'), 'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
                ['route' => '/custom-request', 'label' => __('nav.custom'),   'icon' => 'M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z'],
                ['route' => '/about',          'label' => __('nav.about'),    'icon' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['route' => '/contact',        'label' => __('nav.contact'),  'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
            ] as $item)
            <li>
                <a href="{{ $item['route'] }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-muted hover:text-text hover:bg-black/5 transition font-medium text-sm"
                   @click="$store.ui.closeDrawer()">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" class="opacity-50">
                        <path d="{{ $item['icon'] }}"/>
                    </svg>
                    {{ $item['label'] }}
                </a>
            </li>
            @endforeach
        </ul>
    </nav>

    <div class="my-6 border-t border-black/6"></div>

    <div class="space-y-3">
        @guest
            <a href="/login"    class="btn-ghost w-full justify-center" style="padding:0.65rem" @click="$store.ui.closeDrawer()">{{ __('nav.login') }}</a>
            <a href="/register" class="btn-primary w-full justify-center" style="padding:0.65rem" @click="$store.ui.closeDrawer()">{{ __('nav.register') }}</a>
        @endguest
        @auth
            <a href="/dashboard" class="btn-ghost w-full justify-center" style="padding:0.65rem" @click="$store.ui.closeDrawer()">{{ __('nav.dashboard') }}</a>
        @endauth

    </div>
</aside>
