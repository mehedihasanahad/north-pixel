@extends('layouts.app')

@section('title', __('dashboard.title'))
@section('robots', 'noindex, nofollow')

@section('content')
<div class="min-h-screen pt-28 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        {{-- Page header --}}
        <div class="mb-10">
            <p class="text-primary text-xs font-semibold tracking-widest uppercase mb-2">{{ __('dashboard.title') }}</p>
            <h1 class="text-3xl font-bold text-white">{{ __('dashboard.heading') }}, {{ $user->name }}</h1>
            <p class="text-muted mt-1 text-sm">{{ __('dashboard.sub') }}</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Left column: account + quick actions + preview badge --}}
            <div class="space-y-5">

                {{-- Account card --}}
                <div class="bg-surface border border-white/8 rounded-2xl p-6">
                    <h2 class="text-white font-semibold text-sm uppercase tracking-widest mb-5">{{ __('dashboard.account_heading') }}</h2>
                    <dl class="space-y-3 text-sm">
                        <div class="flex justify-between gap-3">
                            <dt class="text-muted shrink-0">{{ __('dashboard.name') }}</dt>
                            <dd class="text-white font-medium text-right truncate">{{ $user->name }}</dd>
                        </div>
                        <div class="flex justify-between gap-3">
                            <dt class="text-muted shrink-0">{{ __('dashboard.email') }}</dt>
                            <dd class="text-white font-medium text-right truncate">{{ $user->email }}</dd>
                        </div>
                        <div class="flex justify-between gap-3">
                            <dt class="text-muted shrink-0">{{ __('dashboard.phone') }}</dt>
                            <dd class="text-white font-medium text-right">{{ $user->phone ?: '—' }}</dd>
                        </div>
                        <div class="flex justify-between gap-3">
                            <dt class="text-muted shrink-0">{{ __('dashboard.member_since') }}</dt>
                            <dd class="text-white font-medium text-right">{{ $user->created_at->format('M Y') }}</dd>
                        </div>
                    </dl>
                    <div class="mt-5 pt-5 border-t border-white/8">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm text-red-400 hover:text-red-300 transition">
                                {{ __('nav.logout') }}
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Preview access badge --}}
                <div class="bg-primary/10 border border-primary/25 rounded-2xl p-5 flex items-start gap-3">
                    <div class="w-9 h-9 rounded-xl bg-primary/20 flex items-center justify-center shrink-0">
                        <svg width="16" height="16" fill="none" stroke="#7C3AED" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-white font-semibold text-sm mb-0.5">{{ __('dashboard.preview_access') }}</p>
                        <p class="text-muted text-xs leading-relaxed">{{ __('dashboard.preview_access_sub') }}</p>
                    </div>
                </div>

                {{-- Quick actions --}}
                <div class="bg-surface border border-white/8 rounded-2xl p-6">
                    <h2 class="text-white font-semibold text-sm uppercase tracking-widest mb-4">{{ __('dashboard.quick_actions') }}</h2>
                    <div class="space-y-3">
                        <a href="{{ route('products.index') }}"
                           class="flex items-center gap-3 p-3 bg-surface-2 rounded-xl border border-white/6 hover:border-primary/40 transition group">
                            <span class="w-9 h-9 rounded-lg bg-primary/10 flex items-center justify-center shrink-0 group-hover:bg-primary/20 transition">
                                <svg width="16" height="16" fill="none" stroke="#7C3AED" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </span>
                            <div class="min-w-0">
                                <p class="text-white text-sm font-medium">{{ __('dashboard.browse_products') }}</p>
                                <p class="text-muted text-xs truncate">{{ __('dashboard.browse_products_sub') }}</p>
                            </div>
                        </a>

                        <a href="{{ route('custom-request') }}"
                           class="flex items-center gap-3 p-3 bg-surface-2 rounded-xl border border-white/6 hover:border-accent/40 transition group">
                            <span class="w-9 h-9 rounded-lg bg-accent/10 flex items-center justify-center shrink-0 group-hover:bg-accent/20 transition">
                                <svg width="16" height="16" fill="none" stroke="#F59E0B" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/>
                                </svg>
                            </span>
                            <div class="min-w-0">
                                <p class="text-white text-sm font-medium">{{ __('dashboard.custom_project') }}</p>
                                <p class="text-muted text-xs truncate">{{ __('dashboard.custom_project_sub') }}</p>
                            </div>
                        </a>

                        <a href="{{ route('contact') }}"
                           class="flex items-center gap-3 p-3 bg-surface-2 rounded-xl border border-white/6 hover:border-white/20 transition group">
                            <span class="w-9 h-9 rounded-lg bg-white/5 flex items-center justify-center shrink-0 group-hover:bg-white/10 transition">
                                <svg width="16" height="16" fill="none" stroke="#A1A1AA" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>
                                </svg>
                            </span>
                            <div class="min-w-0">
                                <p class="text-white text-sm font-medium">{{ __('dashboard.contact_us') }}</p>
                                <p class="text-muted text-xs truncate">{{ __('dashboard.contact_us_sub') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

            {{-- Right column: inquiry history --}}
            <div class="lg:col-span-2">
                <div class="bg-surface border border-white/8 rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-1">
                        <h2 class="text-white font-semibold text-sm uppercase tracking-widest">{{ __('dashboard.inquiries_heading') }}</h2>
                        <span class="text-muted text-xs">{{ $inquiries->count() }}</span>
                    </div>
                    <p class="text-muted text-xs mb-6">{{ __('dashboard.inquiries_sub') }}</p>

                    @if($inquiries->isEmpty())
                        <div class="text-center py-14">
                            <div class="w-14 h-14 rounded-2xl bg-white/5 border border-white/8 flex items-center justify-center mx-auto mb-4">
                                <svg width="24" height="24" fill="none" stroke="#A1A1AA" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <p class="text-white font-medium text-sm mb-1">{{ __('dashboard.inquiries_empty') }}</p>
                            <p class="text-muted text-xs mb-5">{{ __('dashboard.inquiries_empty_sub') }}</p>
                            <a href="{{ route('custom-request') }}" class="btn-primary text-sm px-5 py-2.5">
                                {{ __('dashboard.start_request') }}
                            </a>
                        </div>
                    @else
                        <div class="space-y-3">
                            @foreach($inquiries as $inquiry)
                                @php
                                    $statusColors = [
                                        'new'           => ['bg' => 'rgba(245,158,11,0.15)', 'border' => 'rgba(245,158,11,0.3)', 'text' => '#F59E0B'],
                                        'seen'          => ['bg' => 'rgba(161,161,170,0.1)',  'border' => 'rgba(161,161,170,0.2)', 'text' => '#A1A1AA'],
                                        'in_discussion' => ['bg' => 'rgba(59,130,246,0.15)',  'border' => 'rgba(59,130,246,0.3)',  'text' => '#3B82F6'],
                                        'quoted'        => ['bg' => 'rgba(168,85,247,0.15)',  'border' => 'rgba(168,85,247,0.3)',  'text' => '#A855F7'],
                                        'accepted'      => ['bg' => 'rgba(16,185,129,0.15)',  'border' => 'rgba(16,185,129,0.3)',  'text' => '#10B981'],
                                        'rejected'      => ['bg' => 'rgba(239,68,68,0.15)',   'border' => 'rgba(239,68,68,0.3)',   'text' => '#EF4444'],
                                        'completed'     => ['bg' => 'rgba(16,185,129,0.15)',  'border' => 'rgba(16,185,129,0.3)',  'text' => '#10B981'],
                                    ];
                                    $sc = $statusColors[$inquiry->status] ?? $statusColors['seen'];
                                    $statusLabel = __('dashboard.status_' . $inquiry->status) !== 'dashboard.status_' . $inquiry->status
                                        ? __('dashboard.status_' . $inquiry->status)
                                        : \App\Models\CustomRequest::$statuses[$inquiry->status] ?? $inquiry->status;
                                @endphp
                                <div class="bg-surface-2 border border-white/6 rounded-xl p-4">
                                    <div class="flex items-start justify-between gap-3 mb-2">
                                        <div class="min-w-0">
                                            <p class="text-white font-medium text-sm truncate">
                                                {{ \App\Models\CustomRequest::$projectTypes[$inquiry->project_type] ?? $inquiry->project_type }}
                                            </p>
                                            <p class="text-muted text-xs mt-0.5">
                                                {{ __('dashboard.submitted_on') }}: {{ $inquiry->created_at->format('d M Y') }}
                                            </p>
                                        </div>
                                        <span class="shrink-0 text-xs font-semibold px-2.5 py-1 rounded-lg"
                                              style="background: {{ $sc['bg'] }}; border: 1px solid {{ $sc['border'] }}; color: {{ $sc['text'] }}">
                                            {{ $statusLabel }}
                                        </span>
                                    </div>
                                    <p class="text-muted text-xs leading-relaxed line-clamp-2">
                                        {{ $inquiry->project_description }}
                                    </p>
                                    @if($inquiry->budget)
                                        <div class="mt-2 flex items-center gap-1.5">
                                            <svg width="11" height="11" fill="none" stroke="#A1A1AA" stroke-width="2" viewBox="0 0 24 24">
                                                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
                                            </svg>
                                            <span class="text-muted text-xs">{{ \App\Models\CustomRequest::$budgets[$inquiry->budget] ?? $inquiry->budget }}</span>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
