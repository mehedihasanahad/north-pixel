{{--
    Logo component — SVG text mark, no image required.
    Props:
      $size  — 'sm' | 'md' | 'lg'  (default: 'md')
      $class — extra CSS classes
--}}
@props(['size' => 'md', 'class' => ''])

@php
    $scales = ['sm' => 'h-7', 'md' => 'h-9', 'lg' => 'h-12'];
    $h = $scales[$size] ?? $scales['md'];
@endphp

<span class="inline-flex items-center gap-2 select-none {{ $class }}" aria-label="{{ config('app.name') }}">

    {{-- Icon mark: geometric north-star / pixel diamond --}}
    <svg class="{{ $h }} w-auto" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <defs>
            <linearGradient id="np-icon-grad" x1="0" y1="0" x2="40" y2="40" gradientUnits="userSpaceOnUse">
                <stop offset="0%"   stop-color="#7C3AED"/>
                <stop offset="55%"  stop-color="#A855F7"/>
                <stop offset="100%" stop-color="#F59E0B"/>
            </linearGradient>
        </defs>
        {{-- Outer diamond --}}
        <polygon points="20,2 38,20 20,38 2,20" fill="url(#np-icon-grad)" opacity="0.18"/>
        {{-- Inner pixel cross / north star arms --}}
        <polygon points="20,2 38,20 20,38 2,20" fill="none" stroke="url(#np-icon-grad)" stroke-width="1.5"/>
        {{-- N-shape / compass needle --}}
        <line x1="20" y1="6"  x2="20" y2="34" stroke="url(#np-icon-grad)" stroke-width="2" stroke-linecap="round"/>
        <line x1="6"  y1="20" x2="34" y2="20" stroke="url(#np-icon-grad)" stroke-width="2" stroke-linecap="round"/>
        {{-- Center pixel dot --}}
        <rect x="16" y="16" width="8" height="8" rx="1.5" fill="url(#np-icon-grad)"/>
        {{-- Small corner accents --}}
        <circle cx="20" cy="6"  r="1.8" fill="#F59E0B"/>
        <circle cx="20" cy="34" r="1.2" fill="#7C3AED"/>
        <circle cx="6"  cy="20" r="1.2" fill="#7C3AED"/>
        <circle cx="34" cy="20" r="1.2" fill="#A855F7"/>
    </svg>

    {{-- Wordmark --}}
    <span class="flex flex-col leading-none font-black tracking-tight">
        <span class="text-white" style="
            font-size: {{ $size === 'sm' ? '0.85rem' : ($size === 'lg' ? '1.25rem' : '1rem') }};
            letter-spacing: 0.08em;
        ">NORTH</span>
        <span style="
            font-size: {{ $size === 'sm' ? '0.7rem' : ($size === 'lg' ? '1.05rem' : '0.82rem') }};
            letter-spacing: 0.22em;
            background: linear-gradient(135deg, #7C3AED, #A855F7, #F59E0B);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        ">PIXEL</span>
    </span>

</span>
