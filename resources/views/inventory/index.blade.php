@extends('layouts.app')

@section('main_container_class')
    w-full max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12
@endsection

@section('content')
    <style>
        .inv-card {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            background: rgba(30,41,59,0.5);
            border: 1px solid rgba(255,255,255,0.15);
            box-shadow: 0 2px 12px rgba(0,0,0,0.15);
            transition: border-color 0.25s ease, box-shadow 0.25s ease;
        }
        .inv-card:hover {
            border-color: rgba(131,183,53,0.5);
            box-shadow: 0 0 20px rgba(131,183,53,0.15), 0 2px 12px rgba(0,0,0,0.15);
        }
        .inv-card.inv-card--prominent {
            border-color: rgba(131,183,53,0.25);
            background: rgba(30,41,59,0.6);
        }
        .inv-card.inv-card--prominent:hover {
            border-color: rgba(131,183,53,0.6);
            box-shadow: 0 0 24px rgba(131,183,53,0.25), 0 2px 12px rgba(0,0,0,0.15);
        }
    </style>
    <div class="space-y-6">
        <header class="flex items-center justify-between gap-4 border-b border-white/15 pb-4">
            <div>
                <h1 class="text-xl md:text-2xl font-semibold tracking-tight text-white">Inventory Control Center</h1>
                <p class="mt-1 text-sm text-white/60">
                    Manage categories, brands, units, warranties, products, and stock alerts.
                </p>
            </div>
            <a
                href="{{ route('dashboard') }}"
                class="inline-flex items-center gap-2 px-3 py-2 rounded-lg text-xs font-semibold text-white/90 bg-white/10 border border-white/25 hover:bg-white/15 hover:border-white/40 transition-colors"
            >
                <span>Back to 3D Dashboard</span>
            </a>
        </header>

        <div
            class="rounded-2xl border border-white/20 p-4 sm:p-6 gap-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3"
            style="backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); background: rgba(255,255,255,0.08); box-shadow: 0 4px 24px rgba(0,0,0,0.2), inset 0 1px 0 rgba(255,255,255,0.06);"
        >
            @php
                $cards = [
                    [
                        'name' => 'Categories',
                        'icon' => 'folder',
                        'href' => '#',
                        'prominent' => false,
                    ],
                    [
                        'name' => 'Brands',
                        'icon' => 'tag',
                        'href' => '#',
                        'prominent' => false,
                    ],
                    [
                        'name' => 'Units',
                        'icon' => 'scale',
                        'href' => '#',
                        'prominent' => false,
                    ],
                    [
                        'name' => 'Warranties',
                        'icon' => 'shield-check',
                        'href' => '#',
                        'prominent' => false,
                    ],
                    [
                        'name' => 'Product Master',
                        'icon' => 'plus-circle',
                        'href' => '#',
                        'prominent' => true,
                    ],
                    [
                        'name' => 'Stock Alerts',
                        'icon' => 'bell-alert',
                        'href' => '#',
                        'prominent' => false,
                    ],
                ];
            @endphp
            @foreach($cards as $card)
                <a
                    href="{{ $card['href'] }}"
                    class="inv-card {{ $card['prominent'] ? 'inv-card--prominent' : '' }} group relative flex flex-col items-center justify-center gap-3 rounded-xl p-6 text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-[#83b735]/50"
                >
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl text-[#83b735] transition-colors group-hover:text-[#83b735] group-hover:drop-shadow-[0_0_8px_rgba(131,183,53,0.4)]">
                        @if($card['icon'] === 'folder')
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" /></svg>
                        @elseif($card['icon'] === 'tag')
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318a2.25 2.25 0 00.659 1.59l8.25 8.25a2.25 2.25 0 003.182 0l2.122-2.121a2.25 2.25 0 000-3.182l-8.25-8.25a2.25 2.25 0 00-1.59-.659H5.25A2.25 2.25 0 003 5.25v4.318a2.25 2.25 0 00.659 1.59l8.25 8.25a2.25 2.25 0 003.182 0l2.122-2.121a2.25 2.25 0 000-3.182l-8.25-8.25A2.25 2.25 0 009.568 3z" /><path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" /></svg>
                        @elseif($card['icon'] === 'scale')
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0012 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 01-2.031.352 5.988 5.988 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 01-2.031.352 5.989 5.989 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971z" /></svg>
                        @elseif($card['icon'] === 'shield-check')
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" /></svg>
                        @elseif($card['icon'] === 'plus-circle')
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        @else
                            {{-- bell-alert --}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5" /></svg>
                        @endif
                    </div>
                    <span class="text-sm font-semibold text-white {{ $card['prominent'] ? 'text-base' : '' }}">{{ $card['name'] }}</span>
                </a>
            @endforeach
        </div>
    </div>
@endsection
