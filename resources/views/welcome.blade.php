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
                    <span class="text-white">Agricart:</span>
                    <span class="block text-[#83b735] drop-shadow-[0_18px_45px_rgba(131,183,53,0.45)]">
                        Your Digital Business Partner.
                    </span>
                </h1>

                <p class="max-w-xl text-sm sm:text-base md:text-lg text-white/80 leading-relaxed">
                    <span dir="rtl" class="block mb-2">آئیے ایگری کارڈ کے ساتھ اپنے بزنس کو بڑھائیں۔</span>
                    Join us to simplify your business operations, manage your stocks digitally, and grow your reach with a partner you can trust. Let's build the future of trade together.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-4">
                <a
                    href="{{ route('register') }}"
                    class="inline-flex items-center justify-center px-7 py-3.5 rounded-full text-sm md:text-base font-semibold tracking-wide text-black bg-[#83b735] hover:bg-[#74a62f] shadow-[0_20px_55px_rgba(131,183,53,0.5)] transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-transparent focus-visible:ring-[#a4d85f]"
                >
                    Join as a Partner
                    <svg class="ml-2 h-4 w-4 md:h-5 md:w-5" viewBox="0 0 24 24" fill="none">
                        <path d="M7 17L17 7M9 7H17V15" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>

                <a
                    href="#how-it-works"
                    class="inline-flex items-center justify-center px-5 py-3 rounded-full text-xs md:text-sm font-medium tracking-wide backdrop-blur-md bg-white/20 border border-white/30 hover:bg-white/30 transition-all"
                >
                    How it Works
                </a>
            </div>

            <div class="grid grid-cols-2 sm:flex sm:flex-wrap gap-3 text-[10px] sm:text-xs text-white/70">
                <div class="px-3 py-2 rounded-xl backdrop-blur-md bg-white/20 border border-white/25">
                    99.9% Uptime SLA
                </div>
                <div class="px-3 py-2 rounded-xl backdrop-blur-md bg-white/20 border border-white/25">
                    Bank-Grade Security
                </div>
                <div class="px-3 py-2 rounded-xl backdrop-blur-md bg-white/20 border border-white/25">
                    Multi-language UI (UTF-8)
                </div>
                <div class="px-3 py-2 rounded-xl backdrop-blur-md bg-white/20 border border-white/25">
                    Onboarding in under 14 days
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
                                Partner Network
                            </p>
                            <p class="text-lg font-semibold text-[#a4d85f]">
                                500+ Businesses
                            </p>
                        </div>
                        <div class="rounded-2xl backdrop-blur-md bg-white/20 border border-white/25 p-3.5 space-y-1">
                            <p class="text-[11px] font-medium text-white/70 uppercase tracking-[0.18em]">
                                Market Reach
                            </p>
                            <p class="text-lg font-semibold text-[#a4d85f]">
                                Across Pakistan
                            </p>
                        </div>
                        <div class="rounded-2xl backdrop-blur-md bg-white/20 border border-white/25 p-3.5 space-y-1">
                            <p class="text-[11px] font-medium text-white/70 uppercase tracking-[0.18em]">
                                Support
                            </p>
                            <p class="text-lg font-semibold text-[#a4d85f]">
                                24/7 Dedicated
                            </p>
                        </div>
                        <div class="rounded-2xl backdrop-blur-md bg-white/20 border border-white/25 p-3.5 space-y-1">
                            <p class="text-[11px] font-medium text-white/70 uppercase tracking-[0.18em]">
                                Business Growth
                            </p>
                            <p class="text-lg font-semibold text-[#a4d85f]">
                                Guaranteed
                            </p>
                        </div>
                    </div>

                    <div class="rounded-2xl backdrop-blur-md bg-white/10 border border-white/20 p-3.5 flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-medium text-white/70 uppercase tracking-[0.18em] mb-1">
                                Multi-language Ready
                            </p>
                            <p class="text-xs text-white/85">
                                اردو • العربية • English • Français
                            </p>
                        </div>
                        <div class="flex -space-x-1.5">
                            <span class="h-7 w-7 rounded-full bg-white/20 border border-white/50 flex items-center justify-center text-[11px]">
                                ع
                            </span>
                            <span class="h-7 w-7 rounded-full bg-white/20 border border-white/50 flex items-center justify-center text-[11px]">
                                उ
                            </span>
                            <span class="h-7 w-7 rounded-full bg-white/20 border border-white/50 flex items-center justify-center text-[11px]">
                                文
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Feature Cards Section --}}
    <section id="features" class="space-y-6 lg:space-y-8">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="text-xl sm:text-2xl md:text-3xl font-bold tracking-tight">
                    Command your entire operation from one glass dashboard.
                </h2>
                <p class="mt-2 max-w-2xl text-sm sm:text-base text-white/80">
                    Modular ERP blocks for Inventory, Sales, CRM, Finance, and HR — designed to feel
                    like a single, ultra-responsive application on any device.
                </p>
            </div>
            <a
                href="#modules"
                class="hidden md:inline-flex items-center text-xs font-semibold tracking-wide text-[#83b735] hover:text-[#a4d85f] transition-colors"
            >
                Explore all modules
                <svg class="ml-1.5 h-4 w-4" viewBox="0 0 24 24" fill="none">
                    <path d="M7 17L17 7M9 7H17V15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>

        <div
            id="modules"
            class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6 xl:gap-7"
        >
            {{-- Inventory --}}
            <article class="group rounded-3xl backdrop-blur-md bg-white/20 border border-white/25 shadow-[0_28px_70px_rgba(0,0,0,0.55)] p-5 sm:p-6 lg:p-7 flex flex-col">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg md:text-xl font-semibold tracking-tight">
                        Inventory Control
                    </h3>
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-[#83b735]/20 border border-[#83b735]/50 text-[#e4ffc0] text-sm">
                        INV
                    </span>
                </div>
                <p class="text-sm text-white/80 mb-4">
                    Real-time stock visibility across warehouses, automatic reordering, and barcode-ready workflows
                    that keep your operations lean.
                </p>
                <ul class="mt-auto space-y-1.5 text-xs text-white/80">
                    <li class="flex items-center">
                        <span class="h-1.5 w-1.5 rounded-full bg-[#83b735] mr-2"></span>
                        Multi-warehouse & batch tracking
                    </li>
                    <li class="flex items-center">
                        <span class="h-1.5 w-1.5 rounded-full bg-[#83b735] mr-2"></span>
                        Low-stock alerts & smart replenishment
                    </li>
                    <li class="flex items-center">
                        <span class="h-1.5 w-1.5 rounded-full bg-[#83b735] mr-2"></span>
                        Full audit trail & valuation reports
                    </li>
                </ul>
            </article>

            {{-- Sales --}}
            <article class="group rounded-3xl backdrop-blur-md bg-white/20 border border-white/25 shadow-[0_28px_70px_rgba(0,0,0,0.55)] p-5 sm:p-6 lg:p-7 flex flex-col">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg md:text-xl font-semibold tracking-tight">
                        Sales & Finance
                    </h3>
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-[#83b735]/20 border border-[#83b735]/50 text-[#e4ffc0] text-sm">
                        S&F
                    </span>
                </div>
                <p class="text-sm text-white/80 mb-4">
                    From quotations to cashflow, every sale flows into clean financials with real-time dashboards
                    your CFO will love.
                </p>
                <ul class="mt-auto space-y-1.5 text-xs text-white/80">
                    <li class="flex items-center">
                        <span class="h-1.5 w-1.5 rounded-full bg-[#83b735] mr-2"></span>
                        Quotes, invoices & recurring billing
                    </li>
                    <li class="flex items-center">
                        <span class="h-1.5 w-1.5 rounded-full bg-[#83b735] mr-2"></span>
                        Tax engines & multi-currency support
                    </li>
                    <li class="flex items-center">
                        <span class="h-1.5 w-1.5 rounded-full bg-[#83b735] mr-2"></span>
                        Profitability by product, region, channel
                    </li>
                </ul>
            </article>

            {{-- CRM --}}
            <article class="group rounded-3xl backdrop-blur-md bg-white/20 border border-white/25 shadow-[0_28px_70px_rgba(0,0,0,0.55)] p-5 sm:p-6 lg:p-7 flex flex-col">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg md:text-xl font-semibold tracking-tight">
                        CRM & Relationships
                    </h3>
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-[#83b735]/20 border border-[#83b735]/50 text-[#e4ffc0] text-sm">
                        CRM
                    </span>
                </div>
                <p class="text-sm text-white/80 mb-4">
                    Keep every interaction in focus — from first touch to loyal customer — with timelines, tasks,
                    and automated follow-ups.
                </p>
                <ul class="mt-auto space-y-1.5 text-xs text-white/80">
                    <li class="flex items-center">
                        <span class="h-1.5 w-1.5 rounded-full bg-[#83b735] mr-2"></span>
                        Lead pipelines & opportunity scoring
                    </li>
                    <li class="flex items-center">
                        <span class="h-1.5 w-1.5 rounded-full bg-[#83b735] mr-2"></span>
                        360° customer activity timelines
                    </li>
                    <li class="flex items-center">
                        <span class="h-1.5 w-1.5 rounded-full bg-[#83b735] mr-2"></span>
                        Automated reminders & task routing
                    </li>
                </ul>
            </article>
        </div>

        {{-- CTA Strip --}}
        <div
            id="get-started"
            class="mt-6 lg:mt-10 rounded-3xl backdrop-blur-md bg-white/20 border border-white/25 shadow-[0_26px_65px_rgba(0,0,0,0.55)] p-5 sm:p-6 lg:p-7 flex flex-col md:flex-row items-start md:items-center justify-between gap-4"
        >
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.26em] text-white/70 mb-1.5">
                    Ready when you are
                </p>
                <p class="text-sm sm:text-base text-white/85 max-w-xl">
                    Plug into your existing ecosystem, migrate cleanly, and go live with a multilingual ERP that looks
                    as premium as it performs.
                </p>
            </div>
            <a
                href="#contact"
                class="inline-flex items-center justify-center px-6 py-3 rounded-full text-sm font-semibold tracking-wide text-black bg-[#83b735] hover:bg-[#74a62f] shadow-[0_20px_55px_rgba(131,183,53,0.5)] transition-all"
            >
                Talk to our experts
            </a>
        </div>
    </section>
@endsection

