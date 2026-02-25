@extends('layouts.app')

@section('main_container_class')
    w-full max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-10
@endsection

@section('content')
    {{-- 2026 ERP Command Center: premium glass, live feel, refined typography --}}
    <style>
        @keyframes erp-pulse { 0%, 100% { opacity: 1; box-shadow: 0 0 6px #83b735; } 50% { opacity: 0.85; box-shadow: 0 0 12px #83b735, 0 0 20px rgba(131,183,53,0.4); } }
        .erp-dot { animation: erp-pulse 2.5s ease-in-out infinite; }
        @keyframes erp-glow { 0%, 100% { opacity: 0.5; } 50% { opacity: 0.9; } }
        .erp-separator { animation: erp-glow 3s ease-in-out infinite; }
        .erp-fade-in { opacity: 0; transform: translateY(10px); animation: erp-fade-in 0.5s ease-out forwards; }
        .erp-fade-in.delay-1 { animation-delay: 0.05s; } .erp-fade-in.delay-2 { animation-delay: 0.1s; } .erp-fade-in.delay-3 { animation-delay: 0.15s; } .erp-fade-in.delay-4 { animation-delay: 0.2s; } .erp-fade-in.delay-5 { animation-delay: 0.25s; } .erp-fade-in.delay-6 { animation-delay: 0.3s; } .erp-fade-in.delay-7 { animation-delay: 0.35s; } .erp-fade-in.delay-8 { animation-delay: 0.4s; }
        @keyframes erp-fade-in { to { opacity: 1; transform: translateY(0); } }
        /* 3D scene and cards */
        .erp-3d-scene { perspective: 1400px; transform-style: preserve-3d; }
        .erp-card-3d {
            transform-style: preserve-3d;
            transform: perspective(1400px) rotateX(1deg) rotateY(0deg) translateZ(0);
            transition: transform 0.35s ease-out, box-shadow 0.35s ease-out;
        }
        .erp-card-3d:hover {
            transform: perspective(1400px) rotateX(-3deg) rotateY(2deg) translateZ(14px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.2), 0 24px 56px rgba(0,0,0,0.25), 0 0 0 1px rgba(255,255,255,0.08) inset, inset 0 1px 0 rgba(255,255,255,0.15);
        }
        .erp-drum-3d {
            transform-style: preserve-3d;
            transform: perspective(1400px) rotateX(0.5deg) rotateY(0deg) translateZ(0);
            transition: transform 0.3s ease-out, box-shadow 0.3s ease-out;
        }
        .erp-drum-3d:hover {
            transform: perspective(1400px) rotateX(-2deg) rotateY(1deg) translateZ(10px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15), 0 18px 44px rgba(0,0,0,0.22), 0 0 0 1px rgba(255,255,255,0.06) inset, inset 0 1px 0 rgba(255,255,255,0.12);
        }
    </style>
    <div class="space-y-5" x-data>
        {{-- 2026 ERP header strip: title, quick links, date/time --}}
        <header class="flex flex-wrap items-center justify-between gap-3 pb-3 border-b border-white/15">
            <div class="flex items-center gap-3">
                <h1 class="text-sm font-bold uppercase tracking-[0.2em] text-white/90">Command Center</h1>
                <span class="px-2 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wider text-[#83b735] border border-[#83b735]/40 bg-[#83b735]/10">ERP 2026</span>
            </div>
            <div class="flex items-center gap-3 flex-wrap">
                <p class="text-[10px] text-white/50 font-medium uppercase tracking-widest">Live overview</p>
                <time id="dashboard-datetime" class="text-[11px] text-white/60 font-medium tabular-nums" datetime="{{ now()->toIso8601String() }}">{{ now()->format('d M Y · H:i') }}</time>
            </div>
        </header>

        {{-- Quick links (2–4 shortcuts) --}}
        <div class="flex flex-wrap items-center gap-2">
            <span class="text-[10px] text-white/50 uppercase tracking-wider mr-1">Quick:</span>
            <a href="{{ route('pos.screen') }}" class="px-2.5 py-1.5 rounded-lg text-[11px] font-semibold text-white/90 bg-white/10 border border-white/20 hover:bg-[#83b735]/20 hover:border-[#83b735]/40 transition-colors">POS</a>
            <a href="{{ route('admin.approvals') }}" class="px-2.5 py-1.5 rounded-lg text-[11px] font-semibold text-white/90 bg-white/10 border border-white/20 hover:bg-[#83b735]/20 hover:border-[#83b735]/40 transition-colors">Approvals</a>
            <a href="{{ route('inventory.current-stock') }}" class="px-2.5 py-1.5 rounded-lg text-[11px] font-semibold text-white/90 bg-white/10 border border-white/20 hover:bg-[#83b735]/20 hover:border-[#83b735]/40 transition-colors">Stock</a>
            <a href="{{ route('sales.pos') }}" class="px-2.5 py-1.5 rounded-lg text-[11px] font-semibold text-white/90 bg-white/10 border border-white/20 hover:bg-[#83b735]/20 hover:border-[#83b735]/40 transition-colors">Sales</a>
        </div>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('commandDrum', (config) => ({
                    items: config.items || [],
                    links: config.links || [],
                    activeIndex: 0,
                    touchStartY: 0,
                    get prevIndex() { return (this.activeIndex - 1 + this.items.length) % this.items.length; },
                    get nextIndex() { return (this.activeIndex + 1) % this.items.length; },
                    onWheel(e) {
                        e.preventDefault();
                        if (e.deltaY > 0) this.activeIndex = (this.activeIndex + 1) % this.items.length;
                        else if (e.deltaY < 0) this.activeIndex = (this.activeIndex - 1 + this.items.length) % this.items.length;
                    },
                    onTouchStart(e) { this.touchStartY = e.touches[0].clientY; },
                    onTouchEnd(e) {
                        const dy = e.changedTouches[0].clientY - this.touchStartY;
                        if (Math.abs(dy) > 30) this.activeIndex = dy > 0 ? (this.activeIndex - 1 + this.items.length) % this.items.length : (this.activeIndex + 1) % this.items.length;
                    },
                }));
            });
        </script>

        @php
            $cards = [
                ['label' => 'Contacts',  'value' => '156',  'sub' => 'Users & roles',     'delta' => '+12%'],
                ['label' => 'Inventory', 'value' => '48.2M', 'sub' => 'PKR stock value',  'delta' => '+1.4%'],
                ['label' => 'Commerce',  'value' => '182',  'sub' => "Today's orders",    'delta' => '+24'],
                ['label' => 'Accounts',  'value' => '7.4M', 'sub' => 'PKR receivables',   'delta' => '-0.3%'],
                ['label' => 'Ops',       'value' => '8',   'sub' => 'Active jobs',       'delta' => '+2'],
                ['label' => 'Insights',  'value' => '24',  'sub' => 'Reports this week', 'delta' => '+5'],
                ['label' => 'Settings', 'value' => '3',   'sub' => 'Integrations',      'delta' => 'OK'],
                ['label' => 'Platform', 'value' => '12',   'sub' => 'Pending approvals', 'delta' => 'Critical'],
            ];
            $drumTitles = ['CONTACTS', 'INVENTORY', 'COMMERCE', 'ACCOUNTS', 'HUMAN CAPITAL', 'OPERATIONS', 'INSIGHTS', 'PLATFORM'];
            $drumItems = [
                ['Users', 'Customers', 'Suppliers', 'Roles'],
                ['Current Stock', 'Add Items', 'Categories', 'Stock'],
                ['Sales', 'POS', 'Purchase Orders', 'Expenses'],
                ['Cash Book', 'Ledger', 'Bank Accounts', 'Profit / Loss'],
                ['HRM', 'Payroll', 'Attendance', 'Salaries'],
                ['Production', 'Quality Control', 'Maintenance', 'Projects'],
                ['Daily Reports', 'Audit Log', 'Analytics', 'Export'],
                ['Approvals', 'Staff', 'Helpdesk', 'Config'],
            ];
            $drumLinks = [
                [route('user-management.staff'), route('crm.customers'), route('procurement.suppliers'), route('user-management.roles')],
                [route('inventory.current-stock'), route('inventory.add-item'), route('inventory.categories'), route('inventory.current-stock')],
                [route('sales.pos'), route('pos.screen'), route('procurement.purchase-orders'), route('procurement.expenses')],
                [route('finance.cash-book'), route('finance.cash-book'), route('finance.bank-accounts'), route('finance.profit-loss')],
                [route('hrm.attendance'), route('payroll.salaries'), route('hrm.attendance'), route('hrm.salaries')],
                [route('production.work-orders'), route('quality.checks'), route('maintenance.schedule'), route('projects.list')],
                [route('reports.daily'), route('audit.activity'), route('reports.monthly'), route('reports.export')],
                [route('admin.approvals'), route('user-management.staff'), route('helpdesk.tickets'), route('settings.config')],
            ];
        @endphp

        {{-- 1. KPI cards: glass + tech HUD + 3D tilt & lift + fade-in --}}
        <section aria-label="Key performance indicators" class="erp-3d-scene grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-4 py-1">
            @foreach($cards as $card)
                <div
                    class="erp-card-3d erp-fade-in delay-{{ min($loop->iteration, 8) }} group relative rounded-2xl overflow-hidden"
                    style="backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); background: linear-gradient(165deg, rgba(255,255,255,0.14) 0%, rgba(255,255,255,0.08) 100%); border: 1px solid rgba(255,255,255,0.22); box-shadow: 0 4px 16px rgba(0,0,0,0.15), 0 12px 40px rgba(0,0,0,0.2), 0 0 0 1px rgba(255,255,255,0.05) inset, inset 0 1px 0 rgba(255,255,255,0.12);"
                >
                    {{-- Tech grid overlay (very subtle) --}}
                    <div class="absolute inset-0 opacity-[0.04] pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.8) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.8) 1px, transparent 1px); background-size: 12px 12px;" aria-hidden="true"></div>
                    {{-- Corner brackets (HUD style) --}}
                    <span class="absolute top-2 left-2 w-3 h-3 border-t-2 border-l-2 border-[#83b735]/60 rounded-tl pointer-events-none" aria-hidden="true"></span>
                    <span class="absolute top-2 right-2 w-3 h-3 border-t-2 border-r-2 border-[#83b735]/60 rounded-tr pointer-events-none" aria-hidden="true"></span>
                    <span class="absolute bottom-2 left-2 w-3 h-3 border-b-2 border-l-2 border-[#83b735]/60 rounded-bl pointer-events-none" aria-hidden="true"></span>
                    <span class="absolute bottom-2 right-2 w-3 h-3 border-b-2 border-r-2 border-[#83b735]/60 rounded-br pointer-events-none" aria-hidden="true"></span>
                    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-white/25 to-transparent" aria-hidden="true"></div>
                    <div class="relative p-3.5 border-b border-white/10">
                        <div class="flex items-center gap-1.5">
                            <span class="erp-dot w-1.5 h-1.5 rounded-full bg-[#83b735] flex-shrink-0" aria-hidden="true"></span>
                            <p class="text-[10px] font-bold uppercase tracking-widest text-[#83b735]" style="text-shadow: 0 0 20px rgba(131,183,53,0.3);">{{ $card['label'] }}</p>
                        </div>
                        <p class="mt-1.5 text-lg font-extrabold tabular-nums text-white leading-tight tracking-tight" style="font-variant-numeric: tabular-nums;">{{ $card['value'] }}</p>
                        <p class="text-[10px] text-white/60 mt-0.5 font-medium">{{ $card['sub'] }}</p>
                    </div>
                    @php
                        $isNegative = str_starts_with($card['delta'] ?? '', '-') || in_array(strtolower($card['delta'] ?? ''), ['critical'], true);
                    @endphp
                    <div class="relative px-3.5 py-2.5 flex items-center justify-between">
                        <span class="text-[10px] font-semibold uppercase tracking-wider {{ $isNegative ? 'text-red-400' : 'text-[#83b735]' }}">{{ $card['delta'] }}</span>
                    </div>
                    <div class="absolute inset-x-0 bottom-0 h-[2px] bg-gradient-to-r from-transparent via-[#83b735]/40 to-transparent opacity-80 group-hover:via-[#83b735]/60" aria-hidden="true"></div>
                </div>
            @endforeach
        </section>

        {{-- Thin green separator (section divider, not over text) --}}
        <div class="erp-separator h-px w-full rounded-full" style="background: linear-gradient(90deg, transparent 0%, rgba(131,183,53,0.6) 20%, #83b735 50%, rgba(131,183,53,0.6) 80%, transparent 100%); box-shadow: 0 0 12px rgba(131,183,53,0.3);" aria-hidden="true"></div>

        {{-- 2. Drums: glass + tech + 3D tilt & lift + fade-in --}}
        <section aria-label="Module drums" class="erp-3d-scene relative py-1">
            <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-4">
                @foreach($drumTitles as $i => $title)
                    <div
                        x-data="commandDrum({ items: {{ json_encode($drumItems[$i] ?? []) }}, links: {{ json_encode($drumLinks[$i] ?? []) }} })"
                        class="erp-drum-3d erp-fade-in delay-{{ min($i + 1, 8) }} flex flex-col rounded-2xl overflow-hidden relative"
                        style="backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); background: linear-gradient(180deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.06) 100%); border: 1px solid rgba(255,255,255,0.2); box-shadow: 0 4px 16px rgba(0,0,0,0.12), 0 10px 32px rgba(0,0,0,0.18), 0 0 0 1px rgba(255,255,255,0.04) inset, inset 0 1px 0 rgba(255,255,255,0.1);"
                    >
                        {{-- Subtle tech grid --}}
                        <div class="absolute inset-0 opacity-[0.03] pointer-events-none rounded-2xl" style="background-image: linear-gradient(rgba(255,255,255,0.6) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.6) 1px, transparent 1px); background-size: 8px 8px;" aria-hidden="true"></div>
                        <span class="absolute top-1.5 left-1.5 w-2.5 h-2.5 border-t border-l border-[#83b735]/50 rounded-tl pointer-events-none z-10" aria-hidden="true"></span>
                        <span class="absolute top-1.5 right-1.5 w-2.5 h-2.5 border-t border-r border-[#83b735]/50 rounded-tr pointer-events-none z-10" aria-hidden="true"></span>
                        <span class="absolute bottom-1.5 left-1.5 w-2.5 h-2.5 border-b border-l border-[#83b735]/50 rounded-bl pointer-events-none z-10" aria-hidden="true"></span>
                        <span class="absolute bottom-1.5 right-1.5 w-2.5 h-2.5 border-b border-r border-[#83b735]/50 rounded-br pointer-events-none z-10" aria-hidden="true"></span>
                        <div class="flex-shrink-0 h-11 flex items-center justify-center border-b border-white/15 relative" style="background: rgba(255,255,255,0.06); box-shadow: inset 0 1px 0 rgba(255,255,255,0.06);">
                            <span class="text-[10px] font-bold tracking-[0.16em] uppercase text-white/90">{{ $title }}</span>
                            <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-8 h-px bg-[#83b735]/50" aria-hidden="true"></div>
                        </div>
                        <div
                            class="relative h-28 flex flex-col justify-center overflow-hidden cursor-default touch-none"
                            @wheel.prevent="onWheel($event)"
                            @touchstart="onTouchStart($event)"
                            @touchend="onTouchEnd($event)"
                        >
                            <div class="absolute inset-0 top-0 h-1/3 bg-gradient-to-b from-black/40 to-transparent pointer-events-none z-10"></div>
                            <div class="absolute inset-0 bottom-0 h-1/3 bg-gradient-to-t from-black/40 to-transparent pointer-events-none z-10"></div>
                            <div class="flex-shrink-0 h-1/3 flex items-center justify-center">
                                <a :href="links[prevIndex] || '#'" class="text-[10px] font-medium text-white/50 hover:text-white/70 truncate max-w-full px-2 transition-colors" x-text="items[prevIndex]"></a>
                            </div>
                            <div class="flex-shrink-0 h-1/3 flex items-center justify-center relative z-10">
                                <a
                                    :href="links[activeIndex] || '#'"
                                    class="block w-full py-2 px-2 rounded-xl text-center text-xs font-bold text-[#83b735] truncate transition-all duration-200 hover:bg-[#83b735]/20 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#83b735]/50"
                                    style="background: rgba(131,183,53,0.15); border: 1px solid rgba(131,183,53,0.35); box-shadow: 0 0 24px rgba(131,183,53,0.2), inset 0 0 16px rgba(131,183,53,0.06);"
                                    x-text="items[activeIndex]"
                                ></a>
                            </div>
                            <div class="flex-shrink-0 h-1/3 flex items-center justify-center">
                                <a :href="links[nextIndex] || '#'" class="text-[10px] font-medium text-white/50 hover:text-white/70 truncate max-w-full px-2 transition-colors" x-text="items[nextIndex]"></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <footer class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-2 text-[11px] text-white/45">
            <p>Scroll or swipe on a drum to change · Tap highlighted item to open</p>
            <span class="hidden sm:inline text-white/30">·</span>
            <p class="font-medium text-white/50">Agricart ERP · 2026</p>
        </footer>
        <script>
            (function () {
                var el = document.getElementById('dashboard-datetime');
                function update() { if (el) { var d = new Date(); el.textContent = d.toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) + ' · ' + d.toTimeString().slice(0, 5); } }
                if (el) { update(); setInterval(update, 60000); }
            })();
        </script>
    </div>
@endsection
