<header class="relative z-50 h-11 flex items-center justify-between px-4 sm:px-6 lg:px-8 border-b border-white/20 backdrop-blur-md bg-black/35">
    <div class="flex items-center gap-2">
        <span class="inline-flex h-5 w-5 items-center justify-center rounded-lg bg-white/10 border border-white/25 text-[10px] text-[#83b735] shadow-[0_0_12px_rgba(131,183,53,0.5)]">
            {{
                strtoupper(substr(($title ?? 'PAGE')[0] ?? 'P', 0, 1))
            }}
        </span>
        <p class="text-[11px] sm:text-xs font-semibold uppercase tracking-[0.25em] text-white/75">
            {{ $title ?? 'PAGE' }}
        </p>
    </div>

    <div class="flex items-center gap-2 sm:gap-3">
        <a
            href="{{ route('dashboard') }}"
            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[11px] font-semibold tracking-wide text-black bg-[#83b735] hover:bg-[#74a62f] shadow-[0_18px_45px_rgba(131,183,53,0.35)] transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-transparent focus-visible:ring-[#a4d85f]"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span class="hidden sm:inline">Back to Dashboard</span>
            <span class="sm:hidden">Back</span>
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                type="submit"
                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[11px] font-semibold tracking-wide text-white/90 backdrop-blur-md bg-white/15 border border-white/30 hover:bg-white/25 hover:border-[#83b735]/70 hover:text-[#83b735] transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-transparent focus-visible:ring-white/60"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l3.75 3.75L12 16.5M15.75 12.75H9" />
                </svg>
                <span>Logout</span>
            </button>
        </form>
    </div>
</header>

