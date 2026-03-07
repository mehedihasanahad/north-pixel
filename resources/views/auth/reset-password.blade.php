@extends('layouts.app')

@section('title', __('auth.reset_title'))

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-24">

    <div class="pointer-events-none fixed inset-0 overflow-hidden" aria-hidden="true">
        <div class="absolute top-1/3 left-1/2 -translate-x-1/2 -translate-y-1/2 w-150 h-150 rounded-full bg-primary/10 blur-[120px]"></div>
    </div>

    <div class="w-full max-w-md relative">
        <div class="bg-surface border border-white/8 rounded-2xl p-8 shadow-2xl">

            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="inline-flex justify-center mb-2">
                    <x-logo size="lg" />
                </a>
                <h1 class="text-2xl font-bold text-white">{{ __('auth.reset_heading') }}</h1>
                <p class="text-muted text-sm mt-1">{{ __('auth.reset_sub') }}</p>
            </div>

            <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <label for="email" class="block text-sm font-medium text-muted mb-1.5">{{ __('auth.email') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}"
                        required autofocus autocomplete="username"
                        class="w-full bg-surface-2 border border-white/10 rounded-xl px-4 py-2.5 text-white text-sm placeholder-muted focus:outline-none focus:border-primary/60 focus:ring-1 focus:ring-primary/40 transition">
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-muted mb-1.5">{{ __('auth.new_password') }}</label>
                    <input id="password" type="password" name="password"
                        required autocomplete="new-password"
                        class="w-full bg-surface-2 border border-white/10 rounded-xl px-4 py-2.5 text-white text-sm placeholder-muted focus:outline-none focus:border-primary/60 focus:ring-1 focus:ring-primary/40 transition"
                        placeholder="••••••••">
                    @error('password')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-muted mb-1.5">{{ __('auth.confirm_password') }}</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        required autocomplete="new-password"
                        class="w-full bg-surface-2 border border-white/10 rounded-xl px-4 py-2.5 text-white text-sm placeholder-muted focus:outline-none focus:border-primary/60 focus:ring-1 focus:ring-primary/40 transition"
                        placeholder="••••••••">
                    @error('password_confirmation')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn-primary w-full justify-center py-2.5">
                    {{ __('auth.reset_btn') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
