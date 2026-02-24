@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto space-y-8">
        @if (!$type)
            {{-- Dual choice: Staff or Vendor --}}
            <div class="text-center mb-8">
                <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-white mb-2">Create an account</h1>
                <p class="text-sm text-white/80">Choose how you want to register.</p>
            </div>
            <div class="grid sm:grid-cols-2 gap-4">
                <a
                    href="{{ route('register', ['type' => 'staff']) }}"
                    class="group flex flex-col items-center gap-4 p-6 sm:p-8 rounded-3xl backdrop-blur-md bg-white/20 border border-white/30 hover:bg-white/25 hover:border-[#83b735]/50 transition-all"
                >
                    <span class="flex items-center justify-center w-14 h-14 rounded-2xl backdrop-blur-md bg-white/15 border border-white/25 group-hover:bg-[#83b735]/20 group-hover:border-[#83b735]/50 text-white group-hover:text-[#83b735] transition-all">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </span>
                    <span class="text-lg font-bold tracking-tight text-white group-hover:text-[#83b735]">Register as Staff</span>
                    <span class="text-sm text-white/80 text-center">Employee or team member access.</span>
                </a>
                <a
                    href="{{ route('register', ['type' => 'vendor']) }}"
                    class="group flex flex-col items-center gap-4 p-6 sm:p-8 rounded-3xl backdrop-blur-md bg-white/20 border border-white/30 hover:bg-white/25 hover:border-[#83b735]/50 transition-all"
                >
                    <span class="flex items-center justify-center w-14 h-14 rounded-2xl backdrop-blur-md bg-white/15 border border-white/25 group-hover:bg-[#83b735]/20 group-hover:border-[#83b735]/50 text-white group-hover:text-[#83b735] transition-all">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </span>
                    <span class="text-lg font-bold tracking-tight text-white group-hover:text-[#83b735]">Register as Vendor</span>
                    <span class="text-sm text-white/80 text-center">Supplier or partner access.</span>
                </a>
            </div>
        @else
            {{-- Registration form (Staff or Vendor) --}}
            <div class="rounded-3xl backdrop-blur-md bg-white/20 border border-white/30 shadow-2xl p-6 sm:p-8">
                <div class="flex items-center gap-3 mb-6">
                    <a href="{{ route('register') }}" class="text-white/80 hover:text-[#83b735] transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </a>
                    <h1 class="text-2xl font-bold tracking-tight text-white">
                        Register as {{ $type === 'vendor' ? 'Vendor' : 'Staff' }}
                    </h1>
                </div>

                @if ($errors->any())
                    <div class="mb-4 p-3 rounded-xl bg-red-500/20 border border-red-400/50 text-sm text-red-200">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf
                    <input type="hidden" name="role" value="{{ $type }}">
                    <div>
                        <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-white/80 mb-1.5">Full name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            class="w-full px-4 py-3 rounded-xl backdrop-blur-md bg-white/10 border border-white/30 text-white placeholder-white/50 font-medium focus:outline-none focus:ring-2 focus:ring-[#83b735]/80 focus:border-[#83b735]"
                            placeholder="Your name">
                    </div>
                    <div>
                        <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-white/80 mb-1.5">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-3 rounded-xl backdrop-blur-md bg-white/10 border border-white/30 text-white placeholder-white/50 font-medium focus:outline-none focus:ring-2 focus:ring-[#83b735]/80 focus:border-[#83b735]"
                            placeholder="you@example.com">
                    </div>
                    @if ($type === 'vendor')
                        <div>
                            <label for="company_name" class="block text-xs font-semibold uppercase tracking-wider text-white/80 mb-1.5">Company name</label>
                            <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}" required
                                class="w-full px-4 py-3 rounded-xl backdrop-blur-md bg-white/10 border border-white/30 text-white placeholder-white/50 font-medium focus:outline-none focus:ring-2 focus:ring-[#83b735]/80 focus:border-[#83b735]"
                                placeholder="Your company">
                        </div>
                    @else
                        <div>
                            <label for="department" class="block text-xs font-semibold uppercase tracking-wider text-white/80 mb-1.5">Department (optional)</label>
                            <input type="text" name="department" id="department" value="{{ old('department') }}"
                                class="w-full px-4 py-3 rounded-xl backdrop-blur-md bg-white/10 border border-white/30 text-white placeholder-white/50 font-medium focus:outline-none focus:ring-2 focus:ring-[#83b735]/80 focus:border-[#83b735]"
                                placeholder="e.g. Sales, IT">
                        </div>
                    @endif
                    <div>
                        <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-white/80 mb-1.5">Password</label>
                        <input type="password" name="password" id="password" required
                            class="w-full px-4 py-3 rounded-xl backdrop-blur-md bg-white/10 border border-white/30 text-white placeholder-white/50 font-medium focus:outline-none focus:ring-2 focus:ring-[#83b735]/80 focus:border-[#83b735]"
                            placeholder="••••••••">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-white/80 mb-1.5">Confirm password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                            class="w-full px-4 py-3 rounded-xl backdrop-blur-md bg-white/10 border border-white/30 text-white placeholder-white/50 font-medium focus:outline-none focus:ring-2 focus:ring-[#83b735]/80 focus:border-[#83b735]"
                            placeholder="••••••••">
                    </div>
                    <button type="submit"
                        class="w-full py-3 rounded-xl text-sm font-bold tracking-wide text-black bg-[#83b735] hover:bg-[#74a62f] shadow-[0_18px_45px_rgba(131,183,53,0.35)] transition-all focus:outline-none focus:ring-2 focus:ring-[#83b735]/80">
                        Submit application
                    </button>
                </form>
            </div>
        @endif

        {{-- Check Application Status --}}
        <div class="rounded-3xl backdrop-blur-md bg-white/20 border border-white/30 p-6 sm:p-8">
            <h2 class="text-lg font-bold tracking-tight text-white mb-2">Check Application Status</h2>
            <p class="text-sm text-white/80 mb-4">Enter your email to see if your account is Pending, Approved, or Rejected.</p>

            @if (session('status_result'))
                <div class="mb-4 p-4 rounded-xl backdrop-blur-md bg-white/10 border border-white/25">
                    <p class="text-sm text-white/80">Email: <span class="font-semibold text-white">{{ session('status_result')['email'] }}</span></p>
                    <p class="text-sm mt-1">Status: <span class="font-bold {{ session('status_result')['status'] === 'Approved' ? 'text-[#83b735]' : (session('status_result')['status'] === 'Rejected' ? 'text-red-400' : 'text-amber-300') }}">{{ session('status_result')['status'] }}</span></p>
                </div>
            @endif

            @if (session('status_result') && $errors->isEmpty())
                {{-- Show form again to allow another check --}}
            @endif

            <form method="POST" action="{{ route('register.check-status') }}" class="flex flex-col sm:flex-row gap-3">
                @csrf
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="Enter your email"
                    class="flex-1 px-4 py-3 rounded-xl backdrop-blur-md bg-white/10 border border-white/30 text-white placeholder-white/50 font-medium focus:outline-none focus:ring-2 focus:ring-[#83b735]/80 focus:border-[#83b735]">
                <button type="submit"
                    class="px-5 py-3 rounded-xl text-sm font-bold tracking-wide text-black bg-[#83b735] hover:bg-[#74a62f] transition-all whitespace-nowrap">
                    Check status
                </button>
            </form>
            @error('email')
                <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
            @enderror
        </div>
    </div>
@endsection
