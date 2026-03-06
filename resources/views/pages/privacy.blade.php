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
                <h2>1. Information We Collect</h2>
                <p>We collect information you provide directly to us, including:</p>
                <ul>
                    <li><strong>Account information:</strong> Name, email address, and phone number when you register.</li>
                    <li><strong>Contact &amp; inquiry data:</strong> Messages you send via our contact form or custom project request form.</li>
                    <li><strong>Usage data:</strong> Pages visited, browser type, and IP address collected automatically via server logs.</li>
                </ul>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>2. How We Use Your Information</h2>
                <p>We use the information we collect to:</p>
                <ul>
                    <li>Provide, operate, and improve our services and products.</li>
                    <li>Respond to your inquiries, custom project requests, and support questions.</li>
                    <li>Send you transactional messages related to your account or orders.</li>
                    <li>Authenticate your identity and grant access to live product previews.</li>
                </ul>
                <p>We do <strong>not</strong> sell your personal data to third parties.</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>3. Data Storage &amp; Security</h2>
                <p>Your data is stored on secured VPS servers located within trusted data centers. We use industry-standard encryption (HTTPS/TLS) for all data in transit. Passwords are hashed using bcrypt and are never stored in plain text.</p>
                <p>While we take reasonable measures to protect your information, no method of transmission over the internet is 100% secure.</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>4. Cookies</h2>
                <p>We use session cookies to maintain your login state and language preference. No third-party advertising or tracking cookies are used on this website. You can disable cookies in your browser settings, though this may affect site functionality.</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>5. Third-Party Services</h2>
                <p>Our website may include links to or integrations with third-party services such as WhatsApp and Facebook Messenger for order inquiries. Use of those services is governed by their respective privacy policies. We are not responsible for their data practices.</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>6. Your Rights</h2>
                <p>You have the right to:</p>
                <ul>
                    <li>Access the personal data we hold about you.</li>
                    <li>Request correction or deletion of your data.</li>
                    <li>Withdraw consent at any time by deleting your account or contacting us.</li>
                </ul>
                <p>To exercise these rights, contact us at <a href="{{ route('contact') }}">our contact page</a>.</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>7. Changes to This Policy</h2>
                <p>We may update this Privacy Policy from time to time. Changes will be posted on this page with an updated revision date. Continued use of our services after changes constitutes acceptance of the new policy.</p>
            </div>

            <div class="bg-surface border border-white/8 rounded-2xl p-7">
                <h2>8. Contact Us</h2>
                <p>If you have any questions about this Privacy Policy, please reach out via our <a href="{{ route('contact') }}">contact page</a>
                @if(!empty($settings['contact_email']))
                    or email us at <a href="mailto:{{ $settings['contact_email'] }}">{{ $settings['contact_email'] }}</a>
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
