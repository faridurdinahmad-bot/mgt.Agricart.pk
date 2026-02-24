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

        {{-- TOP ROW: 6 KPI cards --}}
        <section class="kpi-row" aria-label="Key performance indicators">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                <div class="rounded-xl backdrop-blur-xl bg-white/10 border border-white/20 p-4">
                    <p class="text-[10px] font-semibold uppercase tracking-widest text-amber-400/90">Critical</p>
                    <p class="mt-1 text-sm font-bold text-white">Pending Approvals</p>
                    <p class="mt-1 text-xl font-extrabold text-white tabular-nums">12</p>
                </div>
                <div class="rounded-xl backdrop-blur-xl bg-white/10 border border-white/20 p-4">
                    <p class="text-[10px] font-semibold uppercase tracking-widest text-white/60">Inventory</p>
                    <p class="mt-1 text-sm font-bold text-white">Total Inventory Value</p>
                    <p class="mt-1 text-xl font-extrabold text-white tabular-nums">PKR 48.2M</p>
                </div>
                <div class="rounded-xl backdrop-blur-xl bg-white/10 border border-white/20 p-4">
                    <p class="text-[10px] font-semibold uppercase tracking-widest text-white/60">Orders</p>
                    <p class="mt-1 text-sm font-bold text-white">Today's Orders</p>
                    <p class="mt-1 text-xl font-extrabold text-white tabular-nums">182</p>
                </div>
                <div class="rounded-xl backdrop-blur-xl bg-white/10 border border-white/20 p-4">
                    <p class="text-[10px] font-semibold uppercase tracking-widest text-white/60">Finance</p>
                    <p class="mt-1 text-sm font-bold text-white">Receivables</p>
                    <p class="mt-1 text-xl font-extrabold text-white tabular-nums">PKR 7.4M</p>
                </div>
                <div class="rounded-xl backdrop-blur-xl bg-white/10 border border-white/20 p-4">
                    <p class="text-[10px] font-semibold uppercase tracking-widest text-white/60">Stock</p>
                    <p class="mt-1 text-sm font-bold text-white">Low Stock Alerts</p>
                    <p class="mt-1 text-xl font-extrabold text-rose-300 tabular-nums">7</p>
                </div>
                <div class="rounded-xl backdrop-blur-xl bg-white/10 border border-white/20 p-4">
                    <p class="text-[10px] font-semibold uppercase tracking-widest text-white/60">Activity</p>
                    <p class="mt-1 text-sm font-bold text-white">System Traffic Today</p>
                    <p class="mt-1 text-xl font-extrabold text-white tabular-nums">1,842</p>
                </div>
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
