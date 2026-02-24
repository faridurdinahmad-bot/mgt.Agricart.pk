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
            Privacy Policy
        </h1>
        <p class="text-sm sm:text-base md:text-lg text-white/85 leading-relaxed">
            Your business data is your asset. We are here to protect it.
        </p>
    </section>

    {{-- Content: Glassmorphism sections --}}
    <section class="max-w-3xl mx-auto space-y-6 pb-4">
        {{-- Data Ownership --}}
        <div class="rounded-2xl backdrop-blur-md bg-white/15 border border-white/20 p-5 sm:p-6 flex gap-4">
            <span class="flex-shrink-0 inline-flex h-10 w-10 items-center justify-center rounded-xl bg-[#83b735]/20 border border-[#83b735]/40 text-[#a4d85f]">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
            </span>
            <div class="min-w-0">
                <h2 class="text-base sm:text-lg font-semibold text-white mb-2">Data Ownership</h2>
                <p class="text-sm sm:text-base text-white/90 leading-relaxed" style="line-height: 1.7;">
                    All business data, including sales and inventory records, belongs exclusively to the user. Agricart (Pvt) Ltd does not share this data with third parties. You retain full control and ownership of your information at all times.
                </p>
            </div>
        </div>

        {{-- Bank-grade Encryption --}}
        <div class="rounded-2xl backdrop-blur-md bg-white/15 border border-white/20 p-5 sm:p-6 flex gap-4">
            <span class="flex-shrink-0 inline-flex h-10 w-10 items-center justify-center rounded-xl bg-[#83b735]/20 border border-[#83b735]/40 text-[#a4d85f]">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                </svg>
            </span>
            <div class="min-w-0">
                <h2 class="text-base sm:text-lg font-semibold text-white mb-2">Bank-Grade Encryption</h2>
                <p class="text-sm sm:text-base text-white/90 leading-relaxed" style="line-height: 1.7;">
                    We use bank-grade encryption and secure cloud hosting to protect your operations. Data in transit and at rest is encrypted to institutional standards so your business information remains confidential and secure.
                </p>
            </div>
        </div>

        {{-- Support Access --}}
        <div class="rounded-2xl backdrop-blur-md bg-white/15 border border-white/20 p-5 sm:p-6 flex gap-4">
            <span class="flex-shrink-0 inline-flex h-10 w-10 items-center justify-center rounded-xl bg-[#83b735]/20 border border-[#83b735]/40 text-[#a4d85f]">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998-3.469A3.75 3.75 0 0018 13.125H6a3.75 3.75 0 00-1.499 7.058z" />
                </svg>
            </span>
            <div class="min-w-0">
                <h2 class="text-base sm:text-lg font-semibold text-white mb-2">Support Access</h2>
                <p class="text-sm sm:text-base text-white/90 leading-relaxed" style="line-height: 1.7;">
                    Technical access to your data is strictly limited to support instances where you provide explicit permission. We do not access your account or data without your consent.
                </p>
            </div>
        </div>
    </section>
@endsection
