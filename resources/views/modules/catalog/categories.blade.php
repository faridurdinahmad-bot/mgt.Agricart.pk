<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Catalog &gt; Categories</title>

    {{-- Tailwind via CDN (same as main layout) --}}
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
</head>
<body class="h-full w-full antialiased text-white overflow-hidden bg-black">
<div
    class="fixed inset-0 z-40 w-full h-full flex flex-col"
    style="background-image: url('https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center;"
>
    <div class="absolute inset-0 bg-black/70"></div>

    {{-- Top bar --}}
    @include('partials.fullscreen-nav', ['title' => 'PRODUCT CATALOG MASTER > CATEGORIES'])

    {{-- Workspace --}}
    <main class="relative z-10 flex-1 flex flex-col">
        <div class="flex-1 px-4 sm:px-6 lg:px-8 py-4 sm:py-6 lg:py-8">
            <div
                class="h-full w-full rounded-2xl border border-white/20 p-4 sm:p-5 lg:p-6 grid grid-cols-1 lg:grid-cols-[320px_minmax(0,1fr)] gap-4 lg:gap-6"
                style="
                    backdrop-filter: blur(22px);
                    -webkit-backdrop-filter: blur(22px);
                    background:
                        radial-gradient(circle at top left, rgba(255,255,255,0.12) 0, transparent 45%),
                        rgba(15,23,42,0.8);
                    box-shadow: 0 18px 45px rgba(0,0,0,0.65), inset 0 1px 0 rgba(255,255,255,0.05);
                "
            >
                {{-- Left: searchable tree --}}
                <section class="flex flex-col overflow-hidden">
                    <div class="mb-3">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.2em] text-white/60">
                            Category Tree
                        </p>
                        <p class="mt-0.5 text-[11px] text-white/45">
                            Navigate 100k+ nodes with filtered search.
                        </p>
                    </div>
                    <div class="mb-3">
                        <label for="category-tree-search" class="sr-only">Search categories</label>
                        <input
                            id="category-tree-search"
                            type="search"
                            placeholder="Search categories…"
                            class="w-full px-3 py-1.5 rounded-lg text-xs font-medium text-white placeholder-white/40 bg-white/5 border border-white/20 focus:border-[#83b735]/60 focus:ring-1 focus:ring-[#83b735]/50 focus:outline-none"
                        />
                    </div>
                    <div class="flex-1 rounded-xl border border-white/15 bg-black/30/20 p-3 overflow-auto">
                        <ul class="space-y-1 text-sm text-white/80">
                            <li class="font-semibold text-[#83b735] flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#83b735]"></span>
                                All Categories
                            </li>
                            <li class="pl-3 text-white/75">Electronics</li>
                            <li class="pl-6 text-white/65">Mobiles</li>
                            <li class="pl-9 text-white/55">Smartphones</li>
                            <li class="pl-9 text-white/55">Feature Phones</li>
                            <li class="pl-6 text-white/65">Laptops</li>
                            <li class="pl-3 text-white/75">Grocery</li>
                            <li class="pl-6 text-white/65">Rice &amp; Pulses</li>
                            <li class="pl-6 text-white/65">Oils &amp; Ghee</li>
                        </ul>
                    </div>
                </section>

                {{-- Right: main edit workspace --}}
                <section class="flex flex-col overflow-hidden">
                    <div class="mb-3 flex items-center justify-between gap-3">
                        <div>
                            <p class="text-[11px] font-semibold uppercase tracking-[0.2em] text-white/60">
                                Category Workspace
                            </p>
                            <p class="mt-0.5 text-[11px] text-white/45">
                                Edit metadata, imagery, and platform mappings for the selected node.
                            </p>
                        </div>
                    </div>
                    <div class="flex-1 rounded-xl border border-white/15 bg-black/30/40 p-4 sm:p-5 space-y-4 overflow-auto">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label class="block text-[11px] font-semibold uppercase tracking-[0.2em] text-white/55">Name</label>
                                <input
                                    type="text"
                                    value="Electronics — Mobiles"
                                    class="w-full px-3 py-2 rounded-lg bg-black/40 border border-white/20 text-sm text-white/90 focus:border-[#83b735]/60 focus:ring-1 focus:ring-[#83b735]/50 focus:outline-none"
                                />
                            </div>
                            <div class="space-y-2">
                                <label class="block text-[11px] font-semibold uppercase tracking-[0.2em] text-white/55">Parent</label>
                                <input
                                    type="text"
                                    value="Electronics"
                                    class="w-full px-3 py-2 rounded-lg bg-black/40 border border-white/20 text-sm text-white/85 focus:border-[#83b735]/60 focus:ring-1 focus:ring-[#83b735]/50 focus:outline-none"
                                />
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[11px] font-semibold uppercase tracking-[0.2em] text-white/55">Description</label>
                            <textarea
                                rows="3"
                                class="w-full px-3 py-2 rounded-lg bg-black/40 border border-white/20 text-sm text-white/85 placeholder-white/40 focus:border-[#83b735]/60 focus:ring-1 focus:ring-[#83b735]/50 focus:outline-none"
                                placeholder="Short merchandising notes, SEO description, internal remarks…"
                            ></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label class="block text-[11px] font-semibold uppercase tracking-[0.2em] text-white/55">Image</label>
                                <div class="flex items-center justify-center rounded-lg bg-black/50 border border-dashed border-white/30 text-xs text-white/65 min-h-[5rem]">
                                    Drop category thumbnail here or browse files
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-[11px] font-semibold uppercase tracking-[0.2em] text-white/55">Sync Mapping</label>
                                <div class="rounded-lg bg-black/40 border border-white/20 text-xs text-white/80 divide-y divide-white/10">
                                    <div class="flex items-center justify-between px-3 py-2">
                                        <span>Daraz</span>
                                        <span class="text-[11px] text-white/60">Not mapped</span>
                                    </div>
                                    <div class="flex items-center justify-between px-3 py-2">
                                        <span>Alibaba</span>
                                        <span class="text-[11px] text-white/60">Not mapped</span>
                                    </div>
                                    <div class="flex items-center justify-between px-3 py-2">
                                        <span>WooCommerce</span>
                                        <span class="text-[11px] text-white/60">Not mapped</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-2 border-t border-white/10">
                            <button
                                type="button"
                                class="px-3 py-1.5 rounded-lg text-xs font-semibold text-white/80 bg-white/5 border border-white/20 hover:bg-white/10 hover:border-white/35 transition-colors"
                            >
                                Reset Changes
                            </button>
                            <button
                                id="save-category-btn"
                                type="button"
                                class="px-4 py-1.5 rounded-lg text-xs font-semibold text-black bg-[#83b735] border border-[#9bdb4f] hover:bg-[#74a62f] hover:border-[#b1e563] transition-colors shadow-[0_0_18px_rgba(131,183,53,0.7)]"
                            >
                                Save Category
                            </button>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
    </main>
</div>

{{-- Save notification toast (UI only) --}}
<div
    id="save-toast"
    class="pointer-events-none fixed bottom-4 right-4 z-50 rounded-lg bg-black/70 border border-[#83b735]/60 px-4 py-2 text-xs font-semibold text-white/90 shadow-[0_0_18px_rgba(131,183,53,0.7)] opacity-0 translate-y-1 transition-all duration-300 hidden"
>
    Category saved successfully.
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var btn = document.getElementById('save-category-btn');
        var toast = document.getElementById('save-toast');
        if (!btn || !toast) return;

        btn.addEventListener('click', function () {
            toast.classList.remove('hidden');
            // force reflow to allow transition
            void toast.offsetWidth;
            toast.classList.remove('opacity-0', 'translate-y-1');
            toast.classList.add('opacity-100', 'translate-y-0');

            setTimeout(function () {
                toast.classList.add('opacity-0', 'translate-y-1');
                setTimeout(function () {
                    toast.classList.add('hidden');
                }, 250);
            }, 1800);
        });
    });
</script>
</body>
</html>

