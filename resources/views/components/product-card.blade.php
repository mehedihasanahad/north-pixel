@php
    $title   = $product->title_en;
    $desc    = $product->short_desc_en;
    $catName = $product->category?->name_en ?: $product->category?->name_bn;
@endphp

<article class="product-card tilt-card flex flex-col group h-full">
    <div class="holographic" aria-hidden="true"></div>

    {{-- Thumbnail --}}
    <a href="{{ route('products.show', $product->slug) }}"
       class="relative block w-full overflow-hidden bg-surface shrink-0"
       style="padding-top: 56.25%"
       aria-label="{{ $title }}">
        @if($product->thumbnail_url)
            <img src="{{ "/storage/" . $product->thumbnail_url }}" alt="{{ $title }}"
                 class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105"
                 loading="lazy">
        @else
            <div class="absolute inset-0 flex items-center justify-center bg-surface shimmer">
                <svg width="40" height="40" fill="none" stroke="rgba(0,0,0,0.12)" stroke-width="1.5" viewBox="0 0 24 24">
                    <rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/>
                </svg>
            </div>
        @endif

        {{-- Badges --}}
        <div class="absolute top-3 left-3 flex gap-1.5">
            @if($product->is_featured)
                <span class="badge badge-featured">
                    <svg width="9" height="9" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    {{ __('products.featured') }}
                </span>
            @endif
            @if($product->is_new)
                <span class="badge badge-new">{{ __('products.new') }}</span>
            @endif
        </div>
    </a>

    {{-- Body --}}
    <div class="flex flex-col flex-1 p-3 sm:p-5">

        <p class="text-xs text-primary font-semibold uppercase tracking-wide truncate mb-1.5 h-4">
            {{ $catName ?? '&nbsp;' }}
        </p>

        <a href="{{ route('products.show', $product->slug) }}"
           class="font-bold text-text text-base leading-snug hover:text-primary transition line-clamp-2 mb-2"
           style="min-height: 2.75rem">
            {{ $title }}
        </a>

        <p class="text-muted text-sm leading-relaxed line-clamp-2 mb-4"
           style="min-height: 2.5rem">
            {{ $desc }}
        </p>

        <div class="flex flex-wrap gap-1.5 mb-4 overflow-hidden" style="max-height: 1.75rem">
            @if($product->techStack->count())
                @foreach($product->techStack->take(4) as $tech)
                    <span class="tech-pill shrink-0" style="cursor:default">{{ $tech->tech_name }}</span>
                @endforeach
            @endif
        </div>

        <div class="mt-auto pt-3 border-t border-black/6 flex items-center justify-between gap-2">
            <a href="{{ route('products.show', $product->slug) }}" class="min-w-0 hover:opacity-80 transition">
                @if($product->price_bdt)
                    <p class="text-xs text-muted mb-0.5 whitespace-nowrap">{{ __('products.price_from') }}</p>
                    <p class="text-text font-bold text-lg leading-none whitespace-nowrap">
                        ৳{{ number_format($product->price_bdt, 0) }}
                    </p>
                @endif
            </a>

            <div class="flex items-center gap-1.5 shrink-0">
                @if($product->preview_available && $product->preview_url)
                    @auth
                        <a href="{{ $product->preview_url }}" target="_blank" rel="noopener noreferrer"
                           class="btn-ghost" style="padding:0.4rem 0.6rem;font-size:0.75rem;gap:4px">
                            <svg class="hidden sm:inline" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M1 12S5 4 12 4s11 8 11 8-4 8-11 8S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>
                            {{ __('products.preview') }}
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="btn-ghost" style="padding:0.4rem 0.6rem;font-size:0.75rem;gap:4px">
                            {{ __('products.preview') }}
                        </a>
                    @endauth
                @else
                    <span class="btn-ghost opacity-40 cursor-not-allowed select-none" style="padding:0.4rem 0.6rem;font-size:0.75rem">
                        {{ __('products.coming_soon') }}
                    </span>
                @endif

                <button
                    @click="$store.ui.openModal({ title: {{ Js::from($title) }}, isPrebook: {{ $product->is_coming_soon ? 'true' : 'false' }} })"
                    class="btn-primary" style="padding:0.4rem 0.6rem;font-size:0.75rem">
                    {{ $product->is_coming_soon ? __('products.prebook') : __('products.buy') }}
                </button>
            </div>
        </div>
    </div>
</article>
