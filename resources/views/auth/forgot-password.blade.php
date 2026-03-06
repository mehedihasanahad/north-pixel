@extends('layouts.app')

@section('title', __('auth.forgot_title'))
@section('robots', 'noindex, nofollow')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-24">

    <div class="pointer-events-none fixed inset-0 overflow-hidden" aria-hidden="true">
        <div class="absolute top-1/3 left-1/2 -translate-x-1/2 -translate-y-1/2 w-150 h-150 rounded-full bg-primary/10 blur-[120px]"></div>
    </div>

    <div class="w-full max-w-md relative">
        <div class="bg-surface border border-white/8 rounded-2xl p-8 shadow-2xl">

            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="inline-block">
                    <img src="{{ asset('assets/images/logo.jpeg') }}" alt="{{ config('app.name') }}" class="h-12 w-auto rounded-xl mx-auto mb-4">
                </a>
                <h1 class="text-2xl font-bold text-white">{{ __('auth.forgot_heading') }}</h1>
                <p class="text-muted text-sm mt-1">{{ __('auth.forgot_sub') }}</p>
            </div>

            @if (session('status'))
                <div class="mb-4 p-3 rounded-xl bg-green-500/10 border border-green-500/20 text-green-400 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-muted mb-1.5">{{ __('auth.email') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                        required autofocus
                        class="w-full bg-surface-2 border border-white/10 rounded-xl px-4 py-2.5 text-white text-sm placeholder-muted focus:outline-none focus:border-primary/60 focus:ring-1 focus:ring-primary/40 transition"
                        placeholder="you@example.com">
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn-primary w-full justify-center py-2.5">
                    {{ __('auth.send_reset_link') }}
                </button>
            </form>

            <p class="text-center text-sm text-muted mt-6">
                <a href="{{ route('login') }}" class="text-primary hover:text-primary/80 font-medium transition">
                    &larr; {{ __('auth.back_to_login') }}
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
