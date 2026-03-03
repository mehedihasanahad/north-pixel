{{-- Mobile navigation drawer --}}
<div id="mobile-overlay"
    :class="$store.ui.drawerOpen ? 'open' : ''"
    @click="$store.ui.closeDrawer()"
    aria-hidden="true"
></div>

<aside id="mobile-drawer"
    :class="$store.ui.drawerOpen ? 'open' : ''"
    role="dialog"
    aria-modal="true"
    aria-label="Navigation menu"
>
    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">
        <a href="{{ route('home') }}" class="flex items-center gap-2 text-white font-bold text-base" @click="$store.ui.closeDrawer()">
            <span class="w-7 h-7 rounded-lg bg-gradient-to-br from-primary to-purple-500 flex items-center justify-center text-white text-xs font-black">
                {{ strtoupper(substr($settings['site_name'] ?? config('app.name'), 0, 1)) }}
            </span>
            {{ $settings['site_name'] ?? config('app.name') }}
        </a>
        <button @click="$store.ui.closeDrawer()"
            class="p-1.5 rounded-lg text-muted hover:text-white hover:bg-white/5 transition"
            aria-label="{{ __('common.close') }}"
        >
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 6L6 18M6 6l12 12"/></svg>
        </button>
    </div>

    {{-- Nav links --}}
    <nav>
        <ul class="space-y-1" role="list">
            @foreach([
                ['route' => route('home'),      'label' => __('nav.home'),     'icon' => 'M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z'],
                ['route' => '/products',         'label' => __('nav.products'), 'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
                ['route' => '/custom-request',   'label' => __('nav.custom'),   'icon' => 'M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z'],
                ['route' => '/about',            'label' => __('nav.about'),    'icon' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['route' => '/contact',          'label' => __('nav.contact'),  'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
            ] as $item)
            <li>
                <a href="{{ $item['route'] }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-muted hover:text-white hover:bg-white/5 transition font-medium text-sm"
                   @click="$store.ui.closeDrawer()"
                >
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" class="opacity-60">
                        <path d="{{ $item['icon'] }}"/>
                    </svg>
                    {{ $item['label'] }}
                </a>
            </li>
            @endforeach
        </ul>
    </nav>

    {{-- Divider --}}
    <div class="my-6 border-t border-white/6"></div>

    {{-- Auth + lang --}}
    <div class="space-y-3">
        @guest
            <a href="/login"    class="btn-ghost w-full justify-center" style="padding:0.65rem" @click="$store.ui.closeDrawer()">{{ __('nav.login') }}</a>
            <a href="/register" class="btn-primary w-full justify-center" style="padding:0.65rem" @click="$store.ui.closeDrawer()">{{ __('nav.register') }}</a>
        @endguest
        @auth
            <a href="/dashboard" class="btn-ghost w-full justify-center" style="padding:0.65rem" @click="$store.ui.closeDrawer()">{{ __('nav.dashboard') }}</a>
        @endauth

        {{-- Language --}}
        <form method="POST" action="{{ route('locale.switch', app()->getLocale() === 'en' ? 'bn' : 'en') }}">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl border border-white/8 text-muted text-sm hover:border-primary/40 hover:text-white transition">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20"/></svg>
                {{ __('nav.lang_switch') }}
            </button>
        </form>
    </div>
</aside>
