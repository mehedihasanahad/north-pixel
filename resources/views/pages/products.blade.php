@extends('layouts.app')

@section('title', __('products.page_title'))
@section('description', __('products.page_sub'))

@section('content')

{{-- Page Hero --}}
<section class="bg-surface border-b border-black/6 pt-[70px]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-10 sm:py-14 reveal">
        <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">Ready-Made Software</p>
        <h1 class="text-3xl lg:text-4xl font-extrabold text-text mb-3">{{ __('products.page_heading') }}</h1>
        <p class="text-muted max-w-xl text-sm leading-relaxed">{{ __('products.page_sub') }}</p>
    </div>
</section>

<div class="bg-white min-h-screen pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-10">

        {{-- Search + Sort bar --}}
        <form method="GET" action="{{ route('products.index') }}">
            <div class="flex flex-col sm:flex-row gap-3 mb-8">

                {{-- Search input --}}
                <div class="relative flex-1">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="text-muted">
                            <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="{{ __('products.search_placeholder') }}"
                        class="block w-full h-11 bg-surface border border-black/10 rounded-xl pl-11 pr-4 text-text text-sm placeholder:text-muted/60 focus:outline-none focus:border-primary/60 focus:ring-1 focus:ring-primary/20 transition">
                </div>

                {{-- Sort select --}}
                <div class="relative">
                    <select name="sort" onchange="this.form.submit()"
                        class="h-11 pl-4 pr-10 rounded-xl border border-black/10 bg-surface text-text text-sm focus:outline-none focus:border-primary/60 transition cursor-pointer appearance-none">
                        <option value="default"    {{ request('sort', 'default') === 'default'   ? 'selected' : '' }}>{{ __('products.sort_default') }}</option>
                        <option value="newest"     {{ request('sort') === 'newest'               ? 'selected' : '' }}>{{ __('products.sort_newest') }}</option>
                        <option value="price_asc"  {{ request('sort') === 'price_asc'            ? 'selected' : '' }}>{{ __('products.sort_price_asc') }}</option>
                        <option value="price_desc" {{ request('sort') === 'price_desc'           ? 'selected' : '' }}>{{ __('products.sort_price_desc') }}</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" class="text-muted">
                            <path d="M6 9l6 6 6-6"/>
                        </svg>
                    </div>
                </div>

                {{-- Clear filters --}}
                @if(request()->hasAny(['search', 'category', 'min_price', 'max_price']) || (request('sort') && request('sort') !== 'default'))
                    <a href="{{ route('products.index') }}"
                       class="flex items-center justify-center h-11 px-4 rounded-xl border border-black/10 text-muted text-sm hover:text-text hover:border-black/20 transition whitespace-nowrap">
                        {{ __('products.clear_filters') }}
                    </a>
                @endif

                {{-- Submit on mobile --}}
                <button type="submit" class="sm:hidden h-11 px-5 rounded-xl bg-primary text-white text-sm font-semibold">
                    Search
                </button>
            </div>
        </form>

        {{-- Main layout: sidebar + grid --}}
        <div class="lg:grid lg:grid-cols-[220px_1fr] gap-8">

            {{-- Sidebar --}}
            <aside class="hidden lg:block">
                <div class="bg-surface border border-black/6 rounded-2xl p-5 sticky top-24">
                    <h3 class="text-text font-semibold text-sm mb-4">{{ __('products.filter_category') }}</h3>
                    <ul class="space-y-0.5">
                        <li>
                            <a href="{{ route('products.index', request()->except(['category', 'page'])) }}"
                               class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-sm transition
                                      {{ !request('category') ? 'bg-primary/10 text-primary font-semibold' : 'text-muted hover:text-text hover:bg-black/5' }}">
                                <span>{{ __('products.filter_all') }}</span>
                            </a>
                        </li>
                        @foreach($categories as $cat)
                        <li>
                            <a href="{{ route('products.index', array_merge(request()->except(['category', 'page']), ['category' => $cat->slug])) }}"
                               class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-sm transition
                                      {{ request('category') === $cat->slug ? 'bg-primary/10 text-primary font-semibold' : 'text-muted hover:text-text hover:bg-black/5' }}">
                                @if($cat->icon)
                                    @if(str_starts_with($cat->icon, 'heroicon-'))
                                        <x-dynamic-component :component="$cat->icon" class="w-4 h-4 shrink-0" />
                                    @else
                                        <span class="text-base leading-none">{{ $cat->icon }}</span>
                                    @endif
                                @endif
                                <span>{{ $cat->name_en ?: $cat->name_bn }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </aside>

            {{-- Products area --}}
            <div>
                {{-- Result count --}}
                <p class="text-muted text-sm mb-5">
                    <span class="text-text font-semibold">{{ $products->total() }}</span>
                    {{ __('products.count') }}
                </p>

                @if($products->count())
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        @foreach($products as $product)
                            @include('components.product-card', ['product' => $product])
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    @if($products->hasPages())
                        <div class="mt-10 flex items-center justify-center gap-2 flex-wrap">
                            {{-- Prev --}}
                            @if($products->onFirstPage())
                                <span class="px-4 py-2 rounded-xl border border-black/8 text-muted text-sm opacity-40 cursor-not-allowed select-none">
                                    &larr; Prev
                                </span>
                            @else
                                <a href="{{ $products->previousPageUrl() }}"
                                   class="px-4 py-2 rounded-xl border border-black/8 text-muted text-sm hover:text-text hover:border-black/20 transition">
                                    &larr; Prev
                                </a>
                            @endif

                            {{-- Page numbers --}}
                            @foreach($products->getUrlRange(max(1, $products->currentPage() - 2), min($products->lastPage(), $products->currentPage() + 2)) as $page => $url)
                                @if($page === $products->currentPage())
                                    <span class="w-9 h-9 rounded-xl bg-primary/10 border border-primary/30 text-primary text-sm font-semibold flex items-center justify-center">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                       class="w-9 h-9 rounded-xl border border-black/8 text-muted text-sm hover:text-text hover:border-black/20 transition flex items-center justify-center">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach

                            {{-- Next --}}
                            @if($products->hasMorePages())
                                <a href="{{ $products->nextPageUrl() }}"
                                   class="px-4 py-2 rounded-xl border border-black/8 text-muted text-sm hover:text-text hover:border-black/20 transition">
                                    Next &rarr;
                                </a>
                            @else
                                <span class="px-4 py-2 rounded-xl border border-black/8 text-muted text-sm opacity-40 cursor-not-allowed select-none">
                                    Next &rarr;
                                </span>
                            @endif
                        </div>
                    @endif

                @else
                    {{-- Empty state --}}
                    <div class="text-center py-24 px-6">
                        <div class="w-16 h-16 rounded-2xl bg-surface border border-black/8 flex items-center justify-center mx-auto mb-5">
                            <svg width="26" height="26" fill="none" stroke="rgba(0,0,0,0.2)" stroke-width="1.5" viewBox="0 0 24 24">
                                <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <p class="text-text font-semibold mb-2">{{ __('products.no_results') }}</p>
                        <p class="text-muted text-sm mb-6">{{ __('products.no_results_sub') }}</p>
                        <a href="{{ route('products.index') }}" class="btn-primary" style="padding:0.5rem 1.4rem;font-size:0.875rem">
                            {{ __('products.clear_filters') }}
                        </a>
                    </div>
                @endif
            </div>

        </div>{{-- end grid --}}
    </div>
</div>

@endsection
