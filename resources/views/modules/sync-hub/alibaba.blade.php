<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SYNC HUB &gt; Alibaba</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full w-full antialiased text-white overflow-hidden bg-black">
<div
    class="fixed inset-0 z-40 w-full h-full flex flex-col"
    style="background-image: url('https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center;"
>
    <div class="absolute inset-0 bg-black/70"></div>

    @include('partials.fullscreen-nav', ['title' => ($drumLabel ?? 'SYNC HUB') . ' > ' . ($moduleLabel ?? 'Alibaba')])

    <main class="relative z-10 flex-1 flex items-center justify-center px-4 sm:px-6 lg:px-8">
        <div
            class="max-w-xl w-full rounded-2xl border border-white/20 px-4 py-8 sm:px-6 sm:py-10 text-center"
            style="
                backdrop-filter: blur(22px);
                -webkit-backdrop-filter: blur(22px);
                background:
                    radial-gradient(circle at top left, rgba(255,255,255,0.12) 0, transparent 45%),
                    rgba(15,23,42,0.9);
                box-shadow: 0 18px 45px rgba(0,0,0,0.7), inset 0 1px 0 rgba(255,255,255,0.04);
            "
        >
            <p class="text-sm md:text-base text-white/75">
                DEVELOPMENT NOTES: List required features here.
            </p>
        </div>
    </main>
</div>
</body>
</html>

