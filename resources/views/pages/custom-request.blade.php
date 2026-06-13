@extends('layouts.app')

@section('title', __('custom_request.page_title'))
@section('description', __('custom_request.page_sub'))

@section('content')

{{-- Page Hero --}}
<section class="bg-surface border-b border-black/6 pt-[70px]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-10 sm:py-14 text-center reveal">
        <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">{{ __('custom_request.section_label') }}</p>
        <h1 class="text-3xl lg:text-5xl font-extrabold text-text mb-4">{{ __('custom_request.page_heading') }}</h1>
        <p class="text-muted max-w-2xl mx-auto text-base leading-relaxed">{{ __('custom_request.page_sub') }}</p>
    </div>
</section>

<div class="bg-white pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 items-start">

            {{-- Form --}}
            <div class="lg:col-span-2">
                <div class="bg-white border border-black/6 rounded-2xl p-7 sm:p-10 shadow-sm">
                    <form method="POST" action="{{ route('custom-request.store') }}"
                          x-data="{ submitting: false }" @submit="submitting = true">
                        @csrf

                        {{-- Name + Email --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
                            <div>
                                <label class="block text-text text-sm font-medium mb-1.5">
                                    {{ __('custom_request.name') }} <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    placeholder="{{ __('custom_request.name_placeholder') }}"
                                    class="cr-input @error('name') cr-input-error @enderror">
                                @error('name')
                                    <p class="cr-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-text text-sm font-medium mb-1.5">
                                    {{ __('custom_request.email') }} <span class="text-danger">*</span>
                                </label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    placeholder="{{ __('custom_request.email_placeholder') }}"
                                    class="cr-input @error('email') cr-input-error @enderror">
                                @error('email')
                                    <p class="cr-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Phone + Project type --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
                            <div>
                                <label class="block text-text text-sm font-medium mb-1.5">
                                    {{ __('custom_request.phone') }} <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="phone" value="{{ old('phone') }}"
                                    placeholder="{{ __('custom_request.phone_placeholder') }}"
                                    class="cr-input @error('phone') cr-input-error @enderror">
                                @error('phone')
                                    <p class="cr-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-text text-sm font-medium mb-1.5">
                                    {{ __('custom_request.project_type') }} <span class="text-danger">*</span>
                                </label>
                                <div class="relative">
                                    <select name="project_type"
                                        class="cr-input pr-9 appearance-none @error('project_type') cr-input-error @enderror">
                                        <option value="">{{ __('custom_request.project_type_placeholder') }}</option>
                                        @foreach(\App\Models\CustomRequest::$projectTypes as $value => $label)
                                            <option value="{{ $value }}" {{ old('project_type') === $value ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                                        <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" class="text-muted"><path d="M6 9l6 6 6-6"/></svg>
                                    </div>
                                </div>
                                @error('project_type')
                                    <p class="cr-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Project description --}}
                        <div class="mb-5">
                            <label class="block text-text text-sm font-medium mb-1.5">
                                {{ __('custom_request.description') }} <span class="text-danger">*</span>
                            </label>
                            <textarea name="project_description" rows="5"
                                placeholder="{{ __('custom_request.description_placeholder') }}"
                                class="cr-input resize-none @error('project_description') cr-input-error @enderror">{{ old('project_description') }}</textarea>
                            @error('project_description')
                                <p class="cr-error">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Deadline --}}
                        <div class="mb-5">
                            <label class="block text-text text-sm font-medium mb-1.5">
                                {{ __('custom_request.deadline') }}
                            </label>
                            <input type="text" name="deadline" value="{{ old('deadline') }}"
                                placeholder="{{ __('custom_request.deadline_placeholder') }}"
                                class="cr-input">
                        </div>

                        {{-- Preferred contact --}}
                        <div class="mb-5">
                            <label class="block text-text text-sm font-medium mb-3">
                                {{ __('custom_request.preferred_contact') }} <span class="text-danger">*</span>
                            </label>
                            <div class="flex flex-wrap gap-3">
                                @php
                                    $contacts = [
                                        'whatsapp'  => __('custom_request.contact_whatsapp'),
                                        'messenger' => __('custom_request.contact_messenger'),
                                        'email'     => __('custom_request.contact_email'),
                                    ];
                                @endphp
                                @foreach($contacts as $val => $label)
                                    <label class="flex items-center gap-2.5 px-4 py-2.5 rounded-xl border cursor-pointer transition select-none
                                        {{ old('preferred_contact', 'whatsapp') === $val
                                            ? 'border-primary/40 bg-primary/8 text-primary'
                                            : 'border-black/10 text-muted hover:border-black/20 hover:text-text' }}">
                                        <input type="radio" name="preferred_contact" value="{{ $val }}"
                                            {{ old('preferred_contact', 'whatsapp') === $val ? 'checked' : '' }}
                                            class="accent-primary">
                                        <span class="text-sm font-medium">{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('preferred_contact')
                                <p class="cr-error mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Reference links --}}
                        <div class="mb-5">
                            <label class="block text-text text-sm font-medium mb-1">
                                {{ __('custom_request.reference_links') }}
                            </label>
                            <p class="text-muted text-xs mb-2">{{ __('custom_request.reference_links_sub') }}</p>
                            <div class="space-y-2">
                                @for($i = 0; $i < 3; $i++)
                                    <input type="url" name="reference_links[]" value="{{ old('reference_links.'.$i) }}"
                                        placeholder="{{ __('custom_request.reference_placeholder') }}"
                                        class="cr-input @error('reference_links.'.$i) cr-input-error @enderror">
                                    @error('reference_links.'.$i)
                                        <p class="cr-error">{{ $message }}</p>
                                    @enderror
                                @endfor
                            </div>
                        </div>

                        {{-- Additional message --}}
                        <div class="mb-8">
                            <label class="block text-text text-sm font-medium mb-1.5">
                                {{ __('custom_request.message') }}
                            </label>
                            <textarea name="message" rows="3"
                                placeholder="{{ __('custom_request.message_placeholder') }}"
                                class="cr-input resize-none">{{ old('message') }}</textarea>
                        </div>

                        {{-- Submit --}}
                        <button type="submit" :disabled="submitting"
                            class="btn-primary w-full justify-center py-3.5 text-base"
                            :class="submitting ? 'opacity-60 cursor-not-allowed' : ''">
                            <svg x-show="submitting" class="animate-spin w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/>
                            </svg>
                            <span x-text="submitting ? '{{ addslashes(__('custom_request.submitting')) }}' : '{{ addslashes(__('custom_request.submit')) }}'">
                                {{ __('custom_request.submit') }}
                            </span>
                        </button>
                    </form>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-5">

                {{-- Why us --}}
                <div class="bg-white border border-black/6 rounded-2xl p-6 shadow-sm">
                    <h3 class="text-text font-bold text-base mb-5">{{ __('custom_request.why_heading') }}</h3>
                    <ul class="space-y-5">
                        @php
                            $reasons = [
                                [
                                    'color' => '#EF1B3F',
                                    'icon'  => 'M13 10V3L4 14h7v7l9-11h-7z',
                                    'title' => __('custom_request.why_1_title'),
                                    'desc'  => __('custom_request.why_1_desc'),
                                ],
                                [
                                    'color' => '#3B82F6',
                                    'icon'  => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z',
                                    'title' => __('custom_request.why_2_title'),
                                    'desc'  => __('custom_request.why_2_desc'),
                                ],
                                [
                                    'color' => '#059669',
                                    'icon'  => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                                    'title' => __('custom_request.why_3_title'),
                                    'desc'  => __('custom_request.why_3_desc'),
                                ],
                                [
                                    'color' => '#F59E0B',
                                    'icon'  => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z',
                                    'title' => __('custom_request.why_4_title'),
                                    'desc'  => __('custom_request.why_4_desc'),
                                ],
                            ];
                        @endphp
                        @foreach($reasons as $i => $item)
                            <li class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg flex items-center justify-center shrink-0 mt-0.5"
                                     style="background:{{ $item['color'] }}0D;border:1px solid {{ $item['color'] }}22">
                                    <svg width="14" height="14" fill="none" stroke="{{ $item['color'] }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <path d="{{ $item['icon'] }}"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-text font-semibold text-sm mb-0.5">{{ $item['title'] }}</p>
                                    <p class="text-muted text-xs leading-relaxed">{{ $item['desc'] }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Quick contact --}}
                <div class="bg-white border border-black/6 rounded-2xl p-6 shadow-sm space-y-3">
                    <p class="text-muted text-xs uppercase tracking-widest font-semibold">Quick Contact</p>
                    @if(!empty($settings['whatsapp_number']))
                        <a href="https://wa.me/{{ preg_replace('/\D/', '', $settings['whatsapp_number']) }}"
                           target="_blank" rel="noopener noreferrer"
                           class="btn-wa text-sm py-2.5">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            WhatsApp
                        </a>
                    @endif
                    @if(!empty($settings['messenger_url']))
                        <a href="{{ $settings['messenger_url'] }}"
                           target="_blank" rel="noopener noreferrer"
                           class="btn-ms text-sm py-2.5">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.373 0 0 4.975 0 11.111c0 3.497 1.745 6.616 4.472 8.652V24l4.086-2.242c1.09.301 2.246.464 3.442.464 6.627 0 12-4.975 12-11.111C24 4.975 18.627 0 12 0zm1.191 14.963l-3.055-3.26-5.963 3.26L10.732 8l3.131 3.259L19.752 8l-6.561 6.963z"/></svg>
                            Messenger
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
    background: #F8F8FA;
    border: 1px solid rgba(0,0,0,0.10);
    border-radius: 0.75rem;
    padding: 0.625rem 0.875rem;
    color: #0D0D14;
    font-size: 0.875rem;
    transition: border-color 0.2s, box-shadow 0.2s;
    outline: none;
}
.cr-input:focus {
    border-color: rgba(239,27,63,0.50);
    box-shadow: 0 0 0 3px rgba(239,27,63,0.08);
}
.cr-input::placeholder { color: rgba(107,107,122,0.55); }
.cr-input-error { border-color: rgba(239,68,68,0.50) !important; }
.cr-error { margin-top: 0.375rem; font-size: 0.78rem; color: #EF4444; }
</style>
@endpush
