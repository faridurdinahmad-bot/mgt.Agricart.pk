<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'ERP System') }}</title>

    {{-- Google Fonts: Inter & Poppins --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|poppins:500,600,700&display=swap" rel="stylesheet" />

    {{-- Tailwind via CDN (no Vite build required) --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        woodmart: '#83b735',
                    },
                },
            },
        };
    </script>

    <style>
        body {
            font-family: 'Inter', 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        /* Hide scrollbars but keep scrolling */
        html,
        body {
            scrollbar-width: none;          /* Firefox */
            -ms-overflow-style: none;       /* IE/Edge legacy */
        }

        html::-webkit-scrollbar,
        body::-webkit-scrollbar {
            width: 0;
            height: 0;                      /* Chrome, Safari, Opera */
        }
    </style>
</head>
<body class="h-full antialiased text-white">
    <div
        class="min-h-screen relative flex flex-col"
        style="background-image: url('https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center;"
    >
        {{-- Background Overlay for Glassmorphism --}}
        <div class="absolute inset-0 bg-black/60"></div>

        {{-- Page Content Wrapper --}}
        <div class="relative z-10 flex flex-col min-h-screen">
            {{-- Sticky Glass Header --}}
            <header class="sticky top-0 z-30">
                <div class="backdrop-blur-md bg-white/20 border-b border-white/20">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex items-center justify-between h-16 md:h-20">
                            {{-- Logo --}}
                            <div class="flex items-center space-x-3">
                                <div class="h-10 w-10 rounded-xl bg-white/20 border border-white/40 flex items-center justify-center text-lg font-semibold tracking-tight">
                                    ERP
                                </div>
                                <div class="flex flex-col leading-tight">
                                    <span class="text-sm font-semibold uppercase tracking-[0.22em] text-white/80">
                                        Enterprise Suite
                                    </span>
                                    <span class="text-lg md:text-xl font-bold">
                                        {{ config('app.name', 'ERP System') }}
                                    </span>
                                </div>
                            </div>

                            {{-- Desktop Navigation --}}
                            <nav class="hidden md:flex items-center space-x-8 text-sm font-medium">
                                <a href="#features" class="hover:text-[#83b735] transition-colors">
                                    Features
                                </a>
                                <a href="#modules" class="hover:text-[#83b735] transition-colors">
                                    Modules
                                </a>
                                <a href="#pricing" class="hover:text-[#83b735] transition-colors">
                                    Pricing
                                </a>
                                <a href="#contact" class="hover:text-[#83b735] transition-colors">
                                    Contact
                                </a>
                            </nav>

                            {{-- Actions --}}
                            <div class="flex items-center space-x-3">
                                <button
                                    class="inline-flex md:hidden items-center justify-center h-10 w-10 rounded-xl backdrop-blur-md bg-white/20 border border-white/30 text-sm focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-transparent focus-visible:ring-[#83b735]/80"
                                    aria-label="Open navigation"
                                >
                                    <span class="sr-only">Open navigation</span>
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                        <path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                    </svg>
                                </button>

                                <a
                                    href="{{ route('dashboard') }}"
                                    class="hidden sm:inline-flex items-center justify-center px-4 py-2.5 rounded-full text-sm font-semibold tracking-wide text-black bg-[#83b735] hover:bg-[#74a62f] shadow-[0_18px_45px_rgba(131,183,53,0.35)] transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-transparent focus-visible:ring-[#a4d85f]"
                                >
                                    Login
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            {{-- Mobile Navigation --}}
            <div class="md:hidden backdrop-blur-md bg-white/20 border-b border-white/15">
                <div class="max-w-7xl mx-auto px-4 py-3 flex flex-wrap gap-3 text-xs font-medium">
                    <a href="#features" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 transition-colors">
                        Features
                    </a>
                    <a href="#modules" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 transition-colors">
                        Modules
                    </a>
                    <a href="#pricing" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 transition-colors">
                        Pricing
                    </a>
                    <a href="#contact" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 transition-colors">
                        Contact
                    </a>
                    <a
                        href="{{ route('dashboard') }}"
                        class="px-4 py-1.5 rounded-full bg-[#83b735] text-black font-semibold tracking-wide hover:bg-[#74a62f] transition-colors"
                    >
                        Login
                    </a>
                </div>
            </div>

            {{-- Main Content --}}
            <main class="flex-1">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-16 lg:py-20">
                    @yield('content')
                </div>
            </main>

            {{-- Glass Footer --}}
            <footer class="mt-auto">
                <div class="backdrop-blur-md bg-white/20 border-t border-white/20">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 md:py-6 flex flex-col md:flex-row items-center justify-between gap-3 text-xs md:text-sm text-white/80">
                        <p class="text-center md:text-left">
                            &copy; {{ now()->year }} {{ config('app.name', 'ERP System') }}. All rights reserved.
                        </p>
                        <div class="flex items-center space-x-4">
                            <a href="#privacy" class="hover:text-[#83b735] transition-colors">
                                Privacy Policy
                            </a>
                            <span class="hidden md:inline-block text-white/40">/</span>
                            <a href="#terms" class="hover:text-[#83b735] transition-colors">
                                Terms of Service
                            </a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>

