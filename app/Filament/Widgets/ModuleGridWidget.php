<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;

class ModuleGridWidget extends Widget
{
    protected static string $view = 'filament.widgets.module-grid-widget';

    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 1;

    public function getViewData(): array
    {
        return [
            'dailyOperations' => $this->getDailyOperations(),
            'administrative' => $this->getAdministrative(),
            'analysis' => $this->getAnalysis(),
        ];
    }

    protected function getDailyOperations(): array
    {
        return [
            ['title' => 'Sales', 'description' => 'Invoices, sales tracking, and reports.', 'icon' => 'shopping-cart', 'url' => route('sales.pos')],
            ['title' => 'POS', 'description' => 'Point of sale screen and sessions.', 'icon' => 'computer-desktop', 'url' => route('pos.screen')],
            ['title' => 'Orders', 'description' => 'Customer orders and invoices.', 'icon' => 'clipboard-document-list', 'url' => route('sales.invoices')],
            ['title' => 'Inventory', 'description' => 'Stock levels, items, and categories.', 'icon' => 'archive-box', 'url' => route('inventory.current-stock')],
            ['title' => 'Procurement', 'description' => 'Purchase orders, suppliers, expenses.', 'icon' => 'truck', 'url' => route('procurement.purchase-orders')],
            ['title' => 'Supply Chain', 'description' => 'Supply map, suppliers, and orders.', 'icon' => 'globe-alt', 'url' => route('supply-chain.map')],
            ['title' => 'Production', 'description' => 'Work orders, BOM, and tracking.', 'icon' => 'wrench-screwdriver', 'url' => route('production.work-orders')],
        ];
    }

    protected function getAdministrative(): array
    {
        return [
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
    }

    protected function getAnalysis(): array
    {
        return [
            ['title' => 'Reports', 'description' => 'Daily summary, analytics, and export.', 'icon' => 'chart-bar', 'url' => route('reports.daily')],
            ['title' => 'Financials', 'description' => 'Cash book, P&L, and bank accounts.', 'icon' => 'banknotes', 'url' => route('finance.cash-book')],
            ['title' => 'Audit Log', 'description' => 'Activity log and system changes.', 'icon' => 'clipboard-document-list', 'url' => route('audit.activity')],
            ['title' => 'Payroll & Loans', 'description' => 'Payroll, advances, and loans.', 'icon' => 'credit-card', 'url' => route('payroll.salaries')],
        ];
    }
}
