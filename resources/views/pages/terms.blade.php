@extends('layouts.app')

@section('title', __('terms.page_title'))

@section('content')
<div class="min-h-screen pt-28 pb-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">

        <div class="mb-10">
            <p class="text-muted text-xs mb-3">{{ __('terms.last_updated') }}</p>
            <h1 class="text-3xl lg:text-4xl font-bold text-white mb-4">{{ __('terms.page_heading') }}</h1>
            <p class="text-muted leading-relaxed">{{ __('terms.intro') }}</p>
        </div>

        <div class="space-y-8 legal-content">

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>{{ __('terms.s1_heading') }}</h2>
                <p>{{ __('terms.s1_p1') }}</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>{{ __('terms.s2_heading') }}</h2>
                <p>{{ __('terms.s2_p1') }}</p>
                <ul>
                    <li>{{ __('terms.s2_li1') }}</li>
                    <li>{{ __('terms.s2_li2') }}</li>
                    <li>{{ __('terms.s2_li3') }}</li>
                </ul>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>{{ __('terms.s3_heading') }}</h2>
                <p>{{ __('terms.s3_p1') }}</p>
                <p>{{ __('terms.s3_p2') }}</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>{{ __('terms.s4_heading') }}</h2>
                <p>{{ __('terms.s4_p1') }}</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>{{ __('terms.s5_heading') }}</h2>
                <p>{{ __('terms.s5_p1') }}</p>
                <ul>
                    <li>{{ __('terms.s5_li1') }}</li>
                    <li>{{ __('terms.s5_li2') }}</li>
                    <li>{{ __('terms.s5_li3') }}</li>
                </ul>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>{{ __('terms.s6_heading') }}</h2>
                <p>{{ __('terms.s6_p1') }}</p>
                <p>{{ __('terms.s6_p2') }}</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>{{ __('terms.s7_heading') }}</h2>
                <p>{{ __('terms.s7_p1') }}</p>
                <ul>
                    <li>{{ __('terms.s7_li1') }}</li>
                    <li>{{ __('terms.s7_li2') }}</li>
                </ul>
                <p>{{ __('terms.s7_p2') }}</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>{{ __('terms.s8_heading') }}</h2>
                <p>{{ __('terms.s8_p1') }}</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>{{ __('terms.s9_heading') }}</h2>
                <p>{{ __('terms.s9_p1') }}</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>{{ __('terms.s10_heading') }}</h2>
                <p>
                    {{ __('terms.s10_p1') }} <a href="{{ route('contact') }}">{{ __('terms.s10_contact_link') }}</a>@if(!empty($settings['contact_email'])), {{ __('terms.s10_email_or') }} <a href="mailto:{{ $settings['contact_email'] }}">{{ $settings['contact_email'] }}</a>@endif.
                </p>
            </div>

        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.legal-content h2 {
    font-size: 1.05rem;
    font-weight: 700;
    color: #F4F4F5;
    margin-bottom: 0.875rem;
}
.legal-content p {
    color: #A1A1AA;
    font-size: 0.9rem;
    line-height: 1.75;
    margin-bottom: 0.75rem;
}
.legal-content ul {
    color: #A1A1AA;
    font-size: 0.9rem;
    line-height: 1.75;
    padding-left: 1.25rem;
    margin-bottom: 0.75rem;
    list-style: disc;
}
.legal-content li { margin-bottom: 0.25rem; }
.legal-content strong { color: #F4F4F5; }
.legal-content a { color: #7C3AED; text-decoration: underline; text-underline-offset: 3px; }
.legal-content a:hover { color: #A855F7; }
</style>
@endpush
