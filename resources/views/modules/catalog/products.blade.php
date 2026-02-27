@extends('layouts.app')

@section('main_container_class')
    w-full max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12
@endsection

@section('content')
    <div class="space-y-6">
        <header class="flex items-center justify-between gap-4 border-b border-white/15 pb-4">
            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-white/50 mb-1">PRODUCT CATALOG</p>
                <h1 class="text-xl md:text-2xl font-semibold tracking-tight text-white">Product Catalog &gt; Product List</h1>
                <p class="mt-1 text-sm text-white/60">
                    Master list of SKUs with sync status for Daraz, WooCommerce, and other channels.
                </p>
            </div>
            <a
                href="{{ route('catalog.master') }}"
                class="inline-flex items-center gap-2 px-3 py-2 rounded-lg text-xs font-semibold text-white/90 bg-white/10 border border-white/25 hover:bg-white/15 hover:border-white/40 transition-colors whitespace-nowrap"
            >
                <span>Back to Catalog Master</span>
            </a>
        </header>

        <div
            class="rounded-2xl border border-white/20 p-4 sm:p-6"
            style="
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                background:
                    radial-gradient(circle at top left, rgba(255,255,255,0.12) 0, transparent 45%),
                    rgba(30,41,59,0.52);
                box-shadow: 0 6px 28px rgba(0,0,0,0.35), inset 0 1px 0 rgba(255,255,255,0.06);
            "
        >
            <p class="text-sm text-white/70 text-center">
                Product list table will appear here (SKU, name, brand, sync status, and more).
            </p>
        </div>
    </div>
@endsection

