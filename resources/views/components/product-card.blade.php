{{--
    Reusable product card component.
    Props: $product (Product model with relations loaded)
    Usage: @include('components.product-card', ['product' => $product])
--}}
@php
    $title = app()->getLocale() === 'bn' && $product->title_bn ? $product->title_bn : $product->title_en;
    $desc  = app()->getLocale() === 'bn' && $product->short_desc_bn ? $product->short_desc_bn : $product->short_desc_en;
    $catName = app()->getLocale() === 'bn' && $product->category?->name_bn
               ? $product->category->name_bn
               : $product->category?->name_en;
@endphp

<article class="product-card tilt-card flex flex-col" aria-label="{{ $title }}">
    {{-- Holographic shimmer layer --}}
    <div class="holographic" aria-hidden="true"></div>

    {{-- Thumbnail --}}
    <div class="relative aspect-video bg-surface-2 overflow-hidden">
        @if($product->thumbnail_url)
            <img src="{{ $product->thumbnail_url }}" alt="{{ $title }}"
                 class="w-full h-full object-cover transition duration-500 group-hover:scale-105"
                 loading="lazy">
        @else
            <div class="absolute inset-0 flex items-center justify-center shimmer">
                <svg width="40" height="40" fill="none" stroke="rgba(255,255,255,0.15)" stroke-width="1.5" viewBox="0 0 24 24">
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
    </div>

    {{-- Body --}}
    <div class="flex flex-col flex-1 p-5">
        {{-- Category --}}
        @if($catName)
            <span class="text-xs text-primary font-semibold uppercase tracking-wide mb-2">{{ $catName }}</span>
        @endif

        {{-- Title --}}
        <h3 class="font-bold text-white text-base leading-snug mb-2 line-clamp-2 {{ app()->getLocale() === 'bn' ? 'bn' : '' }}">
            {{ $title }}
        </h3>

        {{-- Description --}}
        <p class="text-muted text-sm leading-relaxed line-clamp-2 mb-4 {{ app()->getLocale() === 'bn' ? 'bn' : '' }}">
            {{ $desc }}
        </p>

        {{-- Tech stack pills --}}
        @if($product->techStack->count())
            <div class="flex flex-wrap gap-1.5 mb-4">
                @foreach($product->techStack->take(4) as $tech)
                    <span class="tech-pill" style="cursor:default">{{ $tech->tech_name }}</span>
                @endforeach
            </div>
        @endif

        {{-- Footer: price + actions --}}
        <div class="mt-auto flex items-center justify-between gap-3">
            <div>
                @if($product->price_bdt)
                    <p class="text-xs text-muted mb-0.5">{{ __('products.price_from') }}</p>
                    <p class="text-white font-bold text-lg">
                        ৳{{ number_format($product->price_bdt, 0) }}
                        @if($product->price_usd)
                            <span class="text-muted text-xs font-normal">/ ${{ number_format($product->price_usd, 0) }}</span>
                        @endif
                    </p>
                @endif
            </div>

            <div class="flex items-center gap-2 shrink-0">
                @auth
                    @if($product->preview_url)
                        <a href="{{ $product->preview_url }}" target="_blank" rel="noopener noreferrer"
                           class="btn-ghost" style="padding:0.4rem 0.9rem;font-size:0.78rem;gap:5px">
                            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M1 12S5 4 12 4s11 8 11 8-4 8-11 8S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>
                            {{ __('products.preview') }}
                        </a>
                    @endif
                    <button
                        @click="$store.ui.openModal({ title: '{{ addslashes($title) }}' })"
                        class="btn-primary" style="padding:0.4rem 0.9rem;font-size:0.78rem">
                        {{ __('products.buy') }}
                    </button>
                @else
                    <a href="/login"
                       class="btn-ghost" style="padding:0.4rem 0.9rem;font-size:0.78rem;gap:5px">
                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                        {{ __('products.login_to_preview') }}
                    </a>
                @endauth
            </div>
        </div>
    </div>
</article>
