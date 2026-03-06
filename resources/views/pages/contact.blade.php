@extends('layouts.app')

@section('title', __('contact.page_title'))

@section('content')
<div class="min-h-screen pt-28 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        {{-- Page header --}}
        <div class="mb-12 text-center">
            <span class="section-label">{{ __('contact.section_label') }}</span>
            <h1 class="text-3xl lg:text-5xl font-bold text-white mb-4">{{ __('contact.page_heading') }}</h1>
            <p class="text-muted max-w-xl mx-auto text-base leading-relaxed">{{ __('contact.page_sub') }}</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 items-start">

            {{-- Contact form --}}
            <div class="lg:col-span-2">
                <div class="bg-surface border border-white/8 rounded-2xl p-7 sm:p-10">

                    {{-- Success message --}}
                    @if(session('success'))
                        <div class="mb-6 p-5 rounded-xl border border-success/30 bg-success/10 flex items-start gap-3">
                            <svg class="shrink-0 mt-0.5" width="18" height="18" fill="none" stroke="#10B981" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div>
                                <p class="text-white font-semibold text-sm">{{ __('contact.success_heading') }}</p>
                                <p class="text-muted text-sm mt-0.5">{{ __('contact.success_sub') }}</p>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}"
                          x-data="{ submitting: false }" @submit="submitting = true">
                        @csrf

                        {{-- Name + Email --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
                            <div>
                                <label class="block text-white text-sm font-medium mb-1.5">
                                    {{ __('contact.name') }} <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    placeholder="{{ __('contact.name_placeholder') }}"
                                    class="cr-input @error('name') cr-input-error @enderror">
                                @error('name')
                                    <p class="cr-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-white text-sm font-medium mb-1.5">
                                    {{ __('contact.email') }} <span class="text-danger">*</span>
                                </label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    placeholder="{{ __('contact.email_placeholder') }}"
                                    class="cr-input @error('email') cr-input-error @enderror">
                                @error('email')
                                    <p class="cr-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Phone + Subject --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
                            <div>
                                <label class="block text-white text-sm font-medium mb-1.5">
                                    {{ __('contact.phone') }}
                                </label>
                                <input type="text" name="phone" value="{{ old('phone') }}"
                                    placeholder="{{ __('contact.phone_placeholder') }}"
                                    class="cr-input">
                            </div>
                            <div>
                                <label class="block text-white text-sm font-medium mb-1.5">
                                    {{ __('contact.subject') }} <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="subject" value="{{ old('subject') }}"
                                    placeholder="{{ __('contact.subject_placeholder') }}"
                                    class="cr-input @error('subject') cr-input-error @enderror">
                                @error('subject')
                                    <p class="cr-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Message --}}
                        <div class="mb-8">
                            <label class="block text-white text-sm font-medium mb-1.5">
                                {{ __('contact.message') }} <span class="text-danger">*</span>
                            </label>
                            <textarea name="message" rows="6"
                                placeholder="{{ __('contact.message_placeholder') }}"
                                class="cr-input resize-none @error('message') cr-input-error @enderror">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="cr-error">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <button type="submit" :disabled="submitting"
                            class="btn-primary w-full justify-center py-3.5 text-base"
                            :class="submitting ? 'opacity-60 cursor-not-allowed' : ''">
                            <svg x-show="submitting" class="animate-spin w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/>
                            </svg>
                            <span x-text="submitting ? '{{ addslashes(__('contact.submitting')) }}' : '{{ addslashes(__('contact.submit')) }}'">
                                {{ __('contact.submit') }}
                            </span>
                        </button>
                    </form>
                </div>
            </div>

            {{-- Sidebar: contact info --}}
            <div class="space-y-5">

                {{-- Direct channels --}}
                <div class="bg-surface border border-white/8 rounded-2xl p-6">
                    <h3 class="text-white font-bold text-sm uppercase tracking-widest mb-5">{{ __('contact.info_heading') }}</h3>
                    <div class="space-y-4">

                        @if(!empty($settings['contact_email']))
                            <div class="flex items-start gap-3">
                                <div class="w-9 h-9 rounded-xl bg-primary/10 border border-primary/20 flex items-center justify-center shrink-0">
                                    <svg width="15" height="15" fill="none" stroke="#7C3AED" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-muted text-xs mb-0.5">{{ __('contact.email_label') }}</p>
                                    <a href="mailto:{{ $settings['contact_email'] }}"
                                       class="text-white text-sm font-medium hover:text-primary transition truncate block">
                                        {{ $settings['contact_email'] }}
                                    </a>
                                </div>
                            </div>
                        @endif

                        @if(!empty($settings['whatsapp_number']))
                            <div class="flex items-start gap-3">
                                <div class="w-9 h-9 rounded-xl bg-success/10 border border-success/20 flex items-center justify-center shrink-0">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="#10B981"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-muted text-xs mb-0.5">{{ __('contact.whatsapp_label') }}</p>
                                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $settings['whatsapp_number']) }}"
                                       target="_blank" rel="noopener noreferrer"
                                       class="text-white text-sm font-medium hover:text-primary transition">
                                        {{ $settings['whatsapp_number'] }}
                                    </a>
                                </div>
                            </div>
                        @endif

                        @if(!empty($settings['messenger_url']))
                            <div class="flex items-start gap-3">
                                <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0"
                                     style="background:rgba(0,120,255,0.1);border:1px solid rgba(0,120,255,0.2)">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="#0078FF"><path d="M12 0C5.373 0 0 4.975 0 11.111c0 3.497 1.745 6.616 4.472 8.652V24l4.086-2.242c1.09.301 2.246.464 3.442.464 6.627 0 12-4.975 12-11.111C24 4.975 18.627 0 12 0zm1.191 14.963l-3.055-3.26-5.963 3.26L10.732 8l3.131 3.259L19.752 8l-6.561 6.963z"/></svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-muted text-xs mb-0.5">{{ __('contact.messenger_label') }}</p>
                                    <a href="{{ $settings['messenger_url'] }}"
                                       target="_blank" rel="noopener noreferrer"
                                       class="text-white text-sm font-medium hover:text-primary transition">
                                        Messenger
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Social links --}}
                @if(!empty($settings['facebook_url']) || !empty($settings['twitter_url']) || !empty($settings['linkedin_url']) || !empty($settings['instagram_url']))
                    <div class="bg-surface border border-white/8 rounded-2xl p-6">
                        <h3 class="text-white font-bold text-sm uppercase tracking-widest mb-4">{{ __('contact.follow_heading') }}</h3>
                        <div class="flex flex-wrap gap-3">
                            @if(!empty($settings['facebook_url']))
                                <a href="{{ $settings['facebook_url'] }}" target="_blank" rel="noopener noreferrer"
                                   class="w-10 h-10 rounded-xl bg-white/5 border border-white/8 flex items-center justify-center hover:bg-primary/10 hover:border-primary/30 transition">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="text-muted"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                                </a>
                            @endif
                            @if(!empty($settings['twitter_url']))
                                <a href="{{ $settings['twitter_url'] }}" target="_blank" rel="noopener noreferrer"
                                   class="w-10 h-10 rounded-xl bg-white/5 border border-white/8 flex items-center justify-center hover:bg-primary/10 hover:border-primary/30 transition">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="text-muted"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>
                                </a>
                            @endif
                            @if(!empty($settings['linkedin_url']))
                                <a href="{{ $settings['linkedin_url'] }}" target="_blank" rel="noopener noreferrer"
                                   class="w-10 h-10 rounded-xl bg-white/5 border border-white/8 flex items-center justify-center hover:bg-primary/10 hover:border-primary/30 transition">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="text-muted"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                                </a>
                            @endif
                            @if(!empty($settings['instagram_url']))
                                <a href="{{ $settings['instagram_url'] }}" target="_blank" rel="noopener noreferrer"
                                   class="w-10 h-10 rounded-xl bg-white/5 border border-white/8 flex items-center justify-center hover:bg-primary/10 hover:border-primary/30 transition">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-muted"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                                </a>
                            @endif
                        </div>
                    </div>
                @endif

                {{-- Quick action buttons --}}
                <div class="space-y-3">
                    @if(!empty($settings['whatsapp_number']))
                        <a href="https://wa.me/{{ preg_replace('/\D/', '', $settings['whatsapp_number']) }}"
                           target="_blank" rel="noopener noreferrer"
                           class="btn-wa text-sm py-2.5">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            {{ __('contact.whatsapp_label') }}
                        </a>
                    @endif
                    @if(!empty($settings['messenger_url']))
                        <a href="{{ $settings['messenger_url'] }}"
                           target="_blank" rel="noopener noreferrer"
                           class="btn-ms text-sm py-2.5">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.373 0 0 4.975 0 11.111c0 3.497 1.745 6.616 4.472 8.652V24l4.086-2.242c1.09.301 2.246.464 3.442.464 6.627 0 12-4.975 12-11.111C24 4.975 18.627 0 12 0zm1.191 14.963l-3.055-3.26-5.963 3.26L10.732 8l3.131 3.259L19.752 8l-6.561 6.963z"/></svg>
                            {{ __('contact.messenger_label') }}
                        </a>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.cr-input {
    display: block;
    width: 100%;
    background: #09090B;
    border: 1px solid rgba(255,255,255,0.10);
    border-radius: 0.75rem;
    padding: 0.625rem 0.875rem;
    color: #F4F4F5;
    font-size: 0.875rem;
    transition: border-color 0.2s, box-shadow 0.2s;
    outline: none;
}
.cr-input:focus {
    border-color: rgba(124,58,237,0.6);
    box-shadow: 0 0 0 3px rgba(124,58,237,0.12);
}
.cr-input::placeholder { color: rgba(161,161,170,0.5); }
.cr-input-error { border-color: rgba(239,68,68,0.5) !important; }
.cr-error { margin-top: 0.375rem; font-size: 0.78rem; color: #EF4444; }
</style>
@endpush
