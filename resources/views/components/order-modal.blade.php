{{-- Order modal — bottom sheet (self-contained, reads credentials from $settings) --}}
@php
    $waNumber   = preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '');
    $msUrl      = $settings['messenger_url'] ?? '#';
    $orderMsg   = addslashes(__('modal.order_msg'));
    $prebookMsg = addslashes(__('modal.prebook_msg'));
@endphp

<div id="order-modal"
    x-data="{
        get waHref() {
            const p = $store.ui.modalProduct;
            const base = '{{ $waNumber }}';
            if (!base) return '#';
            const prefix = (p && p.isPrebook) ? '{{ $prebookMsg }}' : '{{ $orderMsg }}';
            const title  = (p && p.title) ? p.title : '';
            return 'https://wa.me/' + base + '?text=' + encodeURIComponent(prefix + title);
        }
    }"
    :class="$store.ui.modalOpen ? 'open' : ''"
    @keydown.escape.window="$store.ui.closeModal()"
    role="dialog"
    aria-modal="true"
    aria-labelledby="modal-title"
>
    {{-- Backdrop --}}
    <div class="absolute inset-0" @click="$store.ui.closeModal()" aria-hidden="true"></div>

    {{-- Sheet --}}
    <div id="order-modal-inner" @click.stop>
        {{-- Handle --}}
        <div class="w-10 h-1 rounded-full bg-white/10 mx-auto mb-6"></div>

        {{-- Close --}}
        <button @click="$store.ui.closeModal()"
            class="absolute top-5 right-5 p-2 rounded-lg text-muted hover:text-white hover:bg-white/5 transition"
            aria-label="{{ __('common.close') }}"
        >
            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 6L6 18M6 6l12 12"/></svg>
        </button>

        {{-- Product name --}}
        <template x-if="$store.ui.modalProduct">
            <div class="mb-5 p-4 rounded-xl bg-white/4 border border-white/7">
                <p class="text-xs text-muted mb-1"
                   x-text="$store.ui.modalProduct.isPrebook ? '{{ __('modal.heading_prebook') }}' : '{{ __('modal.heading') }}'"></p>
                <p class="font-semibold text-sm text-white" x-text="$store.ui.modalProduct.title"></p>
            </div>
        </template>

        <h2 id="modal-title" class="text-xl font-bold text-white mb-1"
            x-text="$store.ui.modalProduct?.isPrebook ? '{{ __('modal.heading_prebook') }}' : '{{ __('modal.heading') }}'">
        </h2>
        <p class="text-muted text-sm mb-6"
           x-text="$store.ui.modalProduct?.isPrebook ? '{{ __('modal.sub_prebook') }}' : '{{ __('modal.sub') }}'">
        </p>

        <div class="space-y-3">
            {{-- WhatsApp --}}
            <a :href="waHref"
               target="_blank" rel="noopener noreferrer" class="btn-wa">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                {{ __('modal.whatsapp') }}
            </a>

            {{-- Messenger --}}
            <a href="{{ $msUrl }}" target="_blank" rel="noopener noreferrer" class="btn-ms">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 0C5.374 0 0 4.975 0 11.111c0 3.497 1.745 6.616 4.472 8.652V24l4.086-2.242c1.09.301 2.246.464 3.442.464 6.626 0 12-4.974 12-11.111C24 4.975 18.626 0 12 0zm1.191 14.963l-3.055-3.26-5.963 3.26L10.732 8l3.131 3.26L19.752 8l-6.561 6.963z"/>
                </svg>
                {{ __('modal.messenger') }}
            </a>
        </div>
    </div>
</div>
