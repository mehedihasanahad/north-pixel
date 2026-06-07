@extends('layouts.app')

@php
    $title   = $product->title_en;
    $desc    = $product->description_en;
    $short   = $product->short_desc_en;
    $catName = $product->category?->name_en ?: $product->category?->name_bn;
@endphp

@section('title', $title)
@section('description', $short)
@section('og_type', 'product')
@section('og_image', $product->thumbnail_url ?: asset('assets/images/north-pixel-logo.jpg'))

@push('seo')
@php
    $siteUrl    = rtrim(config('app.url'), '/');
    $productUrl = $siteUrl . '/products/' . $product->slug;
    $imageUrl   = $product->thumbnail_url ?: asset('assets/images/north-pixel-logo.jpg');
    $priceBdt   = number_format((float) $product->price_bdt, 2, '.', '');
@endphp
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Product",
    "name": {{ Js::from($product->title_en) }},
    "description": {{ Js::from($product->short_desc_en) }},
    "image": {{ Js::from($imageUrl) }},
    "url": {{ Js::from($productUrl) }},
    "sku": {{ Js::from((string) $product->id) }},
    "brand": {
        "@@type": "Brand",
        "name": {{ Js::from($settings['site_name'] ?? config('app.name')) }}
    },
    "offers": {
        "@@type": "Offer",
        "priceCurrency": "BDT",
        "price": {{ Js::from($priceBdt) }},
        "availability": "https://schema.org/InStock",
        "url": {{ Js::from($productUrl) }},
        "seller": {
            "@@type": "Organization",
            "name": {{ Js::from($settings['site_name'] ?? config('app.name')) }}
        }
    }
    @if($product->category)
    ,"category": {{ Js::from($product->category->name_en) }}
    @endif
}
</script>
@endpush

@section('content')
<div class="bg-surface pt-[70px] border-b border-black/6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6">
        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-muted" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-text transition">{{ __('nav.home') }}</a>
            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="shrink-0 opacity-40"><path d="M9 18l6-6-6-6"/></svg>
            <a href="{{ route('products.index') }}" class="hover:text-text transition">{{ __('nav.products') }}</a>
            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="shrink-0 opacity-40"><path d="M9 18l6-6-6-6"/></svg>
            <span class="text-text font-medium truncate max-w-[200px]">{{ $title }}</span>
        </nav>
    </div>
</div>

<div class="bg-white pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- Left: screenshots + description --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Pass screenshot URLs to JS --}}
                @if($product->screenshots->count())
                <script>window._screenshotUrls = {!! json_encode($product->screenshots->map(fn($s) => asset('storage/' . $s->url))) !!};</script>
                @elseif($product->thumbnail_url)
                <script>window._screenshotUrls = {!! json_encode([asset('storage/' . $product->thumbnail_url)]) !!};</script>
                @endif

                {{-- Main screenshot / thumbnail --}}
                <div class="rounded-2xl overflow-hidden border border-black/8 bg-surface"
                     x-data="{ active: 0 }">

                    <div class="aspect-video">
                        @if($product->screenshots->count())
                            <img :src="[
                                    @foreach($product->screenshots as $i => $s) '{{ asset("storage/" . $s->url) }}'{{ !$loop->last ? ',' : '' }} @endforeach
                                 ][active]"
                                 alt="{{ $title }}"
                                 class="w-full h-full object-cover cursor-zoom-in"
                                 @click="window._lightbox && window._lightbox.loadAndOpen(active)">
                        @elseif($product->thumbnail_url)
                            <img src="{{ asset('storage/' . $product->thumbnail_url) }}" alt="{{ $title }}"
                                 class="w-full h-full object-cover cursor-zoom-in"
                                 @click="window._lightbox && window._lightbox.loadAndOpen(0)">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-surface shimmer"></div>
                        @endif
                    </div>

                    {{-- Thumbnail strip --}}
                    @if($product->screenshots->count() > 1)
                        <div class="flex gap-2 p-3 bg-surface border-t border-black/6">
                            @foreach($product->screenshots as $i => $s)
                                <button @click="active = {{ $i }}"
                                    :class="active === {{ $i }} ? 'ring-2 ring-primary opacity-100' : 'opacity-40 hover:opacity-70'"
                                    class="w-16 h-11 rounded-lg overflow-hidden shrink-0 transition">
                                    <img src="{{ asset('storage/' . $s->url) }}" alt="" class="w-full h-full object-cover">
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- Description --}}
                <div class="bg-white border border-black/6 rounded-2xl p-7">
                    <h2 class="text-text font-bold text-lg mb-5">Description</h2>
                    <div class="prose prose-sm max-w-none text-muted leading-relaxed">
                        {!! $desc !!}
                    </div>
                </div>

                {{-- Features --}}
                @if($product->features->count())
                <div class="bg-white border border-black/6 rounded-2xl p-7">
                    <h2 class="text-text font-bold text-lg mb-5">Features</h2>
                    <ul class="space-y-3">
                        @foreach($product->features as $feature)
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 w-5 h-5 rounded-full bg-primary/10 flex items-center justify-center shrink-0">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#EF1B3F" stroke-width="3"><path d="M20 6L9 17l-5-5"/></svg>
                            </span>
                            <div>
                                <p class="text-text text-sm font-medium">{{ $feature->title_en }}</p>
                                @if($feature->desc_en)
                                    <p class="text-muted text-xs mt-0.5">{{ $feature->desc_en }}</p>
                                @endif
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            {{-- Right: sticky order panel --}}
            <div class="lg:col-span-1">
                <div class="bg-white border border-black/6 rounded-2xl p-6 sticky top-24 space-y-5 shadow-sm">

                    {{-- Badges --}}
                    <div class="flex gap-2 flex-wrap">
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

                    {{-- Category --}}
                    @if($catName)
                        <p class="text-primary text-xs font-semibold uppercase tracking-widest">{{ $catName }}</p>
                    @endif

                    {{-- Title --}}
                    <h1 class="text-text font-bold text-xl leading-snug">{{ $title }}</h1>

                    {{-- Short desc --}}
                    <p class="text-muted text-sm leading-relaxed">{{ $short }}</p>

                    {{-- Price --}}
                    <div class="py-4 border-t border-b border-black/8">
                        <p class="text-muted text-xs mb-1">{{ __('products.price_from') }}</p>
                        <p class="text-text font-extrabold text-3xl">
                            ৳{{ number_format($product->price_bdt, 0) }}
                        </p>
                    </div>

                    {{-- CTA buttons --}}
                    <div class="space-y-3">
                        {{-- Order / Pre-book --}}
                        <button
                            @click="$store.ui.openModal({ title: {{ Js::from($title) }}, isPrebook: {{ $product->is_coming_soon ? 'true' : 'false' }} })"
                            class="btn-primary w-full justify-center py-3">
                            {{ $product->is_coming_soon ? __('products.prebook') : __('products.buy') }}
                        </button>

                        {{-- Preview / Coming Soon --}}
                        @if($product->preview_available && $product->preview_url)
                            @auth
                                <a href="{{ $product->preview_url }}" target="_blank" rel="noopener noreferrer"
                                   class="btn-ghost w-full justify-center py-3">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M1 12S5 4 12 4s11 8 11 8-4 8-11 8S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>
                                    {{ __('products.preview') }}
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn-ghost w-full justify-center py-3">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M1 12S5 4 12 4s11 8 11 8-4 8-11 8S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>
                                    {{ __('products.preview') }}
                                </a>
                            @endauth
                        @else
                            <span class="btn-ghost w-full justify-center py-3 opacity-40 cursor-not-allowed select-none">
                                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2a10 10 0 100 20A10 10 0 0012 2zm0 5v5l3 3"/></svg>
                                {{ __('products.coming_soon') }}
                            </span>
                        @endif
                    </div>

                    {{-- Tech stack --}}
                    @if($product->techStack->count())
                        <div class="pt-4 border-t border-black/8">
                            <p class="text-muted text-xs font-medium uppercase tracking-widest mb-3">Tech Stack</p>
                            <div class="flex flex-wrap gap-2">
                                @foreach($product->techStack as $tech)
                                    <span class="tech-pill">{{ $tech->tech_name }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Tags --}}
                    @if($product->tags->count())
                        <div class="pt-4 border-t border-black/8">
                            <p class="text-muted text-xs font-medium uppercase tracking-widest mb-3">Tags</p>
                            <div class="flex flex-wrap gap-2">
                                @foreach($product->tags as $tag)
                                    <a href="{{ route('products.index', ['search' => $tag->tag]) }}"
                                       class="text-xs px-2.5 py-1 rounded-full border border-black/10 text-muted hover:text-text hover:border-black/20 transition">
                                        #{{ $tag->tag }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Related products --}}
        @if($related->count())
        <div class="mt-16">
            <h2 class="text-text font-bold text-xl mb-6">Related Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($related as $rp)
                    @include('components.product-card', ['product' => $rp])
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>

@endsection

@push('scripts')
    @vite('resources/js/pages/product-detail.js')
@endpush
