@extends('layouts.app')

@section('title', __('auth.login_title'))
@section('robots', 'noindex, nofollow')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-24 bg-surface">

    <div class="w-full max-w-md">

        {{-- Card --}}
        <div class="bg-white border border-black/6 rounded-2xl p-8 shadow-sm">

            {{-- Logo --}}
            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="inline-flex justify-center mb-2">
                    <x-logo size="lg" />
                </a>
                <h1 class="text-2xl font-bold text-text">{{ __('auth.login_heading') }}</h1>
                <p class="text-muted text-sm mt-1">{{ __('auth.login_sub') }}</p>
            </div>

            @if (session('status'))
                <div class="mb-4 p-3 rounded-xl bg-green-50 border border-green-200 text-green-700 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-muted mb-1.5">{{ __('auth.email') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                        required autofocus autocomplete="username"
                        class="w-full bg-surface border border-black/10 rounded-xl px-4 py-2.5 text-text text-sm placeholder-subtle focus:outline-none focus:border-primary/50 focus:ring-1 focus:ring-primary/20 transition"
                        placeholder="you@example.com">
                    @error('email')
                        <p class="mt-1.5 text-xs text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-sm font-medium text-muted">{{ __('auth.password') }}</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-xs text-primary hover:opacity-80 transition">
                                {{ __('auth.forgot_password') }}
                            </a>
                        @endif
                    </div>
                    <input id="password" type="password" name="password"
                        required autocomplete="current-password"
                        class="w-full bg-surface border border-black/10 rounded-xl px-4 py-2.5 text-text text-sm placeholder-subtle focus:outline-none focus:border-primary/50 focus:ring-1 focus:ring-primary/20 transition"
                        placeholder="••••••••">
                    @error('password')
                        <p class="mt-1.5 text-xs text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-2">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="w-4 h-4 rounded border-black/20 text-primary focus:ring-primary/30">
                    <label for="remember_me" class="text-sm text-muted">{{ __('auth.remember_me') }}</label>
                </div>

                <button type="submit" class="btn-primary w-full justify-center py-2.5">
                    {{ __('auth.login_btn') }}
                </button>
            </form>

            <div class="flex items-center gap-3 my-5">
                <div class="flex-1 h-px bg-black/8"></div>
                <span class="text-muted text-xs">{{ __('auth.or') }}</span>
                <div class="flex-1 h-px bg-black/8"></div>
            </div>

            <a href="{{ route('auth.google') }}"
               class="flex items-center justify-center gap-3 w-full px-4 py-2.5 rounded-xl border border-black/10 bg-surface hover:bg-surface-2 text-text text-sm font-medium transition-all duration-200">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                </svg>
                {{ __('auth.google_signin') }}
            </a>

            <p class="text-center text-sm text-muted mt-6">
                {{ __('auth.no_account') }}
                <a href="{{ route('register') }}" class="text-primary hover:opacity-80 font-medium transition">
                    {{ __('auth.register_link') }}
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
