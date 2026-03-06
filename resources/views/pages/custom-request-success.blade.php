@extends('layouts.app')

@section('title', __('custom_request.success_title'))
@section('robots', 'noindex, nofollow')

@section('content')
<div class="min-h-screen pt-28 pb-20 flex items-center">
    <div class="max-w-xl mx-auto px-4 sm:px-6 w-full text-center">

        {{-- Success icon --}}
        <div class="w-20 h-20 rounded-2xl bg-success/10 border border-success/30 flex items-center justify-center mx-auto mb-6">
            <svg width="36" height="36" fill="none" stroke="#10B981" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>

        <h1 class="text-3xl font-bold text-white mb-3">{{ __('custom_request.success_heading') }}</h1>
        <p class="text-muted leading-relaxed mb-8">{{ __('custom_request.success_sub') }}</p>

        {{-- CTA buttons --}}
        <div class="flex flex-col sm:flex-row gap-3 justify-center mb-8">
            @if(!empty($settings['whatsapp_number']))
                <a href="https://wa.me/{{ preg_replace('/\D/', '', $settings['whatsapp_number']) }}"
                   target="_blank" rel="noopener noreferrer"
                   class="btn-wa">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    {{ __('custom_request.success_wa') }}
                </a>
            @endif
            @if(!empty($settings['messenger_url']))
                <a href="{{ $settings['messenger_url'] }}"
                   target="_blank" rel="noopener noreferrer"
                   class="btn-ms">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.373 0 0 4.975 0 11.111c0 3.497 1.745 6.616 4.472 8.652V24l4.086-2.242c1.09.301 2.246.464 3.442.464 6.627 0 12-4.975 12-11.111C24 4.975 18.627 0 12 0zm1.191 14.963l-3.055-3.26-5.963 3.26L10.732 8l3.131 3.259L19.752 8l-6.561 6.963z"/></svg>
                    {{ __('custom_request.success_ms') }}
                </a>
            @endif
        </div>

        <a href="{{ route('home') }}" class="text-muted text-sm hover:text-white transition">
            &larr; {{ __('custom_request.success_back') }}
        </a>

    </div>
</div>
@endsection
