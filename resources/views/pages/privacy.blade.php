@extends('layouts.app')

@section('title', __('privacy.page_title'))

@section('content')
<div class="min-h-screen pt-28 pb-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">

        <div class="mb-10">
            <p class="text-muted text-xs mb-3">{{ __('privacy.last_updated') }}</p>
            <h1 class="text-3xl lg:text-4xl font-bold text-white mb-4">{{ __('privacy.page_heading') }}</h1>
            <p class="text-muted leading-relaxed">{{ __('privacy.intro') }}</p>
        </div>

        <div class="space-y-8 legal-content">

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>{{ __('privacy.s1_heading') }}</h2>
                <p>{{ __('privacy.s1_p1') }}</p>
                <ul>
                    <li><strong>{{ __('privacy.s1_li1_label') }}</strong> {{ __('privacy.s1_li1') }}</li>
                    <li><strong>{{ __('privacy.s1_li2_label') }}</strong> {{ __('privacy.s1_li2') }}</li>
                    <li><strong>{{ __('privacy.s1_li3_label') }}</strong> {{ __('privacy.s1_li3') }}</li>
                </ul>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>{{ __('privacy.s2_heading') }}</h2>
                <p>{{ __('privacy.s2_p1') }}</p>
                <ul>
                    <li>{{ __('privacy.s2_li1') }}</li>
                    <li>{{ __('privacy.s2_li2') }}</li>
                    <li>{{ __('privacy.s2_li3') }}</li>
                    <li>{{ __('privacy.s2_li4') }}</li>
                </ul>
                <p>{{ __('privacy.s2_p2') }}</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>{{ __('privacy.s3_heading') }}</h2>
                <p>{{ __('privacy.s3_p1') }}</p>
                <p>{{ __('privacy.s3_p2') }}</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>{{ __('privacy.s4_heading') }}</h2>
                <p>{{ __('privacy.s4_p1') }}</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>{{ __('privacy.s5_heading') }}</h2>
                <p>{{ __('privacy.s5_p1') }}</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>{{ __('privacy.s6_heading') }}</h2>
                <p>{{ __('privacy.s6_p1') }}</p>
                <ul>
                    <li>{{ __('privacy.s6_li1') }}</li>
                    <li>{{ __('privacy.s6_li2') }}</li>
                    <li>{{ __('privacy.s6_li3') }}</li>
                </ul>
                <p>{{ __('privacy.s6_p2') }} <a href="{{ route('contact') }}">{{ __('privacy.s6_contact_link') }}</a>.</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>{{ __('privacy.s7_heading') }}</h2>
                <p>{{ __('privacy.s7_p1') }}</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>{{ __('privacy.s8_heading') }}</h2>
                <p>
                    {{ __('privacy.s8_p1') }} <a href="{{ route('contact') }}">{{ __('privacy.s8_contact_link') }}</a>@if(!empty($settings['contact_email'])), {{ __('privacy.s8_email_or') }} <a href="mailto:{{ $settings['contact_email'] }}">{{ $settings['contact_email'] }}</a>@endif.
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
