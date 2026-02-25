@extends('layouts.app')

@section('main_container_class')
    w-full max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12
@endsection

@section('content')
    {{-- Admin Master View: Full dashboard with all modules. Roles and permissions to be applied later. --}}
    <div class="space-y-10">
        {{-- Page header --}}
        <div class="text-center">
            <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-white">
                Command Center
            </h1>
            <p class="mt-1 text-sm text-white/70">
                High-level overview and direct access to all modules.
            </p>
        </div>

        {{-- TOP ROW: 8 Analytics Cards — 3D Mechanical Master Lock Aesthetic --}}
        <section
            x-data="{
                cards: [
                    { title: 'Pending Approvals', icon: '⚡', value: '12',        delta: '+3',    deltaDir: 'up',   note: 'Critical · action needed' },
                    { title: 'Inventory Value',   icon: '📦', value: 'PKR 48.2M', delta: '+1.4%', deltaDir: 'up',   note: 'Total stock valuation' },
                    { title: 'Today\'s Orders',   icon: '🛒', value: '182',        delta: '+24',   deltaDir: 'up',   note: 'vs. yesterday 158' },
                    { title: 'Receivables',       icon: '💰', value: 'PKR 7.4M',  delta: '-0.3%', deltaDir: 'down', note: 'Outstanding invoices' },
                    { title: 'Low Stock Alerts',  icon: '⚠️', value: '7',          delta: '+2',    deltaDir: 'down', note: 'Items below threshold' },
                    { title: 'System Traffic',    icon: '📊', value: '1,842',      delta: '+211',  deltaDir: 'up',   note: 'Requests today' },
                    { title: 'Active Sessions',   icon: '👤', value: '34',         delta: '-5',    deltaDir: 'down', note: 'Logged-in users now' },
                    { title: 'Revenue Today',     icon: '📈', value: 'PKR 2.1M',  delta: '+8.2%', deltaDir: 'up',   note: 'Gross daily revenue' },
                ]
            }"
            aria-label="Key performance indicators"
            class="relative"
        >
            {{-- Laser line behind cards --}}
            <div class="absolute inset-x-0 top-1/2 -translate-y-1/2 h-px pointer-events-none"
                 style="background:linear-gradient(90deg,transparent 0%,rgba(158,248,112,.4) 15%,rgba(158,248,112,.7) 50%,rgba(158,248,112,.4) 85%,transparent 100%);box-shadow:0 0 14px 3px rgba(158,248,112,.3);"></div>

            <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-3 relative z-10">
                <template x-for="card in cards" :key="card.title">
                    <div
                        class="group relative flex flex-col rounded-2xl border border-white/10 ring-1 ring-lime-400/20 backdrop-blur-xl overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:ring-lime-400/50 hover:border-lime-400/30"
                        style="background:linear-gradient(160deg,rgba(30,41,59,.92) 0%,rgba(15,23,42,.97) 100%);box-shadow:inset 0 1px 0 rgba(255,255,255,.08),inset 0 -1px 0 rgba(0,0,0,.4),0 8px 32px rgba(0,0,0,.6);"
                    >
                        {{-- Top bevel highlight --}}
                        <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-white/20 to-transparent pointer-events-none"></div>

                        <div class="flex items-start gap-2 p-3 pb-2">
                            {{-- Icon slot --}}
                            <div class="flex-shrink-0 w-9 h-9 rounded-xl flex items-center justify-center text-lg ring-1 ring-lime-400/25 group-hover:ring-lime-400/60 transition-all duration-300"
                                 style="background:linear-gradient(135deg,rgba(158,248,112,.12) 0%,rgba(158,248,112,.04) 100%);box-shadow:0 0 10px rgba(158,248,112,.1);"
                                 x-text="card.icon"></div>
                            <div class="min-w-0 flex-1">
                                <p class="text-[9px] font-semibold uppercase tracking-widest text-lime-400/70 truncate" x-text="card.title"></p>
                                <p class="mt-0.5 text-base font-extrabold tabular-nums text-white leading-tight" x-text="card.value"></p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between px-3 py-2 border-t border-white/5">
                            <span class="text-[11px] font-bold tabular-nums"
                                  :class="card.deltaDir === 'up' ? 'text-lime-400' : 'text-rose-400'"
                                  x-text="(card.deltaDir === 'up' ? '▲ ' : '▼ ') + card.delta"></span>
                            <span class="text-[9px] text-white/35 truncate ml-1" x-text="card.note"></span>
                        </div>

                        {{-- Bottom green base glow --}}
                        <div class="absolute inset-x-0 bottom-0 h-[2px] pointer-events-none"
                             style="background:linear-gradient(90deg,transparent 10%,rgba(158,248,112,.6) 50%,transparent 90%);box-shadow:0 0 8px 1px rgba(158,248,112,.3);"></div>
                    </div>
                </template>
            </div>
        </section>

        {{-- 8-DRUM ODOMETER CONTROL SECTION --}}
        <section
            x-data="{
                drums: [
                    { label: 'Contacts',  rows: ['Leads','CRM','Partners'],    active: 1 },
                    { label: 'Inventory', rows: ['Items','Stock','Warehouse'],  active: 1 },
                    { label: 'Commerce',  rows: ['Sales','POS','Orders'],       active: 1 },
                    { label: 'Accounts',  rows: ['Finance','Payroll','Audit'],  active: 1 },
                    { label: 'Ops',       rows: ['Fleet','Maint.','Supply'],    active: 1 },
                    { label: 'Insights',  rows: ['Reports','Analytics','KPIs'], active: 1 },
                    { label: 'Settings',  rows: ['Config','Themes','API'],      active: 1 },
                    { label: 'Platform',  rows: ['Users','Roles','Helpdesk'],   active: 1 },
                ]
            }"
            aria-label="Module control drums"
            class="relative"
        >
            {{-- Laser line through drums --}}
            <div class="absolute inset-x-0 top-1/2 -translate-y-1/2 h-[2px] pointer-events-none"
                 style="background:linear-gradient(90deg,transparent 0%,rgba(158,248,112,.5) 10%,rgba(158,248,112,.85) 50%,rgba(158,248,112,.5) 90%,transparent 100%);box-shadow:0 0 16px 4px rgba(158,248,112,.35),0 0 32px 6px rgba(158,248,112,.12);z-index:5;"></div>

            <div class="grid grid-cols-4 lg:grid-cols-8 gap-3 relative z-10">
                <template x-for="drum in drums" :key="drum.label">
                    <div class="flex flex-col items-center gap-1">
                        <p class="text-[9px] font-bold uppercase tracking-[.18em] text-lime-400/65 mb-1 truncate" x-text="drum.label"></p>

                        {{-- Drum capsule --}}
                        <div class="relative w-full rounded-3xl overflow-hidden ring-1 ring-white/10"
                             style="background:linear-gradient(180deg,rgba(15,23,42,.95) 0%,rgba(30,41,59,.9) 50%,rgba(15,23,42,.95) 100%);box-shadow:inset 0 2px 4px rgba(0,0,0,.6),inset 0 -2px 4px rgba(0,0,0,.4),0 4px 20px rgba(0,0,0,.5),inset 1px 0 0 rgba(255,255,255,.06),inset -1px 0 0 rgba(255,255,255,.03);">
                            {{-- Top bevel --}}
                            <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-white/15 to-transparent pointer-events-none"></div>
                            {{-- Bottom bevel --}}
                            <div class="absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-transparent via-white/5 to-transparent pointer-events-none"></div>

                            <template x-for="(row, idx) in drum.rows" :key="idx">
                                <button
                                    type="button"
                                    :aria-label="drum.label + ': ' + row"
                                    @click="drum.active = idx"
                                    class="relative w-full px-2 py-2.5 text-center text-xs font-semibold transition-all duration-200 focus:outline-none focus-visible:ring-1 focus-visible:ring-lime-400/60 truncate"
                                    :class="idx === drum.active ? 'text-lime-300 tracking-wider' : 'text-white/30 hover:text-white/55'"
                                    :style="idx === drum.active
                                        ? 'background:linear-gradient(90deg,rgba(158,248,112,.07) 0%,rgba(158,248,112,.14) 50%,rgba(158,248,112,.07) 100%);box-shadow:inset 0 1px 0 rgba(158,248,112,.2),inset 0 -1px 0 rgba(158,248,112,.1);text-shadow:0 0 8px rgba(158,248,112,.9);'
                                        : ''"
                                    x-text="row"
                                ></button>
                            </template>
                        </div>
                    </div>
                </template>
            </div>
        </section>

        @php
            $cardClass = 'group block p-5 rounded-2xl backdrop-blur-xl bg-white/15 border border-white/25 hover:border-[#83b735]/60 hover:bg-white/20 transition-all duration-300 hover:scale-[1.03] hover:shadow-[0_0_40px_rgba(131,183,53,0.25)] text-left';
            $iconClass = 'flex items-center justify-center w-16 h-16 rounded-2xl bg-white/10 border border-white/20 group-hover:bg-[#83b735]/20 group-hover:border-[#83b735]/50 transition-all duration-300 text-white group-hover:text-[#83b735] shadow-[0_8px_24px_rgba(0,0,0,0.2)] group-hover:shadow-[0_0_20px_rgba(131,183,53,0.15)]';

            $dailyOperations = [
                ['title' => 'Sales', 'description' => 'Invoices, sales tracking, and reports.', 'icon' => 'shopping-cart', 'url' => route('sales.pos')],
                ['title' => 'POS', 'description' => 'Point of sale screen and sessions.', 'icon' => 'computer-desktop', 'url' => route('pos.screen')],
                ['title' => 'Orders', 'description' => 'Customer orders and invoices.', 'icon' => 'clipboard-document-list', 'url' => route('sales.invoices')],
                ['title' => 'Inventory', 'description' => 'Stock levels, items, and categories.', 'icon' => 'archive-box', 'url' => route('inventory.current-stock')],
                ['title' => 'Procurement', 'description' => 'Purchase orders, suppliers, expenses.', 'icon' => 'truck', 'url' => route('procurement.purchase-orders')],
                ['title' => 'Supply Chain', 'description' => 'Supply map, suppliers, and orders.', 'icon' => 'globe-alt', 'url' => route('supply-chain.map')],
                ['title' => 'Production', 'description' => 'Work orders, BOM, and tracking.', 'icon' => 'wrench-screwdriver', 'url' => route('production.work-orders')],
            ];

            $administrative = [
                ['title' => 'Approvals', 'description' => 'Pending approvals requiring admin action.', 'icon' => 'check-circle', 'url' => route('admin.approvals')],
                ['title' => 'User Management', 'description' => 'Staff, roles, and permissions.', 'icon' => 'user-group', 'url' => route('user-management.staff')],
                ['title' => 'CRM', 'description' => 'Customers, leads, and communications.', 'icon' => 'chat-bubble-left-right', 'url' => route('crm.customers')],
                ['title' => 'HRM', 'description' => 'Attendance, salaries, and leave.', 'icon' => 'briefcase', 'url' => route('hrm.attendance')],
                ['title' => 'Assets Management', 'description' => 'Assets, vehicles, and machinery.', 'icon' => 'building-office-2', 'url' => route('assets.list')],
                ['title' => 'Fleet & Transport', 'description' => 'Vehicles, fuel log, and drivers.', 'icon' => 'arrow-path', 'url' => route('fleet.vehicles')],
                ['title' => 'Maintenance', 'description' => 'Schedule, work orders, and history.', 'icon' => 'clipboard-document-check', 'url' => route('maintenance.schedule')],
                ['title' => 'Document Vault', 'description' => 'Documents, contracts, and licenses.', 'icon' => 'folder-open', 'url' => route('documents.list')],
                ['title' => 'Marketing', 'description' => 'Campaigns, templates, and analytics.', 'icon' => 'megaphone', 'url' => route('marketing.campaigns')],
                ['title' => 'Helpdesk', 'description' => 'Tickets and knowledge base.', 'icon' => 'lifebuoy', 'url' => route('helpdesk.tickets')],
                ['title' => 'Quality Control', 'description' => 'Quality checks and inspections.', 'icon' => 'shield-check', 'url' => route('quality.checks')],
                ['title' => 'Project Management', 'description' => 'Projects, tasks, and timeline.', 'icon' => 'calendar-days', 'url' => route('projects.list')],
                ['title' => 'Settings', 'description' => 'Company profile and configuration.', 'icon' => 'cog-6-tooth', 'url' => route('settings.company')],
                ['title' => 'Appearance & Themes', 'description' => 'Themes, wallpapers, and colors.', 'icon' => 'paint-brush', 'url' => route('appearance.themes')],
                ['title' => 'API & Sync Manager', 'description' => 'WooCommerce, Amazon, Alibaba.', 'icon' => 'puzzle-piece', 'url' => route('api.integrations')],
                ['title' => 'Notifications', 'description' => 'WhatsApp, email, and system alerts.', 'icon' => 'bell', 'url' => route('notifications.whatsapp')],
            ];

            $analysis = [
                ['title' => 'Reports', 'description' => 'Daily summary, analytics, and export.', 'icon' => 'chart-bar', 'url' => route('reports.daily')],
                ['title' => 'Financials', 'description' => 'Cash book, P&L, and bank accounts.', 'icon' => 'banknotes', 'url' => route('finance.cash-book')],
                ['title' => 'Audit Log', 'description' => 'Activity log and system changes.', 'icon' => 'clipboard-document-list', 'url' => route('audit.activity')],
                ['title' => 'Payroll & Loans', 'description' => 'Payroll, advances, and loans.', 'icon' => 'credit-card', 'url' => route('payroll.salaries')],
            ];
        @endphp

        {{-- DAILY OPERATIONS --}}
        <section>
            <h2 class="text-xs font-semibold uppercase tracking-[0.2em] text-white/70 mb-4">
                Daily Operations
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach($dailyOperations as $card)
                    <a href="{{ $card['url'] }}" class="{{ $cardClass }}">
                        <span class="{{ $iconClass }}"><x-heroicon name="{{ $card['icon'] }}" class="w-8 h-8" /></span>
                        <h3 class="mt-3 text-base font-bold tracking-tight text-white group-hover:text-[#83b735] transition-colors">{{ $card['title'] }}</h3>
                        <p class="mt-1.5 text-sm font-medium text-white/80 leading-snug">{{ $card['description'] }}</p>
                    </a>
                @endforeach
            </div>
        </section>

        {{-- ADMINISTRATIVE --}}
        <section>
            <h2 class="text-xs font-semibold uppercase tracking-[0.2em] text-white/70 mb-4">
                Administrative
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach($administrative as $card)
                    <a href="{{ $card['url'] }}" class="{{ $cardClass }}">
                        <span class="{{ $iconClass }}"><x-heroicon name="{{ $card['icon'] }}" class="w-8 h-8" /></span>
                        <h3 class="mt-3 text-base font-bold tracking-tight text-white group-hover:text-[#83b735] transition-colors">{{ $card['title'] }}</h3>
                        <p class="mt-1.5 text-sm font-medium text-white/80 leading-snug">{{ $card['description'] }}</p>
                    </a>
                @endforeach
            </div>
        </section>

        {{-- ANALYSIS --}}
        <section>
            <h2 class="text-xs font-semibold uppercase tracking-[0.2em] text-white/70 mb-4">
                Analysis
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach($analysis as $card)
                    <a href="{{ $card['url'] }}" class="{{ $cardClass }}">
                        <span class="{{ $iconClass }}"><x-heroicon name="{{ $card['icon'] }}" class="w-8 h-8" /></span>
                        <h3 class="mt-3 text-base font-bold tracking-tight text-white group-hover:text-[#83b735] transition-colors">{{ $card['title'] }}</h3>
                        <p class="mt-1.5 text-sm font-medium text-white/80 leading-snug">{{ $card['description'] }}</p>
                    </a>
                @endforeach
            </div>
        </section>
    </div>
@endsection
