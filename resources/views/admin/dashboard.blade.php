@extends('layouts.app')

@section('main_container_class')
    w-full max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12
@endsection

@section('content')
    {{--
        Role-based design: This view is exclusively for Admin/Owner access.
        Redirect is handled in the route (non-admin → dashboard). When roles exist, gate by $canAccessAdminDashboard or @can('accessAdminDashboard').
        Below: hide entire block when !$canAccessAdminDashboard so non-admins never see admin cards (fallback if they reach the view).
    --}}
    @if (!isset($canAccessAdminDashboard) || $canAccessAdminDashboard)
    <div class="admin-master-dashboard space-y-10" data-admin-only role="region" aria-label="Admin Master Dashboard">
        {{-- Page header --}}
        <header class="text-center">
            <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-white">
                Admin Master Dashboard
            </h1>
            <p class="mt-1 text-sm text-white/70">
                Central control unit for Agricart. High-level overview and quick access to system modules.
            </p>
        </header>

        {{-- TOP TIER: Executive Summary (Admin only) – 4–6 small KPI cards --}}
        <section class="executive-summary" aria-label="Executive summary">
            <h2 class="sr-only">Executive Summary</h2>
            <div class="flex gap-4 overflow-x-auto pb-2 scrollbar-none -mx-1 px-1 sm:grid sm:grid-cols-2 lg:grid-cols-4 sm:overflow-visible">
                <div class="kpi-card flex-shrink-0 w-[220px] sm:w-auto rounded-xl backdrop-blur-xl bg-white/10 border border-white/20 p-4">
                    <p class="text-[10px] font-semibold uppercase tracking-widest text-amber-400/90">Critical</p>
                    <p class="mt-1 text-xl font-bold text-white">Pending Approvals</p>
                    <p class="mt-1 text-2xl font-extrabold text-white tabular-nums">12</p>
                    <p class="mt-0.5 text-xs text-white/60">Require your action</p>
                </div>
                <div class="kpi-card flex-shrink-0 w-[220px] sm:w-auto rounded-xl backdrop-blur-xl bg-white/10 border border-white/20 p-4">
                    <p class="text-[10px] font-semibold uppercase tracking-widest text-white/60">Vendors</p>
                    <p class="mt-1 text-xl font-bold text-white">Total Registered Vendors</p>
                    <p class="mt-1 text-2xl font-extrabold text-white tabular-nums">48</p>
                    <p class="mt-0.5 text-xs text-white/60">Active suppliers</p>
                </div>
                <div class="kpi-card flex-shrink-0 w-[220px] sm:w-auto rounded-xl backdrop-blur-xl bg-white/10 border border-white/20 p-4">
                    <p class="text-[10px] font-semibold uppercase tracking-widest text-white/60">Inventory</p>
                    <p class="mt-1 text-xl font-bold text-white">Low Stock Notifications</p>
                    <p class="mt-1 text-2xl font-extrabold text-rose-300 tabular-nums">7</p>
                    <p class="mt-0.5 text-xs text-white/60">Items below threshold</p>
                </div>
                <div class="kpi-card flex-shrink-0 w-[220px] sm:w-auto rounded-xl backdrop-blur-xl bg-white/10 border border-white/20 p-4">
                    <p class="text-[10px] font-semibold uppercase tracking-widest text-white/60">Activity</p>
                    <p class="mt-1 text-xl font-bold text-white">Today's System Traffic</p>
                    <p class="mt-1 text-2xl font-extrabold text-white tabular-nums">1,842</p>
                    <p class="mt-0.5 text-xs text-white/60">Sessions today</p>
                </div>
            </div>
        </section>

        {{-- SECOND TIER: System Modules (Action Grid) – exact order: Approvals, Users, Inventory, Purchase, Sales, Reports --}}
        <section class="system-modules" aria-label="System modules">
            <h2 class="text-xs font-semibold uppercase tracking-[0.2em] text-white/70 mb-5">
                System Modules
            </h2>
            @php
                $adminModules = [
                    [
                        'title' => 'Approvals',
                        'description' => 'Review and approve pending requests. Priority module for admin action.',
                        'icon' => 'check-circle',
                        'url' => route('admin.approvals'),
                    ],
                    [
                        'title' => 'Users',
                        'description' => 'Staff accounts, roles, and permissions.',
                        'icon' => 'user-group',
                        'url' => route('user-management.staff'),
                    ],
                    [
                        'title' => 'Inventory',
                        'description' => 'Product central: stock levels, items, and categories.',
                        'icon' => 'archive-box',
                        'url' => route('inventory.current-stock'),
                    ],
                    [
                        'title' => 'Purchase',
                        'description' => 'Procurement: purchase orders, suppliers, and expenses.',
                        'icon' => 'truck',
                        'url' => route('procurement.purchase-orders'),
                    ],
                    [
                        'title' => 'Sales',
                        'description' => 'Revenue and invoicing: POS, invoices, and sales reports.',
                        'icon' => 'shopping-cart',
                        'url' => route('sales.pos'),
                    ],
                    [
                        'title' => 'Reports',
                        'description' => 'Full analytics: daily summaries, monthly reports, and exports.',
                        'icon' => 'chart-bar',
                        'url' => route('reports.daily'),
                    ],
                ];
            @endphp
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($adminModules as $card)
                    <a
                        href="{{ $card['url'] }}"
                        class="admin-module-card group block p-6 rounded-2xl backdrop-blur-xl bg-white/15 border border-white/25 hover:border-[#83b735]/60 hover:bg-white/20 transition-all duration-300 hover:scale-[1.03] hover:shadow-[0_0_40px_rgba(131,183,53,0.25)] text-left"
                    >
                        <span class="flex items-center justify-center w-20 h-20 rounded-2xl bg-white/10 border border-white/20 group-hover:bg-[#83b735]/20 group-hover:border-[#83b735]/50 transition-all duration-300 text-white group-hover:text-[#83b735] shadow-[0_8px_24px_rgba(0,0,0,0.2),0_4px_8px_rgba(255,255,255,0.05)_inset] group-hover:shadow-[0_12px_32px_rgba(0,0,0,0.25),0_0_20px_rgba(131,183,53,0.15)]">
                            <x-heroicon name="{{ $card['icon'] }}" class="w-10 h-10" />
                        </span>
                        <h3 class="mt-4 text-lg font-bold tracking-tight text-white group-hover:text-[#83b735] transition-colors duration-300">
                            {{ $card['title'] }}
                        </h3>
                        <p class="mt-2 text-sm font-medium text-white/80 leading-snug">
                            {{ $card['description'] }}
                        </p>
                    </a>
                @endforeach
            </div>
        </section>
    </div>
    @else
    <div class="rounded-2xl backdrop-blur-xl bg-white/10 border border-white/20 p-8 text-center text-white/80">
        <p>You do not have access to the Admin Master Dashboard. You have been redirected to your dashboard.</p>
        <a href="{{ route('dashboard') }}" class="mt-4 inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold text-[#83b735] border border-[#83b735]/50 hover:bg-[#83b735]/20 transition-all">Go to Dashboard</a>
    </div>
    @endif

    <style>
        .scrollbar-none { scrollbar-width: none; -ms-overflow-style: none; }
        .scrollbar-none::-webkit-scrollbar { width: 0; height: 0; }
    </style>
@endsection
