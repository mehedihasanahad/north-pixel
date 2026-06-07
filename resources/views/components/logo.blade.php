@props(['size' => 'md', 'class' => ''])

@php
    $scales = ['sm' => 'h-7', 'md' => 'h-9', 'lg' => 'h-12'];
    $h = $scales[$size] ?? $scales['md'];
@endphp

<img
    src="{{ asset('assets/images/north-pixel-logo.jpg') }}"
    alt="{{ config('app.name') }}"
    class="{{ $h }} w-auto object-contain select-none rounded-full {{ $class }}"
>
