{{-- Floating contact widget --}}
<div id="float-widget" x-data="{ show: false }" x-init="setTimeout(() => show = true, 2500)" x-show="show"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0"
    aria-label="Contact options"
>
    {{-- Main toggle --}}
    <button
        @click="$store.ui.openModal(null)"
        class="float-btn float-main"
        aria-label="{{ __('modal.heading') }}"
        title="{{ __('modal.heading') }}"
    >
        <svg width="22" height="22" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
            <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>
        </svg>
    </button>
</div>
