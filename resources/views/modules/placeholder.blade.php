@extends('layouts.app')

@section('content')
    <section class="space-y-6">
        <div class="rounded-3xl backdrop-blur-md bg-white/20 border border-white/30 p-6 sm:p-8">
            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-white/70 mb-1">{{ $module }}</p>
            <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-[#83b735]">{{ $title }}</h1>
            <p class="mt-3 text-sm text-white/80">This is a placeholder. Connect your real content and logic here.</p>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center mt-4 px-4 py-2 rounded-full text-sm font-semibold text-black bg-[#83b735] hover:bg-[#74a62f] transition-colors">
                ← Back to Dashboard
            </a>
        </div>
    </section>
@endsection
