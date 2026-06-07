@extends('layouts.app')

@section('title', __('about.page_title'))
@section('description', __('about.page_sub'))

@section('content')

{{-- Page Hero --}}
<section class="bg-surface border-b border-black/6 pt-[70px]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-10 sm:py-16 text-center reveal">
        <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('about.section_label') }}</p>
        <h1 class="text-3xl lg:text-5xl font-extrabold text-text mb-4">{{ __('about.page_heading') }}</h1>
        <p class="text-muted max-w-2xl mx-auto text-base leading-relaxed">{{ __('about.page_sub') }}</p>
    </div>
</section>

<div class="bg-white pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-14 space-y-12">

        {{-- Mission & Vision --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white border border-black/6 rounded-2xl p-8 reveal">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-5"
                     style="background:rgba(239,27,63,0.08);border:1px solid rgba(239,27,63,0.18)">
                    <svg width="22" height="22" fill="none" stroke="#EF1B3F" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h2 class="text-text font-bold text-xl mb-3">{{ __('about.mission_heading') }}</h2>
                <p class="text-muted leading-relaxed">{{ __('about.mission_text') }}</p>
            </div>

            <div class="bg-white border border-black/6 rounded-2xl p-8 reveal delay-100">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-5"
                     style="background:rgba(245,158,11,0.08);border:1px solid rgba(245,158,11,0.18)">
                    <svg width="22" height="22" fill="none" stroke="#F59E0B" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
                <h2 class="text-text font-bold text-xl mb-3">{{ __('about.vision_heading') }}</h2>
                <p class="text-muted leading-relaxed">{{ __('about.vision_text') }}</p>
            </div>
        </div>

        {{-- Our Story --}}
        <div class="bg-surface border border-black/6 rounded-2xl p-8 sm:p-12 reveal">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-text font-bold text-2xl lg:text-3xl mb-5">{{ __('about.story_heading') }}</h2>
                <p class="text-muted leading-relaxed text-base">{{ __('about.story_text') }}</p>
            </div>
        </div>

        {{-- Stats --}}
        <div class="reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted text-center mb-3">{{ __('about.stats_label') ?? 'By The Numbers' }}</p>
            <h2 class="text-text font-bold text-2xl text-center mb-8">{{ __('about.stats_heading') }}</h2>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">
                @php
                    $stats = [
                        ['value' => '50+',  'label' => __('stats.products'),     'color' => '#EF1B3F'],
                        ['value' => '500+', 'label' => __('stats.clients'),      'color' => '#F59E0B'],
                        ['value' => '99%',  'label' => __('stats.satisfaction'), 'color' => '#059669'],
                        ['value' => '24/7', 'label' => __('stats.support'),      'color' => '#3B82F6'],
                    ];
                @endphp
                @foreach($stats as $i => $stat)
                    <div class="stat-card reveal delay-{{ ($i+1)*100 }}">
                        <div class="text-3xl lg:text-4xl font-black mb-2" style="color:{{ $stat['color'] }}">{{ $stat['value'] }}</div>
                        <div class="text-muted text-sm">{{ $stat['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Our Values --}}
        <div class="reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted text-center mb-3">{{ __('about.values_label') ?? 'What We Stand For' }}</p>
            <h2 class="text-text font-bold text-2xl text-center mb-8">{{ __('about.values_heading') }}</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @php
                    $values = [
                        ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',                                                                                                                                                                'color' => '#EF1B3F', 'bg' => 'rgba(239,27,63,0.08)',  'border' => 'rgba(239,27,63,0.18)',  'title' => __('about.value_1_title'), 'desc' => __('about.value_1_desc')],
                        ['icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',                                                                                'color' => '#EC4899', 'bg' => 'rgba(236,72,153,0.08)', 'border' => 'rgba(236,72,153,0.18)', 'title' => __('about.value_2_title'), 'desc' => __('about.value_2_desc')],
                        ['icon' => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',                                                                              'color' => '#3B82F6', 'bg' => 'rgba(59,130,246,0.08)',  'border' => 'rgba(59,130,246,0.18)',  'title' => __('about.value_3_title'), 'desc' => __('about.value_3_desc')],
                        ['icon' => 'M13 10V3L4 14h7v7l9-11h-7z',                                                                                                                                                                                   'color' => '#F59E0B', 'bg' => 'rgba(245,158,11,0.08)',  'border' => 'rgba(245,158,11,0.18)',  'title' => __('about.value_4_title'), 'desc' => __('about.value_4_desc')],
                    ];
                @endphp
                @foreach($values as $i => $val)
                    <div class="capability-card reveal delay-{{ ($i+1)*100 }}">
                        <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-4"
                             style="background:{{ $val['bg'] }};border:1px solid {{ $val['border'] }}">
                            <svg width="20" height="20" fill="none" stroke="{{ $val['color'] }}" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $val['icon'] }}"/>
                            </svg>
                        </div>
                        <h3 class="text-text font-semibold text-sm mb-2">{{ $val['title'] }}</h3>
                        <p class="text-muted text-sm leading-relaxed">{{ $val['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Tech Stack --}}
        <div class="bg-surface border border-black/6 rounded-2xl p-8 reveal">
            <p class="text-xs font-semibold tracking-widest uppercase text-muted text-center mb-2">{{ __('about.tech_label') ?? 'Our Stack' }}</p>
            <h2 class="text-text font-bold text-2xl text-center mb-2">{{ __('about.tech_heading') }}</h2>
            <p class="text-muted text-center text-sm mb-8">{{ __('about.tech_sub') }}</p>
            @php
                $techs = [
                    ['name' => 'Laravel',     'color' => '#FF2D20'],
                    ['name' => 'PHP 8.2+',    'color' => '#777BB4'],
                    ['name' => 'MySQL',       'color' => '#4479A1'],
                    ['name' => 'React',       'color' => '#61DAFB'],
                    ['name' => 'Next.js',     'color' => '#0070F3'],
                    ['name' => 'Flutter',     'color' => '#54C5F8'],
                    ['name' => 'Tailwind CSS','color' => '#06B6D4'],
                    ['name' => 'Alpine.js',   'color' => '#8BC0D0'],
                    ['name' => 'Vite',        'color' => '#BD34FE'],
                    ['name' => 'Redis',       'color' => '#FF4438'],
                    ['name' => 'Docker',      'color' => '#2496ED'],
                    ['name' => 'PostgreSQL',  'color' => '#4169E1'],
                ];
            @endphp
            <div class="flex flex-wrap justify-center gap-3">
                @foreach($techs as $tech)
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white border border-black/8 text-sm font-medium text-text">
                        <span class="w-2 h-2 rounded-full shrink-0" style="background:{{ $tech['color'] }}"></span>
                        {{ $tech['name'] }}
                    </span>
                @endforeach
            </div>
        </div>

        {{-- CTA --}}
        <div class="bg-text rounded-2xl p-10 sm:p-14 text-center reveal">
            <h2 class="text-white font-bold text-2xl lg:text-3xl mb-3">{{ __('about.cta_heading') }}</h2>
            <p class="text-white/55 mb-8 max-w-md mx-auto">{{ __('about.cta_sub') }}</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('products.index') }}" class="btn-primary px-8 py-3">
                    {{ __('about.cta_products') }}
                </a>
                <a href="{{ route('custom-request') }}" class="btn-ghost-dark px-8 py-3">
                    {{ __('about.cta_custom') }}
                </a>
            </div>
        </div>

    </div>
</div>

@endsection
