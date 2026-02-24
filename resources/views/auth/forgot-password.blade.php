@extends('layouts.app')

@section('breadcrumbs')
    <nav aria-label="Breadcrumb">
        <ol class="flex items-center gap-1.5 text-xs text-white/50">
            <li><a href="{{ route('welcome') }}" class="hover:text-white/80 transition-colors">Home</a></li>
            <li aria-hidden="true">/</li>
            <li class="text-white/70">Recover Account</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="max-w-md mx-auto">
        <div class="rounded-3xl backdrop-blur-md bg-white/20 border border-white/30 shadow-[0_32px_80px_rgba(0,0,0,0.35)] p-6 sm:p-8">
            <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-white mb-2">Recover Your Account</h1>
            <p class="text-sm text-white/80 mb-6">
                Enter the email address associated with your Business ID, and we'll send you a recovery link.
            </p>

            @if (session('status'))
                <div class="rounded-xl backdrop-blur-md bg-white/10 border border-[#83b735]/40 p-4 mb-6">
                    <p class="text-sm text-[#d5ff94]">{{ session('status') }}</p>
                </div>
                <a href="{{ route('login') }}"
                    class="inline-flex items-center justify-center w-full py-3.5 rounded-xl text-sm font-bold tracking-wide text-black bg-[#83b735] hover:bg-[#74a62f] shadow-[0_18px_45px_rgba(131,183,53,0.35)] transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-[#a4d85f] focus-visible:ring-offset-2 focus-visible:ring-offset-transparent">
                    Back to Login
                </a>
            @else
                @if ($errors->any())
                    <div class="mb-4 p-3 rounded-xl bg-red-500/20 border border-red-400/50 text-sm text-red-200">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-white/80 mb-1.5">Registered Email</label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-white/50 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                                class="w-full pl-10 pr-4 py-3 rounded-xl backdrop-blur-md bg-white/10 border border-white/30 text-white placeholder-white/50 font-medium focus:outline-none focus:ring-2 focus:ring-[#83b735]/80 focus:border-[#83b735] transition-colors"
                                placeholder="you@company.com">
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full py-3.5 rounded-xl text-sm sm:text-base font-bold tracking-wide text-black bg-[#83b735] hover:bg-[#74a62f] shadow-[0_18px_45px_rgba(131,183,53,0.5)] transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-transparent focus-visible:ring-[#a4d85f]">
                        Send Recovery Link
                    </button>
                </form>

                <p class="mt-6 text-center text-sm text-white/80">
                    <a href="{{ route('login') }}" class="font-semibold text-[#83b735] hover:text-[#a4d85f] transition-colors">Back to Login</a>
                </p>
            @endif
        </div>
    </div>
@endsection
