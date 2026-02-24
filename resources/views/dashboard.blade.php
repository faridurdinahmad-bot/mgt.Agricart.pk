@extends('layouts.app')

@section('content')
    {{-- Admin / Dashboard Shell --}}
    <section class="space-y-8">
        {{-- Top bar --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.28em] text-white/70 mb-1">
                    Admin Control Center
                </p>
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold tracking-tight">
                    Central Operations Dashboard
                </h1>
                <p class="mt-2 text-sm sm:text-base text-white/80 max-w-2xl">
                    High-level overview of your ERP. Click a module card to open its sub-menu.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <button type="button" class="inline-flex items-center px-4 py-2 rounded-full text-xs sm:text-sm font-semibold tracking-wide backdrop-blur-md bg-white/20 border border-white/30 hover:bg-white/25 hover:text-[#83b735] transition-all">
                    Switch Company
                </button>
                <button type="button" class="inline-flex items-center px-4 py-2 rounded-full text-xs sm:text-sm font-semibold tracking-wide text-black bg-[#83b735] hover:bg-[#74a62f] shadow-[0_16px_40px_rgba(131,183,53,0.5)] transition-all">
                    New Entry
                </button>
            </div>
        </div>

        {{-- KPI row --}}
        <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-4">
            <div class="rounded-2xl backdrop-blur-md bg-white/20 border border-white/30 p-4 flex flex-col gap-2">
                <p class="text-[11px] font-medium uppercase tracking-[0.22em] text-white/70">Inventory Value</p>
                <p class="text-2xl font-semibold">PKR 48.2M</p>
                <p class="text-[11px] text-emerald-300">+6.3% vs last 30 days</p>
            </div>
            <div class="rounded-2xl backdrop-blur-md bg-white/20 border border-white/30 p-4 flex flex-col gap-2">
                <p class="text-[11px] font-medium uppercase tracking-[0.22em] text-white/70">Today’s Orders</p>
                <p class="text-2xl font-semibold">182</p>
                <p class="text-[11px] text-emerald-300">96% on-time fulfillment</p>
            </div>
            <div class="rounded-2xl backdrop-blur-md bg-white/20 border border-white/30 p-4 flex flex-col gap-2">
                <p class="text-[11px] font-medium uppercase tracking-[0.22em] text-white/70">Receivables</p>
                <p class="text-2xl font-semibold">PKR 7.4M</p>
                <p class="text-[11px] text-rose-200">18 invoices overdue</p>
            </div>
        </div>

        {{-- 25 Module Cards: Responsive grid (1 → 5 columns) --}}
        <div>
            <h2 class="text-sm font-semibold uppercase tracking-[0.22em] text-white/80 mb-4">Modules</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @php
                    $modules = [
                        [
                            'title' => 'User Management',
                            'description' => 'Manage staff accounts, roles, and permissions.',
                            'icon' => 'user-group',
                            'links' => [
                                ['label' => 'Roles', 'url' => route('user-management.roles')],
                                ['label' => 'Permissions', 'url' => route('user-management.permissions')],
                                ['label' => 'Staff List', 'url' => route('user-management.staff')],
                            ],
                        ],
                        [
                            'title' => 'Inventory',
                            'description' => 'Track stock levels, items, and categories.',
                            'icon' => 'archive-box',
                            'links' => [
                                ['label' => 'Current Stock', 'url' => route('inventory.current-stock')],
                                ['label' => 'Add Item', 'url' => route('inventory.add-item')],
                                ['label' => 'Categories', 'url' => route('inventory.categories')],
                            ],
                        ],
                        [
                            'title' => 'Sales',
                            'description' => 'Handle invoices, POS, and sales tracking.',
                            'icon' => 'shopping-cart',
                            'links' => [
                                ['label' => 'Point of Sale', 'url' => route('sales.pos')],
                                ['label' => 'Invoices', 'url' => route('sales.invoices')],
                                ['label' => 'Sales Report', 'url' => route('sales.report')],
                            ],
                        ],
                        [
                            'title' => 'Procurement',
                            'description' => 'Manage suppliers and purchase orders.',
                            'icon' => 'truck',
                            'links' => [
                                ['label' => 'Purchase Orders', 'url' => route('procurement.purchase-orders')],
                                ['label' => 'Suppliers', 'url' => route('procurement.suppliers')],
                                ['label' => 'Expenses', 'url' => route('procurement.expenses')],
                            ],
                        ],
                        [
                            'title' => 'Finance',
                            'description' => 'Track expenses, profits, and bank accounts.',
                            'icon' => 'banknotes',
                            'links' => [
                                ['label' => 'Cash Book', 'url' => route('finance.cash-book')],
                                ['label' => 'Profit/Loss', 'url' => route('finance.profit-loss')],
                                ['label' => 'Bank Accounts', 'url' => route('finance.bank-accounts')],
                            ],
                        ],
                        [
                            'title' => 'CRM',
                            'description' => 'Manage customer data and communications.',
                            'icon' => 'chat-bubble-left-right',
                            'links' => [
                                ['label' => 'Customers List', 'url' => route('crm.customers')],
                                ['label' => 'Leads', 'url' => route('crm.leads')],
                                ['label' => 'Communications', 'url' => route('crm.communications')],
                            ],
                        ],
                        [
                            'title' => 'HRM',
                            'description' => 'Track employee attendance, leaves, and payroll.',
                            'icon' => 'briefcase',
                            'links' => [
                                ['label' => 'Employee Attendance', 'url' => route('hrm.attendance')],
                                ['label' => 'Salaries', 'url' => route('hrm.salaries')],
                                ['label' => 'Leave Requests', 'url' => route('hrm.leave-requests')],
                            ],
                        ],
                        [
                            'title' => 'Production',
                            'description' => 'Monitor manufacturing and work orders.',
                            'icon' => 'wrench-screwdriver',
                            'links' => [
                                ['label' => 'Work Orders', 'url' => route('production.work-orders')],
                                ['label' => 'Bill of Materials', 'url' => route('production.bom')],
                                ['label' => 'Tracking', 'url' => route('production.tracking')],
                            ],
                        ],
                        [
                            'title' => 'Reports',
                            'description' => 'View business analytics and daily summaries.',
                            'icon' => 'chart-bar',
                            'links' => [
                                ['label' => 'Daily Summary', 'url' => route('reports.daily')],
                                ['label' => 'Monthly Analytics', 'url' => route('reports.monthly')],
                                ['label' => 'Custom Export', 'url' => route('reports.export')],
                            ],
                        ],
                        [
                            'title' => 'Settings',
                            'description' => 'Configure app settings and company profile.',
                            'icon' => 'cog-6-tooth',
                            'links' => [
                                ['label' => 'Company Profile', 'url' => route('settings.company')],
                                ['label' => 'Language', 'url' => route('settings.language')],
                                ['label' => 'App Configuration', 'url' => route('settings.config')],
                            ],
                        ],
                        [
                            'title' => 'Assets Management',
                            'description' => 'Track company assets, vehicles, and machinery.',
                            'icon' => 'building-office-2',
                            'links' => [
                                ['label' => 'Assets List', 'url' => route('assets.list')],
                                ['label' => 'Vehicles', 'url' => route('assets.vehicles')],
                                ['label' => 'Machinery', 'url' => route('assets.machinery')],
                            ],
                        ],
                        [
                            'title' => 'Quality Control',
                            'description' => 'Monitor product quality and standards.',
                            'icon' => 'shield-check',
                            'links' => [
                                ['label' => 'Quality Checks', 'url' => route('quality.checks')],
                                ['label' => 'Standards', 'url' => route('quality.standards')],
                                ['label' => 'Inspections', 'url' => route('quality.inspections')],
                            ],
                        ],
                        [
                            'title' => 'Project Management',
                            'description' => 'Manage tasks, deadlines, and project progress.',
                            'icon' => 'calendar-days',
                            'links' => [
                                ['label' => 'Projects', 'url' => route('projects.list')],
                                ['label' => 'Tasks', 'url' => route('projects.tasks')],
                                ['label' => 'Timeline', 'url' => route('projects.timeline')],
                            ],
                        ],
                        [
                            'title' => 'Fleet & Transport',
                            'description' => 'Manage vehicle tracking, fuel, and drivers.',
                            'icon' => 'arrow-path',
                            'links' => [
                                ['label' => 'Vehicles', 'url' => route('fleet.vehicles')],
                                ['label' => 'Fuel Log', 'url' => route('fleet.fuel-log')],
                                ['label' => 'Drivers', 'url' => route('fleet.drivers')],
                            ],
                        ],
                        [
                            'title' => 'Maintenance',
                            'description' => 'Schedule machinery service and repairs.',
                            'icon' => 'clipboard-document-check',
                            'links' => [
                                ['label' => 'Schedule', 'url' => route('maintenance.schedule')],
                                ['label' => 'Work Orders', 'url' => route('maintenance.work-orders')],
                                ['label' => 'History', 'url' => route('maintenance.history')],
                            ],
                        ],
                        [
                            'title' => 'Document Vault',
                            'description' => 'Securely store contracts, licenses, and documents.',
                            'icon' => 'folder-open',
                            'links' => [
                                ['label' => 'Documents', 'url' => route('documents.list')],
                                ['label' => 'Contracts', 'url' => route('documents.contracts')],
                                ['label' => 'Licenses', 'url' => route('documents.licenses')],
                            ],
                        ],
                        [
                            'title' => 'Marketing',
                            'description' => 'Manage SMS/Email campaigns and promotions.',
                            'icon' => 'megaphone',
                            'links' => [
                                ['label' => 'Campaigns', 'url' => route('marketing.campaigns')],
                                ['label' => 'Templates', 'url' => route('marketing.templates')],
                                ['label' => 'Analytics', 'url' => route('marketing.analytics')],
                            ],
                        ],
                        [
                            'title' => 'Audit Log',
                            'description' => 'Track all user activities and system changes.',
                            'icon' => 'clipboard-document-list',
                            'links' => [
                                ['label' => 'Activity Log', 'url' => route('audit.activity')],
                                ['label' => 'Changes', 'url' => route('audit.changes')],
                                ['label' => 'Export', 'url' => route('audit.export')],
                            ],
                        ],
                        [
                            'title' => 'Payroll & Loans',
                            'description' => 'Handle employee salaries, advances, and loans.',
                            'icon' => 'credit-card',
                            'links' => [
                                ['label' => 'Payroll', 'url' => route('payroll.salaries')],
                                ['label' => 'Advances', 'url' => route('payroll.advances')],
                                ['label' => 'Loans', 'url' => route('payroll.loans')],
                            ],
                        ],
                        [
                            'title' => 'POS (Point of Sale)',
                            'description' => 'Fast-track billing for retail counters.',
                            'icon' => 'computer-desktop',
                            'links' => [
                                ['label' => 'POS Screen', 'url' => route('pos.screen')],
                                ['label' => 'Sessions', 'url' => route('pos.sessions')],
                                ['label' => 'Daily Summary', 'url' => route('pos.daily-summary')],
                            ],
                        ],
                        [
                            'title' => 'Helpdesk',
                            'description' => 'Manage customer support tickets and resolutions.',
                            'icon' => 'lifebuoy',
                            'links' => [
                                ['label' => 'Tickets', 'url' => route('helpdesk.tickets')],
                                ['label' => 'Knowledge Base', 'url' => route('helpdesk.knowledge-base')],
                                ['label' => 'Reports', 'url' => route('helpdesk.reports')],
                            ],
                        ],
                        [
                            'title' => 'Supply Chain',
                            'description' => 'Track the journey from supplier to customer.',
                            'icon' => 'globe-alt',
                            'links' => [
                                ['label' => 'Supply Map', 'url' => route('supply-chain.map')],
                                ['label' => 'Suppliers', 'url' => route('supply-chain.suppliers')],
                                ['label' => 'Orders', 'url' => route('supply-chain.orders')],
                            ],
                        ],
                        [
                            'title' => 'Appearance & Themes',
                            'description' => 'Change wallpapers, colors, and system UI.',
                            'icon' => 'paint-brush',
                            'links' => [
                                ['label' => 'Themes', 'url' => route('appearance.themes')],
                                ['label' => 'Wallpapers', 'url' => route('appearance.wallpapers')],
                                ['label' => 'Colors', 'url' => route('appearance.colors')],
                            ],
                        ],
                        [
                            'title' => 'API & Sync Manager',
                            'description' => 'Connect with WooCommerce, Amazon, and Alibaba.',
                            'icon' => 'puzzle-piece',
                            'links' => [
                                ['label' => 'Integrations', 'url' => route('api.integrations')],
                                ['label' => 'WooCommerce', 'url' => route('api.woocommerce')],
                                ['label' => 'Amazon & Alibaba', 'url' => route('api.marketplaces')],
                            ],
                        ],
                        [
                            'title' => 'Notifications',
                            'description' => 'Manage WhatsApp, Email, and System alerts.',
                            'icon' => 'bell',
                            'links' => [
                                ['label' => 'WhatsApp', 'url' => route('notifications.whatsapp')],
                                ['label' => 'Email', 'url' => route('notifications.email')],
                                ['label' => 'System Alerts', 'url' => route('notifications.system')],
                            ],
                        ],
                    ];
                @endphp

                @foreach($modules as $module)
                    <button
                        type="button"
                        class="module-card group flex flex-col items-start gap-3 p-5 rounded-2xl backdrop-blur-md bg-white/20 border border-white/30 hover:bg-white/25 hover:border-[#83b735]/50 text-left transition-all cursor-pointer"
                        data-module-title="{{ $module['title'] }}"
                        data-module-links="{{ json_encode($module['links']) }}"
                    >
                        <span class="flex items-center justify-center w-12 h-12 rounded-xl backdrop-blur-md bg-white/15 border border-white/25 group-hover:bg-[#83b735]/20 group-hover:border-[#83b735]/50 transition-all text-white group-hover:text-[#83b735]">
                            <x-heroicon name="{{ $module['icon'] }}" class="w-7 h-7" />
                        </span>
                        <span class="text-sm sm:text-base font-bold tracking-tight text-white group-hover:text-[#83b735] transition-colors">
                            {{ $module['title'] }}
                        </span>
                        <p class="text-sm font-semibold tracking-tight text-white/80 leading-snug">
                            {{ $module['description'] }}
                        </p>
                        <span class="text-xs font-medium text-white/70 group-hover:text-[#83b735]/90 transition-colors">
                            Open sub-menu →
                        </span>
                    </button>
                @endforeach
            </div>
        </div>

        {{-- Chart placeholder + Multi-language note --}}
        <div class="grid lg:grid-cols-[1fr_minmax(0,380px)] gap-6">
            <div class="rounded-3xl backdrop-blur-md bg-white/20 border border-white/30 p-5 sm:p-6 space-y-4">
                <div class="flex items-center justify-between">
                    <p class="text-xs font-semibold uppercase tracking-[0.24em] text-white/70">Revenue & Orders (Demo)</p>
                    <button type="button" class="px-3 py-1.5 rounded-full text-[11px] font-semibold backdrop-blur-md bg-white/10 border border-white/30 hover:bg-white/20 hover:text-[#83b735] transition-all">This Quarter</button>
                </div>
                <div class="h-40 sm:h-48 rounded-2xl border border-white/20 bg-white/5 flex items-center justify-center text-xs text-white/70">Charts placeholder</div>
            </div>
            <div class="rounded-3xl backdrop-blur-md bg-white/15 border border-white/25 p-5 space-y-3 text-xs sm:text-sm text-white/80">
                <p class="font-semibold text-white">Multi-language Ready</p>
                <p>یہ پورا ڈیش بورڈ UTF-8 کے ساتھ ڈیزائن کیا گیا ہے۔ اردو، عربی اور دیگر زبانوں میں مینیو اور ڈیٹا دکھایا جا سکتا ہے۔</p>
            </div>
        </div>
    </section>

    {{-- Glassmorphism Modal (sub-menu pop-up) --}}
    <x-glass-modal id="module-modal" />

    <style>
        .module-modal.modal-visible { opacity: 1; pointer-events: auto; }
        .module-modal.modal-visible .module-modal-panel { transform: scale(1); }
    </style>

    <script>
        (function () {
            const modalId = 'module-modal';
            const modal = document.getElementById(modalId);
            const titleEl = document.getElementById(modalId + '-title');
            const linksEl = document.getElementById(modalId + '-links');

            function openModal(title, links) {
                if (!modal || !titleEl || !linksEl) return;
                titleEl.textContent = title;
                linksEl.innerHTML = links.map(function (item) {
                    return '<a href="' + item.url + '" class="group flex items-center justify-between w-full px-4 py-3 rounded-xl text-sm font-semibold tracking-tight text-white border border-white/25 backdrop-blur-md bg-white/10 hover:bg-[#83b735]/20 hover:border-[#83b735] hover:text-[#83b735] transition-all">' + item.label + '<span class="text-white/60 group-hover:text-[#83b735]">→</span></a>';
                }).join('');
                modal.setAttribute('aria-hidden', 'false');
                modal.classList.add('modal-visible');
                document.body.style.overflow = 'hidden';
            }

            function closeModal() {
                if (!modal) return;
                modal.setAttribute('aria-hidden', 'true');
                modal.classList.remove('modal-visible');
                document.body.style.overflow = '';
            }

            document.querySelectorAll('.module-card').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var title = this.getAttribute('data-module-title');
                    var linksJson = this.getAttribute('data-module-links');
                    if (!title || !linksJson) return;
                    try {
                        var links = JSON.parse(linksJson);
                        openModal(title, links);
                    } catch (e) {}
                });
            });

            if (modal) {
                modal.querySelectorAll('[data-modal-close]').forEach(function (el) {
                    el.addEventListener('click', closeModal);
                });
                modal.addEventListener('click', function (e) {
                    if (e.target === modal || e.target.classList.contains('backdrop-blur-sm')) closeModal();
                });
            }

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && modal && modal.classList.contains('modal-visible')) closeModal();
            });
        })();
    </script>
@endsection
