@extends('layouts.app')

@section('breadcrumbs')
    <nav aria-label="Breadcrumb">
        <ol class="flex items-center gap-1.5 text-xs text-white/50">
            <li><a href="{{ route('welcome') }}" class="hover:text-white/80 transition-colors">Home</a></li>
            <li aria-hidden="true">/</li>
            <li class="text-white/70">Login</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="max-w-md mx-auto">
        {{-- Registration Success Modal (vendor) --}}
        @if (session('registration_success_vendor'))
            <div id="registration-success-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4" role="dialog" aria-modal="true" aria-labelledby="registration-success-title">
                <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="this.closest('#registration-success-modal').remove()"></div>
                <div class="relative w-full max-w-sm rounded-3xl backdrop-blur-md bg-white/20 border border-white/30 shadow-2xl p-6 sm:p-8">
                    <h2 id="registration-success-title" class="text-xl font-bold tracking-tight text-white mb-4">Registration Successful</h2>
                    <p class="text-sm text-white/80 mb-2">Your account is pending approval. You will be notified once approved.</p>
                    <div class="rounded-xl backdrop-blur-md bg-white/10 border border-white/25 p-4 space-y-1 mb-4">
                        <p class="text-sm font-semibold text-[#a4d85f]">Business ID: {{ session('business_id_placeholder', 'AC-260224-XXXX') }}</p>
                        <p class="text-xs text-white/70">Registered on: {{ session('registered_at', 'February 24, 2026') }}</p>
                    </div>
                    <button type="button" onclick="document.getElementById('registration-success-modal').remove()"
                        class="w-full py-2.5 rounded-xl text-sm font-semibold text-black bg-[#83b735] hover:bg-[#74a62f] transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-[#a4d85f]">
                        Continue to Login
                    </button>
                </div>
            </div>
        @endif

        <div class="rounded-3xl backdrop-blur-md bg-white/20 border border-white/30 shadow-2xl p-6 sm:p-8">
            <h1 class="text-2xl font-bold tracking-tight text-white mb-1">Sign in</h1>
            <p class="text-sm text-white/80 mb-6">Enter your credentials to access the dashboard.</p>

            @if (session('status') && !session('registration_success_vendor'))
                <div class="mb-4 p-3 rounded-xl bg-[#83b735]/20 border border-[#83b735]/50 text-sm text-[#d5ff94]">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 p-3 rounded-xl bg-red-500/20 border border-red-400/50 text-sm text-red-200">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-white/80 mb-1.5">Email</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="w-full px-4 py-3 rounded-xl backdrop-blur-md bg-white/10 border border-white/30 text-white placeholder-white/50 font-medium focus:outline-none focus:ring-2 focus:ring-[#83b735]/80 focus:border-[#83b735]"
                        placeholder="you@example.com"
                    >
                </div>
                <div x-data="{ showPassword: false }">
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-white/80 mb-1.5">Password</label>
                    <div class="relative">
                        <input
                            :type="showPassword ? 'text' : 'password'"
                            name="password"
                            id="password"
                            required
                            class="w-full px-4 pr-11 py-3 rounded-xl backdrop-blur-md bg-white/10 border border-white/30 text-white placeholder-white/50 font-medium focus:outline-none focus:ring-2 focus:ring-[#83b735]/80 focus:border-[#83b735]"
                            placeholder="••••••••"
                        >
                        <button type="button" @click="showPassword = !showPassword" aria-label="Toggle password visibility" class="absolute right-3 top-1/2 -translate-y-1/2 p-1 rounded-lg text-white/50 hover:text-white/80 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/50">
                            <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            <svg x-show="showPassword" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878a4.5 4.5 0 106.262 6.262M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                        </button>
                    </div>
                </div>
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="rounded border-white/30 bg-white/10 text-[#83b735] focus:ring-[#83b735]/80">
                        <label for="remember" class="ml-2 text-sm font-medium text-white/80">Remember me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-sm font-medium text-[#83b735] hover:text-[#a4d85f] transition-colors">Forgot Password?</a>
                </div>
                <button
                    type="submit"
                    class="w-full py-3 rounded-xl text-sm font-bold tracking-wide text-black bg-[#83b735] hover:bg-[#74a62f] shadow-[0_18px_45px_rgba(131,183,53,0.35)] transition-all focus:outline-none focus:ring-2 focus:ring-[#83b735]/80"
                >
                    Sign in
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-white/70">
                Don't have an account?
                <a href="{{ route('register') }}" class="font-semibold text-[#83b735] hover:text-[#a4d85f]">Register</a>
            </p>
        </div>
    </div>
@endsection
