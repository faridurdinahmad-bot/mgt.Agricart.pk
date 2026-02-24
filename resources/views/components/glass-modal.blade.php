@props(['id' => 'module-modal'])

<div id="{{ $id }}"
     class="module-modal fixed inset-0 z-50 flex items-center justify-center p-4 opacity-0 pointer-events-none transition-opacity duration-300"
     aria-hidden="true"
     role="dialog"
     aria-modal="true">
    {{-- Backdrop --}}
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" data-modal-close></div>

    {{-- Glass panel --}}
    <div class="module-modal-panel relative w-full max-w-md rounded-3xl backdrop-blur-md bg-white/20 border border-white/30 shadow-2xl p-6 transform transition-transform duration-300 scale-95">
        <div class="flex items-center justify-between gap-4 mb-5">
            <h2 id="{{ $id }}-title" class="text-lg sm:text-xl font-bold tracking-tight text-white truncate"></h2>
            <button type="button"
                    data-modal-close
                    class="shrink-0 rounded-xl p-2 backdrop-blur-md bg-white/20 border border-white/30 hover:bg-white/30 hover:text-[#83b735] transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-[#83b735]/80"
                    aria-label="Close">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div id="{{ $id }}-links" class="space-y-2"></div>
    </div>
</div>
