@extends('layouts.app')

@section('title', __('auth.login_title'))
@section('robots', 'noindex, nofollow')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-24">

    {{-- Background orb --}}
    <div class="pointer-events-none fixed inset-0 overflow-hidden" aria-hidden="true">
        <div class="absolute top-1/3 left-1/2 -translate-x-1/2 -translate-y-1/2 w-150 h-150 rounded-full bg-primary/10 blur-[120px]"></div>
    </div>

    <div class="w-full max-w-md relative">

        {{-- Card --}}
        <div class="bg-surface border border-white/8 rounded-2xl p-8 shadow-2xl">

            {{-- Logo --}}
            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="inline-flex justify-center mb-2">
                    <x-logo size="lg" />
                </a>
                <h1 class="text-2xl font-bold text-white">{{ __('auth.login_heading') }}</h1>
                <p class="text-muted text-sm mt-1">{{ __('auth.login_sub') }}</p>
            </div>

            {{-- Session status --}}
            @if (session('status'))
                <div class="mb-4 p-3 rounded-xl bg-green-500/10 border border-green-500/20 text-green-400 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-muted mb-1.5">{{ __('auth.email') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                        required autofocus autocomplete="username"
                        class="w-full bg-surface-2 border border-white/10 rounded-xl px-4 py-2.5 text-white text-sm placeholder-muted focus:outline-none focus:border-primary/60 focus:ring-1 focus:ring-primary/40 transition"
                        placeholder="you@example.com">
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-sm font-medium text-muted">{{ __('auth.password') }}</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-xs text-primary hover:text-primary/80 transition">
                                {{ __('auth.forgot_password') }}
                            </a>
                        @endif
                    </div>
                    <input id="password" type="password" name="password"
                        required autocomplete="current-password"
                        class="w-full bg-surface-2 border border-white/10 rounded-xl px-4 py-2.5 text-white text-sm placeholder-muted focus:outline-none focus:border-primary/60 focus:ring-1 focus:ring-primary/40 transition"
                        placeholder="••••••••">
                    @error('password')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember me --}}
                <div class="flex items-center gap-2">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="w-4 h-4 rounded border-white/20 bg-surface-2 text-primary focus:ring-primary/40">
                    <label for="remember_me" class="text-sm text-muted">{{ __('auth.remember_me') }}</label>
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn-primary w-full justify-center py-2.5">
                    {{ __('auth.login_btn') }}
                </button>
            </form>

            {{-- Register link --}}
            <p class="text-center text-sm text-muted mt-6">
                {{ __('auth.no_account') }}
                <a href="{{ route('register') }}" class="text-primary hover:text-primary/80 font-medium transition">
                    {{ __('auth.register_link') }}
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
