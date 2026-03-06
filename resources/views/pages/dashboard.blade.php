@extends('layouts.app')

@section('title', __('dashboard.title'))

@section('content')
<div class="max-w-7xl mx-auto px-6 py-32">

    {{-- Heading --}}
    <div class="mb-10">
        <p class="text-primary text-sm font-semibold tracking-widest uppercase mb-2">{{ __('dashboard.title') }}</p>
        <h1 class="text-3xl font-bold text-white">{{ __('dashboard.heading') }}, {{ $user->name }} 👋</h1>
        <p class="text-muted mt-1">{{ __('dashboard.sub') }}</p>
    </div>

    {{-- Account info card --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-surface border border-white/8 rounded-2xl p-6 col-span-1">
            <h2 class="text-white font-semibold mb-4">Account</h2>
            <dl class="space-y-3 text-sm">
                <div class="flex justify-between">
                    <dt class="text-muted">Name</dt>
                    <dd class="text-white font-medium">{{ $user->name }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-muted">Email</dt>
                    <dd class="text-white font-medium">{{ $user->email }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-muted">Phone</dt>
                    <dd class="text-white font-medium">{{ $user->phone ?: '—' }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-muted">Member since</dt>
                    <dd class="text-white font-medium">{{ $user->created_at->format('M Y') }}</dd>
                </div>
            </dl>

            <div class="mt-6 pt-5 border-t border-white/8">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-red-400 hover:text-red-300 transition">
                        {{ __('nav.logout') }}
                    </button>
                </form>
            </div>
        </div>

        {{-- Quick links --}}
        <div class="bg-surface border border-white/8 rounded-2xl p-6 col-span-2">
            <h2 class="text-white font-semibold mb-4">Quick Actions</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <a href="/products" class="flex items-center gap-3 p-4 bg-surface-2 rounded-xl border border-white/6 hover:border-primary/40 transition group">
                    <span class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary/20 transition">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    </span>
                    <div>
                        <p class="text-white text-sm font-medium">Browse Products</p>
                        <p class="text-muted text-xs">Explore all ready-made apps</p>
                    </div>
                </a>

                <a href="/custom-request" class="flex items-center gap-3 p-4 bg-surface-2 rounded-xl border border-white/6 hover:border-accent/40 transition group">
                    <span class="w-10 h-10 rounded-lg bg-accent/10 flex items-center justify-center text-accent group-hover:bg-accent/20 transition">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                    </span>
                    <div>
                        <p class="text-white text-sm font-medium">Custom Project</p>
                        <p class="text-muted text-xs">Request a custom build</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
