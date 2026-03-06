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
                <h2>1. Acceptance of Terms</h2>
                <p>By accessing or using our website, you agree to be bound by these Terms of Service and our Privacy Policy. If you do not agree to these terms, please do not use our services.</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>2. Products &amp; Services</h2>
                <p>We offer ready-made web application products and custom development services. All product details, pricing, and features are displayed on the respective product pages.</p>
                <ul>
                    <li>Products are sold as-is with the features described at the time of purchase.</li>
                    <li>Custom project scopes are defined in separate written agreements before work begins.</li>
                    <li>Live previews are available to registered users for evaluation purposes only and do not constitute ownership.</li>
                </ul>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>3. Orders &amp; Payment</h2>
                <p>Orders are currently placed via WhatsApp or Facebook Messenger. A formal agreement or invoice will be issued before any payment is made. We reserve the right to refuse or cancel any order at our discretion.</p>
                <p>Pricing is displayed in BDT (Bangladeshi Taka). USD pricing where shown is for reference only and subject to exchange rate fluctuation.</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>4. User Accounts</h2>
                <p>You must provide accurate information when creating an account. You are responsible for maintaining the confidentiality of your login credentials. We reserve the right to terminate accounts that violate these terms or engage in fraudulent activity.</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>5. Intellectual Property</h2>
                <p>Upon full payment, you receive a license to use the purchased product for your business. You may not:</p>
                <ul>
                    <li>Resell, redistribute, or sublicense our products to third parties.</li>
                    <li>Remove or alter copyright or attribution notices within the product code.</li>
                    <li>Use our branding, logo, or trade name without written permission.</li>
                </ul>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>6. Limitation of Liability</h2>
                <p>Our products are provided "as is" without warranty of any kind. We are not liable for any indirect, incidental, or consequential damages arising from the use of our products or services, including but not limited to loss of revenue or data.</p>
                <p>Our total liability in any matter arising from these terms shall not exceed the amount paid by you for the relevant product or service.</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>7. Refund Policy</h2>
                <p>Due to the digital nature of our products, all sales are generally final. Refunds may be considered on a case-by-case basis if:</p>
                <ul>
                    <li>A product has critical defects that cannot be resolved within a reasonable timeframe.</li>
                    <li>A request is made within 7 days of purchase and the product has not been deployed.</li>
                </ul>
                <p>Custom project payments are non-refundable once work has commenced unless agreed otherwise in writing.</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>8. Changes to Terms</h2>
                <p>We reserve the right to modify these Terms of Service at any time. Changes will be effective immediately upon posting. Your continued use of our services constitutes acceptance of the revised terms.</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>9. Governing Law</h2>
                <p>These terms are governed by the laws of Bangladesh. Any disputes shall be resolved in the courts of Bangladesh.</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>10. Contact Us</h2>
                <p>For questions about these Terms of Service, please contact us via our <a href="{{ route('contact') }}">contact page</a>
                @if(!empty($settings['contact_email']))
                    or email <a href="mailto:{{ $settings['contact_email'] }}">{{ $settings['contact_email'] }}</a>
                @endif
                .</p>
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
