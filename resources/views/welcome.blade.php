@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="grid lg:grid-cols-[minmax(0,1.35fr)_minmax(0,1fr)] gap-10 xl:gap-16 items-center mb-14 lg:mb-20">
        {{-- Hero Text --}}
        <div class="space-y-8">
            <div class="inline-flex items-center px-3 py-1 rounded-full backdrop-blur-md bg-white/20 border border-white/30 text-xs font-semibold uppercase tracking-[0.28em] text-white/80">
                Next-Gen ERP Platform
            </div>

            <div class="space-y-4">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-extrabold tracking-tight leading-tight">
                    <span class="text-white">Scale Your Business with</span>
                    <span class="block text-[#83b735] drop-shadow-[0_18px_45px_rgba(131,183,53,0.45)]">
                        Absolute Control.
                    </span>
                </h1>

                <p class="max-w-xl text-sm sm:text-base md:text-lg text-white/80 leading-relaxed">
                    Agricart is the digital backbone of your trade. Automate your inventory, streamline your sales, and grow your reach with a partner you can trust.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-4">
                <a
                    href="{{ route('register') }}"
                    class="inline-flex items-center justify-center px-7 py-3.5 rounded-full text-sm md:text-base font-semibold tracking-wide text-black bg-[#83b735] hover:bg-[#74a62f] shadow-[0_20px_55px_rgba(131,183,53,0.5)] transition-all duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-transparent focus-visible:ring-[#a4d85f]"
                >
                    Join the Network
                    <svg class="ml-2 h-4 w-4 md:h-5 md:w-5" viewBox="0 0 24 24" fill="none">
                        <path d="M7 17L17 7M9 7H17V15" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>

                <a
                    href="#features"
                    class="inline-flex items-center justify-center px-5 py-3 rounded-full text-xs md:text-sm font-semibold tracking-wide backdrop-blur-md bg-white/20 border border-white/30 hover:bg-white/25 hover:border-white/40 text-white transition-all duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-transparent focus-visible:ring-white/50"
                >
                    Explore Ecosystem
                </a>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 text-[10px] sm:text-xs text-white/70">
                <div class="px-3 py-2.5 rounded-xl backdrop-blur-md bg-white/20 border border-white/25 text-center sm:text-left">
                    99.9% Uptime SLA
                </div>
                <div class="px-3 py-2.5 rounded-xl backdrop-blur-md bg-white/20 border border-white/25 text-center sm:text-left">
                    Bank-Grade Security
                </div>
                <div class="px-3 py-2.5 rounded-xl backdrop-blur-md bg-white/20 border border-white/25 text-center sm:text-left">
                    Multi-language UI (UTF-8)
                </div>
                <div class="px-3 py-2.5 rounded-xl backdrop-blur-md bg-white/20 border border-white/25 text-center sm:text-left">
                    Live in under 24 Hours
                </div>
            </div>
        </div>

        {{-- Hero Visual Card --}}
        <div class="hidden sm:block">
            <div class="relative">
                <div class="absolute -inset-10 blur-3xl bg-gradient-to-tr from-[#83b735]/50 via-emerald-400/25 to-sky-400/40 opacity-75"></div>
                <div class="relative rounded-3xl backdrop-blur-md bg-white/20 border border-white/30 shadow-[0_32px_80px_rgba(0,0,0,0.55)] p-6 sm:p-7 lg:p-8 space-y-5">
                    <div class="flex items-center justify-between">
                        <div class="space-y-1">
                            <p class="text-xs font-medium text-white/70 uppercase tracking-[0.22em]">
                                Today’s Pulse
                            </p>
                            <p class="text-2xl font-semibold">
                                Executive Overview
                            </p>
                        </div>
                        <span class="px-3 py-1.5 rounded-full text-[11px] font-semibold bg-[#83b735]/20 text-[#d5ff94] border border-[#83b735]/60">
                            Live
                        </span>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div class="rounded-2xl backdrop-blur-md bg-white/20 border border-white/25 p-3.5 space-y-1">
                            <p class="text-[11px] font-medium text-white/70 uppercase tracking-[0.18em]">
                                Partner Success Rate
                            </p>
                            <p class="text-lg font-semibold text-[#a4d85f]">
                                98%
                            </p>
                        </div>
                        <div class="rounded-2xl backdrop-blur-md bg-white/20 border border-white/25 p-3.5 space-y-1">
                            <p class="text-[11px] font-medium text-white/70 uppercase tracking-[0.18em]">
                                Operational Efficiency
                            </p>
                            <p class="text-lg font-semibold text-[#a4d85f]">
                                99.2%
                            </p>
                        </div>
                        <div class="rounded-2xl backdrop-blur-md bg-white/20 border border-white/25 p-3.5 space-y-1">
                            <p class="text-[11px] font-medium text-white/70 uppercase tracking-[0.18em]">
                                Growth Index
                            </p>
                            <p class="text-lg font-semibold text-[#a4d85f]">
                                +24% YoY
                            </p>
                        </div>
                        <div class="rounded-2xl backdrop-blur-md bg-white/20 border border-white/25 p-3.5 space-y-1">
                            <p class="text-[11px] font-medium text-white/70 uppercase tracking-[0.18em]">
                                System Integrity
                            </p>
                            <p class="text-lg font-semibold text-[#a4d85f]">
                                99.9%
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Feature Cards Section --}}
    <section id="features" class="space-y-6 lg:space-y-8">
        <div>
            <h2 class="text-xl sm:text-2xl md:text-3xl font-bold tracking-tight text-white">
                Enterprise Solutions for Modern Trade.
            </h2>
            <p class="mt-2 max-w-2xl text-sm sm:text-base text-white/80 leading-relaxed">
                Agricart provides specialized tools designed to help you scale efficiently, secure your transactions, and gain total visibility over your operations.
            </p>
        </div>

        <div
            id="modules"
            class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6"
        >
            {{-- Smart Asset Management --}}
            <article class="fade-in-card group rounded-3xl backdrop-blur-md bg-white/20 border border-white/25 shadow-[0_28px_70px_rgba(0,0,0,0.55)] p-5 sm:p-6 lg:p-7 flex flex-col">
                <div class="flex items-center justify-between gap-3 mb-3 min-h-[2.5rem]">
                    <h3 class="text-lg md:text-xl font-semibold tracking-tight text-white flex-1 min-w-0">
                        Smart Asset Management
                    </h3>
                    <span class="feature-badge inline-flex flex-shrink-0 h-9 w-9 items-center justify-center rounded-2xl bg-[#83b735]/20 border border-[#83b735]/50 text-[#e4ffc0] text-xs font-semibold shadow-[0_0_14px_rgba(131,183,53,0.45)]">
                        SAM
                    </span>
                </div>
                <p class="text-sm font-medium text-[#a4d85f] mb-3">Zero-Waste Inventory Control.</p>
                <p class="text-sm text-white/85 leading-relaxed" style="line-height: 1.7;">
                    Eliminate stock-outs and overstocking. Our intelligent tracking system provides 360° visibility across all locations, ensuring your capital is never tied up in dead stock.
                </p>
            </article>

            {{-- Revenue Acceleration --}}
            <article class="fade-in-card group rounded-3xl backdrop-blur-md bg-white/20 border border-white/25 shadow-[0_28px_70px_rgba(0,0,0,0.55)] p-5 sm:p-6 lg:p-7 flex flex-col">
                <div class="flex items-center justify-between gap-3 mb-3 min-h-[2.5rem]">
                    <h3 class="text-lg md:text-xl font-semibold tracking-tight text-white flex-1 min-w-0">
                        Revenue Acceleration
                    </h3>
                    <span class="feature-badge inline-flex flex-shrink-0 h-9 w-9 items-center justify-center rounded-2xl bg-[#83b735]/20 border border-[#83b735]/50 text-[#e4ffc0] text-xs font-semibold shadow-[0_0_14px_rgba(131,183,53,0.45)]">
                        RA
                    </span>
                </div>
                <p class="text-sm font-medium text-[#a4d85f] mb-3">Optimized Cash Flow & Invoicing.</p>
                <p class="text-sm text-white/85 leading-relaxed" style="line-height: 1.7;">
                    Turn sales into liquid cash instantly. Automate complex billing, manage receivables with ease, and secure your financial future with institutional-grade transaction security.
                </p>
            </article>

            {{-- Decision Intelligence --}}
            <article class="fade-in-card group rounded-3xl backdrop-blur-md bg-white/20 border border-white/25 shadow-[0_28px_70px_rgba(0,0,0,0.55)] p-5 sm:p-6 lg:p-7 flex flex-col">
                <div class="flex items-center justify-between gap-3 mb-3 min-h-[2.5rem]">
                    <h3 class="text-lg md:text-xl font-semibold tracking-tight text-white flex-1 min-w-0">
                        Decision Intelligence
                    </h3>
                    <span class="feature-badge inline-flex flex-shrink-0 h-9 w-9 items-center justify-center rounded-2xl bg-[#83b735]/20 border border-[#83b735]/50 text-[#e4ffc0] text-xs font-semibold shadow-[0_0_14px_rgba(131,183,53,0.45)]">
                        DI
                    </span>
                </div>
                <p class="text-sm font-medium text-[#a4d85f] mb-3">Predictive Analytics for Growth.</p>
                <p class="text-sm text-white/85 leading-relaxed" style="line-height: 1.7;">
                    Don't just track data—conquer the market. Transform raw operational numbers into actionable growth strategies using advanced analytics and predictive trend forecasting.
                </p>
            </article>
        </div>

        {{-- Bottom Banner --}}
        <div
            id="get-started"
            class="mt-6 lg:mt-10 rounded-3xl backdrop-blur-md bg-white/20 border border-white/25 shadow-[0_26px_65px_rgba(0,0,0,0.55)] p-5 sm:p-6 lg:p-7 flex flex-col md:flex-row items-start md:items-center justify-between gap-4"
        >
            <div>
                <p class="text-xl sm:text-2xl font-bold tracking-tight text-white mb-2">
                    The Future of Agri-Business is Digital.
                </p>
                <p class="text-sm sm:text-base text-white/85 max-w-xl">
                    Agricart empowers you to manage your entire operation with precision. Built for scale, security, and your success.
                </p>
            </div>
            <a
                href="{{ route('register') }}"
                class="inline-flex items-center justify-center px-6 py-3 rounded-full text-sm font-semibold tracking-wide text-black bg-[#83b735] hover:bg-[#74a62f] shadow-[0_20px_55px_rgba(131,183,53,0.5),0_0_40px_rgba(131,183,53,0.4)] transition-all"
            >
                Join the Network
            </a>
        </div>
    </section>

    {{-- Fade-in on scroll for feature cards --}}
    <script>
        (function() {
            var cards = document.querySelectorAll('.fade-in-card');
            if (!cards.length) return;
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                    }
                });
            }, { rootMargin: '0px 0px -40px 0px', threshold: 0.1 });
            cards.forEach(function(card) { observer.observe(card); });
        })();
    </script>
@endsection

