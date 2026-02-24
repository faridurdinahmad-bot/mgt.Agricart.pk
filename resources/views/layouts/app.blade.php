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

        /* Hide default Google Translate banner/UI – keep header clean */
        .goog-te-banner-frame,
        .goog-te-balloon-frame,
        .goog-tooltip,
        .goog-tooltip:hover,
        #goog-gt-tt,
        .goog-te-gadget,
        .skiptranslate {
            display: none !important;
            visibility: hidden !important;
        }
        body { top: 0 !important; }
        html.translated body { top: 0 !important; }
        /* Google Translate widget hidden; translation is driven by googtrans cookie */
        #google_translate_element {
            position: absolute !important;
            left: -9999px !important;
            width: 1px !important;
            height: 1px !important;
            overflow: hidden !important;
            opacity: 0 !important;
            pointer-events: none !important;
        }
        [x-cloak] { display: none !important; }
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
                            <a href="{{ route('welcome') }}" class="flex items-center gap-3 flex-shrink-0 notranslate">
                                @if(file_exists(public_path('images/logo.png.webp')))
                                    <img src="{{ asset('images/logo.png.webp') }}" alt="Agricart" class="h-10 w-auto object-contain" />
                                @elseif(file_exists(public_path('images/logo.png')))
                                    <img src="{{ asset('images/logo.png') }}" alt="Agricart" class="h-10 w-auto object-contain" />
                                @else
                                    <div class="h-10 w-10 rounded-xl bg-white/20 border border-white/40 flex items-center justify-center text-lg font-semibold tracking-tight">ERP</div>
                                @endif
                                <span class="font-bold text-base md:text-lg tracking-tight text-white" style="font-family: 'Poppins', 'Inter', sans-serif;">
                                    Agricart Management System <span class="text-white/90">(Agricart.pk)</span>
                                </span>
                            </a>

                            {{-- Actions: Language + Guest/Auth --}}
                            <div class="flex items-center gap-2 sm:gap-3">
                                {{-- Google Translate: Glassmorphism dropdown (notranslate = labels stay in English) --}}
                                <div class="relative notranslate" x-data="{ open: false }" @click.outside="open = false">
                                    <button
                                        type="button"
                                        @click="open = !open"
                                        class="inline-flex items-center gap-1.5 sm:gap-2 px-2.5 py-2 sm:px-3 sm:py-2.5 rounded-xl backdrop-blur-md bg-white/15 border border-white/30 hover:bg-white/25 transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-white/50 focus-visible:ring-offset-2 focus-visible:ring-offset-transparent"
                                        aria-haspopup="listbox"
                                        aria-expanded="false"
                                        aria-label="Select language"
                                    >
                                        {{-- Globe icon (Heroicons outline) --}}
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white/90 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                                        </svg>
                                        <span class="hidden sm:inline text-sm font-medium text-white/90">Language</span>
                                        <svg class="w-3.5 h-3.5 text-white/70 transition-transform" :class="open && 'rotate-180'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <div
                                        x-show="open"
                                        x-cloak
                                        x-transition:enter="transition ease-out duration-150"
                                        x-transition:enter-start="opacity-0 scale-95"
                                        x-transition:enter-end="opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-100"
                                        x-transition:leave-start="opacity-100 scale-100"
                                        x-transition:leave-end="opacity-0 scale-95"
                                        class="absolute right-0 mt-2 w-56 max-h-[70vh] overflow-y-auto rounded-xl backdrop-blur-xl bg-white/20 border border-white/30 shadow-xl py-1 z-50 notranslate"
                                        role="listbox"
                                    >
                                        <div class="px-3 py-2 border-b border-white/20">
                                            <p class="text-[11px] font-semibold uppercase tracking-wider text-white/70">Translate page</p>
                                        </div>
                                        <div id="translate-lang-list" class="py-1 notranslate" @click="open = false">
                                            <button type="button" data-lang="" class="translate-option w-full text-left px-3 py-2.5 text-sm text-white/90 hover:bg-white/20 flex items-center gap-2 rounded-lg mx-1" role="option">Original</button>
                                            <button type="button" data-lang="ur" class="translate-option w-full text-left px-3 py-2.5 text-sm text-white/90 hover:bg-white/20 flex items-center gap-2 rounded-lg mx-1" role="option">Urdu</button>
                                            <button type="button" data-lang="ar" class="translate-option w-full text-left px-3 py-2.5 text-sm text-white/90 hover:bg-white/20 flex items-center gap-2 rounded-lg mx-1" role="option">Arabic</button>
                                            <button type="button" data-lang="zh-CN" class="translate-option w-full text-left px-3 py-2.5 text-sm text-white/90 hover:bg-white/20 flex items-center gap-2 rounded-lg mx-1" role="option">Chinese (Simplified)</button>
                                            <button type="button" data-lang="zh-TW" class="translate-option w-full text-left px-3 py-2.5 text-sm text-white/90 hover:bg-white/20 flex items-center gap-2 rounded-lg mx-1" role="option">Chinese (Traditional)</button>
                                            <button type="button" data-lang="hi" class="translate-option w-full text-left px-3 py-2.5 text-sm text-white/90 hover:bg-white/20 flex items-center gap-2 rounded-lg mx-1" role="option">Hindi</button>
                                            <button type="button" data-lang="bn" class="translate-option w-full text-left px-3 py-2.5 text-sm text-white/90 hover:bg-white/20 flex items-center gap-2 rounded-lg mx-1" role="option">Bengali</button>
                                            <button type="button" data-lang="es" class="translate-option w-full text-left px-3 py-2.5 text-sm text-white/90 hover:bg-white/20 flex items-center gap-2 rounded-lg mx-1" role="option">Spanish</button>
                                            <button type="button" data-lang="fr" class="translate-option w-full text-left px-3 py-2.5 text-sm text-white/90 hover:bg-white/20 flex items-center gap-2 rounded-lg mx-1" role="option">French</button>
                                            <button type="button" data-lang="de" class="translate-option w-full text-left px-3 py-2.5 text-sm text-white/90 hover:bg-white/20 flex items-center gap-2 rounded-lg mx-1" role="option">German</button>
                                            <button type="button" data-lang="pt" class="translate-option w-full text-left px-3 py-2.5 text-sm text-white/90 hover:bg-white/20 flex items-center gap-2 rounded-lg mx-1" role="option">Portuguese</button>
                                            <button type="button" data-lang="ru" class="translate-option w-full text-left px-3 py-2.5 text-sm text-white/90 hover:bg-white/20 flex items-center gap-2 rounded-lg mx-1" role="option">Russian</button>
                                            <button type="button" data-lang="id" class="translate-option w-full text-left px-3 py-2.5 text-sm text-white/90 hover:bg-white/20 flex items-center gap-2 rounded-lg mx-1" role="option">Indonesian</button>
                                            <button type="button" data-lang="ms" class="translate-option w-full text-left px-3 py-2.5 text-sm text-white/90 hover:bg-white/20 flex items-center gap-2 rounded-lg mx-1" role="option">Malay</button>
                                            <button type="button" data-lang="fa" class="translate-option w-full text-left px-3 py-2.5 text-sm text-white/90 hover:bg-white/20 flex items-center gap-2 rounded-lg mx-1" role="option">Persian</button>
                                            <button type="button" data-lang="tr" class="translate-option w-full text-left px-3 py-2.5 text-sm text-white/90 hover:bg-white/20 flex items-center gap-2 rounded-lg mx-1" role="option">Turkish</button>
                                            <button type="button" data-lang="ja" class="translate-option w-full text-left px-3 py-2.5 text-sm text-white/90 hover:bg-white/20 flex items-center gap-2 rounded-lg mx-1" role="option">Japanese</button>
                                            <button type="button" data-lang="ko" class="translate-option w-full text-left px-3 py-2.5 text-sm text-white/90 hover:bg-white/20 flex items-center gap-2 rounded-lg mx-1" role="option">Korean</button>
                                            <button type="button" data-lang="en" class="translate-option w-full text-left px-3 py-2.5 text-sm text-white/90 hover:bg-white/20 flex items-center gap-2 rounded-lg mx-1" role="option">English</button>
                                        </div>
                                    </div>
                                </div>

                                @guest
                                    @if(request()->routeIs('welcome'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="inline-flex items-center justify-center px-4 py-2.5 rounded-full text-sm font-semibold tracking-wide text-[#83b735] bg-transparent border-2 border-[#83b735] hover:bg-[#83b735]/20 hover:text-white transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-transparent focus-visible:ring-[#83b735]/80"
                                        >
                                            Register
                                        </a>
                                    @endif
                                    <a
                                        href="{{ route('login') }}"
                                        class="inline-flex items-center justify-center px-4 py-2.5 rounded-full text-sm font-semibold tracking-wide text-black bg-[#83b735] hover:bg-[#74a62f] shadow-[0_18px_45px_rgba(131,183,53,0.35)] transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-transparent focus-visible:ring-[#a4d85f]"
                                    >
                                        Login
                                    </a>
                                @else
                                    <a
                                        href="{{ route('dashboard') }}"
                                        class="inline-flex items-center justify-center px-4 py-2.5 rounded-full text-sm font-semibold tracking-wide text-white bg-white/10 border border-white/30 hover:bg-white/20 hover:text-[#83b735] transition-all"
                                    >
                                        Dashboard
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}" class="inline">
                                        @csrf
                                        <button
                                            type="submit"
                                            class="inline-flex items-center justify-center px-4 py-2.5 rounded-full text-sm font-semibold tracking-wide text-[#83b735] bg-transparent border-2 border-[#83b735] hover:bg-[#83b735]/20 hover:text-white transition-all"
                                        >
                                            Logout
                                        </button>
                                    </form>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </header>

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

    {{-- Google Translate: container must exist so widget can inject the select --}}
    <div id="google_translate_element" aria-hidden="true"></div>

    {{-- Google Translate: cookie-based; clear all variants before set; Original/English = delete cookie --}}
    <script>
        (function() {
            var PAGE_LANG = 'en';

            function clearGoogTransCookie() {
                var host = window.location.hostname || '';
                var expiry = '; path=/; max-age=0';
                document.cookie = 'googtrans=; path=/' + expiry;
                document.cookie = 'googtrans=; domain=' + host + expiry;
                if (host.indexOf('.') !== -1) document.cookie = 'googtrans=; domain=.' + host + expiry;
            }

            function setLanguage(langCode) {
                clearGoogTransCookie();
                var host = window.location.hostname || '';
                var isOriginal = !langCode || langCode === PAGE_LANG;
                if (!isOriginal) {
                    var value = '/en/' + langCode;
                    document.cookie = 'googtrans=' + value + '; path=/';
                    document.cookie = 'googtrans=' + value + '; domain=' + host + '; path=/';
                }
                setTimeout(function() {
                    location.reload();
                }, 0);
            }

            var list = document.getElementById('translate-lang-list');
            if (list) {
                list.addEventListener('click', function(e) {
                    var btn = e.target.closest('.translate-option');
                    if (!btn) return;
                    setLanguage((btn.getAttribute('data-lang') || '').trim());
                });
            }

            window.googleTranslateElementInit = function() {
                if (typeof google === 'undefined' || !google.translate || !google.translate.TranslateElement) return;
                var container = document.getElementById('google_translate_element');
                if (!container) return;
                new google.translate.TranslateElement({
                    pageLanguage: PAGE_LANG,
                    includedLanguages: 'ur,ar,zh-CN,zh-TW,hi,bn,es,fr,de,pt,ru,id,ms,fa,tr,ja,ko,en',
                    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                }, 'google_translate_element');
            };
        })();
    </script>
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>
</body>
</html>

