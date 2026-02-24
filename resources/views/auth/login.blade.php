@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto">
        <div class="rounded-3xl backdrop-blur-md bg-white/20 border border-white/30 shadow-2xl p-6 sm:p-8">
            <h1 class="text-2xl font-bold tracking-tight text-white mb-1">Sign in</h1>
            <p class="text-sm text-white/80 mb-6">Enter your credentials to access the dashboard.</p>

            @if (session('status'))
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
                <div>
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-white/80 mb-1.5">Password</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        required
                        class="w-full px-4 py-3 rounded-xl backdrop-blur-md bg-white/10 border border-white/30 text-white placeholder-white/50 font-medium focus:outline-none focus:ring-2 focus:ring-[#83b735]/80 focus:border-[#83b735]"
                        placeholder="••••••••"
                    >
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="rounded border-white/30 bg-white/10 text-[#83b735] focus:ring-[#83b735]/80">
                    <label for="remember" class="ml-2 text-sm font-medium text-white/80">Remember me</label>
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
