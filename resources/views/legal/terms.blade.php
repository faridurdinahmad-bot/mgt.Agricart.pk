@extends('layouts.app')

@section('content')
    {{-- Back to Home --}}
    <div class="max-w-3xl mx-auto mb-6">
        <a href="{{ route('welcome') }}" class="inline-flex items-center gap-2 text-sm font-medium text-white/90 hover:text-[#83b735] transition-colors">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            Back to Home
        </a>
    </div>

    {{-- Hero --}}
    <section class="max-w-3xl mx-auto text-center mb-10 md:mb-14">
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold tracking-tight text-white mb-3">
            Terms of Service
        </h1>
        <p class="text-sm sm:text-base md:text-lg text-white/85 leading-relaxed" style="line-height: 1.7;">
            Agricart is a tool for business growth and operational efficiency. By using our platform, you agree to the terms below.
        </p>
    </section>

    {{-- Content: Glassmorphism sections --}}
    <section class="max-w-3xl mx-auto space-y-6 pb-4">
        {{-- Acceptance of Terms --}}
        <div class="rounded-2xl backdrop-blur-md bg-white/15 border border-white/20 p-5 sm:p-6 flex gap-4">
            <span class="flex-shrink-0 inline-flex h-10 w-10 items-center justify-center rounded-xl bg-[#83b735]/20 border border-[#83b735]/40 text-[#a4d85f]">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </span>
            <div class="min-w-0">
                <h2 class="text-base sm:text-lg font-semibold text-white mb-2">Acceptance of Terms</h2>
                <p class="text-sm sm:text-base text-white/90 leading-relaxed" style="line-height: 1.7;">
                    By registering for or using Agricart, you accept these Terms of Service. If you do not agree, do not use the platform. We may update these terms from time to time; continued use after changes constitutes acceptance of the revised terms.
                </p>
            </div>
        </div>

        {{-- Account Responsibility --}}
        <div class="rounded-2xl backdrop-blur-md bg-white/15 border border-white/20 p-5 sm:p-6 flex gap-4">
            <span class="flex-shrink-0 inline-flex h-10 w-10 items-center justify-center rounded-xl bg-[#83b735]/20 border border-[#83b735]/40 text-[#a4d85f]">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998-3.469A3.75 3.75 0 0018 13.125H6a3.75 3.75 0 00-1.499 7.058z" />
                </svg>
            </span>
            <div class="min-w-0">
                <h2 class="text-base sm:text-lg font-semibold text-white mb-2">Account Responsibility</h2>
                <p class="text-sm sm:text-base text-white/90 leading-relaxed" style="line-height: 1.7;">
                    You are responsible for maintaining the confidentiality of your account credentials and for all activity under your account. Use Agricart only for lawful business purposes and in a way that does not infringe the rights of others or restrict their use of the platform.
                </p>
            </div>
        </div>

        {{-- Fair Usage --}}
        <div class="rounded-2xl backdrop-blur-md bg-white/15 border border-white/20 p-5 sm:p-6 flex gap-4">
            <span class="flex-shrink-0 inline-flex h-10 w-10 items-center justify-center rounded-xl bg-[#83b735]/20 border border-[#83b735]/40 text-[#a4d85f]">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h7.082m4.5 0A2.251 2.251 0 0118 18.75m-4.5-2.25h.008v.008h-.008V16.5z" />
                </svg>
            </span>
            <div class="min-w-0">
                <h2 class="text-base sm:text-lg font-semibold text-white mb-2">Fair Usage</h2>
                <p class="text-sm sm:text-base text-white/90 leading-relaxed" style="line-height: 1.7;">
                    Agricart is designed to support your business growth and day-to-day operations. You agree to use the service fairly and in accordance with your plan and any usage guidelines we publish. Abuse of the platform, including attempts to circumvent security or overuse shared resources, may result in suspension or termination.
                </p>
            </div>
        </div>

        {{-- Service Availability (99.9% Uptime SLA) --}}
        <div class="rounded-2xl backdrop-blur-md bg-white/15 border border-white/20 p-5 sm:p-6 flex gap-4">
            <span class="flex-shrink-0 inline-flex h-10 w-10 items-center justify-center rounded-xl bg-[#83b735]/20 border border-[#83b735]/40 text-[#a4d85f]">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </span>
            <div class="min-w-0">
                <h2 class="text-base sm:text-lg font-semibold text-white mb-2">Service Availability (99.9% Uptime SLA)</h2>
                <p class="text-sm sm:text-base text-white/90 leading-relaxed" style="line-height: 1.7;">
                    We target 99.9% uptime for the Agricart platform so your operations can run without interruption. Scheduled maintenance will be communicated in advance where possible. We are not liable for downtime caused by factors outside our reasonable control, including third-party services or force majeure.
                </p>
            </div>
        </div>
    </section>
@endsection
