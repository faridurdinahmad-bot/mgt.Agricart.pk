@extends('layouts.app')

@section('main_container_class')
    w-full max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12
@endsection

@section('content')
    <section class="space-y-6">
        <div class="rounded-2xl backdrop-blur-md bg-white/10 border border-white/20 p-6 sm:p-8">
            <p class="text-xs font-semibold uppercase tracking-widest text-white/50 mb-1">{{ $drumLabel }}</p>
            <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-white">{{ $drumLabel }} &gt; {{ $moduleLabel }}</h1>
            <p class="mt-3 text-sm text-white/60">Placeholder. Connect your content and logic here.</p>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 mt-6 px-4 py-2.5 rounded-xl text-sm font-semibold text-white/90 bg-white/15 border border-white/25 hover:bg-white/20 transition-colors">
                &larr; Back to 3D Dashboard
            </a>
        </div>
    </section>
@endsection
