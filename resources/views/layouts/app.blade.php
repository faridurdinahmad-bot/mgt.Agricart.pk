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

        /* Fade-in on scroll for feature cards */
        .fade-in-card {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .fade-in-card.is-visible {
            opacity: 1;
            transform: translateY(0);
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
                <div class="backdrop-blur-sm bg-white/15 border-b border-white/20">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex items-center justify-between h-16 md:h-20">
                            {{-- Logo (always links to landing page) --}}
                            <a href="{{ route('welcome') }}" class="flex items-center gap-3 flex-shrink-0 notranslate" title="Back to Home" aria-label="Agricart – Back to Home">
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
                                        class="inline-flex items-center gap-1.5 sm:gap-2 px-2.5 py-2 sm:px-3 sm:py-2.5 rounded-xl backdrop-blur-sm bg-white/15 border border-white/25 hover:bg-white/20 hover:border-white/35 transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-white/50 focus-visible:ring-offset-2 focus-visible:ring-offset-transparent shadow-[0_2px_12px_rgba(0,0,0,0.06)]"
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

            {{-- Breadcrumbs (sub-pages only) --}}
            @hasSection('breadcrumbs')
                <div class="border-b border-white/10 bg-black/10">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
                        @yield('breadcrumbs')
                    </div>
                </div>
            @endif

            {{-- Main Content --}}
            <main class="flex-1">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-16 lg:py-20">
                    @yield('content')
                </div>
            </main>

            {{-- Glass Footer --}}
            <footer class="mt-auto">
                <div class="backdrop-blur-sm bg-white/15 border-t border-white/20">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 md:py-6 flex flex-col md:flex-row items-center md:items-center justify-between gap-4 text-xs md:text-sm text-white/80">
                        <div class="text-center md:text-left space-y-1">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-white/60">
                                Agricart: Empowering Trade through Innovation.
                            </p>
                            <p class="text-xs text-white/50 max-w-md">
                                Disclaimer: This site is translated for your convenience using machine translation. In case of any discrepancy or error, the original English version shall prevail. If you spot a mistake, please let us know.
                            </p>
                            <p>
                                &copy; 2026 Agricart (Pvt) Ltd. All Rights Reserved.
                            </p>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center justify-center md:justify-end gap-3">
                            <div class="flex items-center gap-4 flex-wrap justify-center">
                                <a
                                    href="{{ route('privacy') }}"
                                    class="text-white/75 hover:text-[#83b735] transition-colors underline-offset-4 hover:underline"
                                >
                                    Privacy Policy
                                </a>
                                <span class="hidden sm:inline-block text-white/40">/</span>
                                <a
                                    href="{{ route('terms') }}"
                                    class="text-white/75 hover:text-[#83b735] transition-colors underline-offset-4 hover:underline"
                                >
                                    Terms of Service
                                </a>
                            </div>
                            <div class="flex items-center justify-center md:justify-end gap-3">
                                <a href="#" class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/10 border border-white/30 text-white/80 hover:bg-white/20 hover:text-[#83b735] transition-colors" aria-label="Facebook">
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                                </a>
                                <a href="#" class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/10 border border-white/30 text-white/80 hover:bg-white/20 hover:text-[#83b735] transition-colors" aria-label="LinkedIn">
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                                </a>
                                <a href="#" class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/10 border border-white/30 text-white/80 hover:bg-white/20 hover:text-[#83b735] transition-colors" aria-label="WhatsApp">
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                </a>
                            </div>
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

