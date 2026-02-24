<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Auth: guest only
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/register/check-status', [AuthController::class, 'checkStatus'])->name('register.check-status');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard: auth required
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

// Placeholder helper for module sub-pages
$placeholder = fn (string $title, string $module) => view('modules.placeholder', compact('title', 'module'));

// 1. User Management
Route::get('/user-management/roles', fn () => $placeholder('Roles', 'User Management'))->name('user-management.roles');
Route::get('/user-management/permissions', fn () => $placeholder('Permissions', 'User Management'))->name('user-management.permissions');
Route::get('/user-management/staff', fn () => $placeholder('Staff List', 'User Management'))->name('user-management.staff');

// 2. Inventory
Route::get('/inventory/current-stock', fn () => $placeholder('Current Stock', 'Inventory'))->name('inventory.current-stock');
Route::get('/inventory/add-item', fn () => $placeholder('Add Item', 'Inventory'))->name('inventory.add-item');
Route::get('/inventory/categories', fn () => $placeholder('Categories', 'Inventory'))->name('inventory.categories');

// 3. Sales
Route::get('/sales/pos', fn () => $placeholder('Point of Sale', 'Sales'))->name('sales.pos');
Route::get('/sales/invoices', fn () => $placeholder('Invoices', 'Sales'))->name('sales.invoices');
Route::get('/sales/report', fn () => $placeholder('Sales Report', 'Sales'))->name('sales.report');

// 4. Procurement
Route::get('/procurement/purchase-orders', fn () => $placeholder('Purchase Orders', 'Procurement'))->name('procurement.purchase-orders');
Route::get('/procurement/suppliers', fn () => $placeholder('Suppliers', 'Procurement'))->name('procurement.suppliers');
Route::get('/procurement/expenses', fn () => $placeholder('Expenses', 'Procurement'))->name('procurement.expenses');

// 5. Finance
Route::get('/finance/cash-book', fn () => $placeholder('Cash Book', 'Finance'))->name('finance.cash-book');
Route::get('/finance/profit-loss', fn () => $placeholder('Profit / Loss', 'Finance'))->name('finance.profit-loss');
Route::get('/finance/bank-accounts', fn () => $placeholder('Bank Accounts', 'Finance'))->name('finance.bank-accounts');

// 6. CRM
Route::get('/crm/customers', fn () => $placeholder('Customers List', 'CRM'))->name('crm.customers');
Route::get('/crm/leads', fn () => $placeholder('Leads', 'CRM'))->name('crm.leads');
Route::get('/crm/communications', fn () => $placeholder('Communications', 'CRM'))->name('crm.communications');

// 7. HRM
Route::get('/hrm/attendance', fn () => $placeholder('Employee Attendance', 'HRM'))->name('hrm.attendance');
Route::get('/hrm/salaries', fn () => $placeholder('Salaries', 'HRM'))->name('hrm.salaries');
Route::get('/hrm/leave-requests', fn () => $placeholder('Leave Requests', 'HRM'))->name('hrm.leave-requests');

// 8. Production
Route::get('/production/work-orders', fn () => $placeholder('Work Orders', 'Production'))->name('production.work-orders');
Route::get('/production/bom', fn () => $placeholder('Bill of Materials', 'Production'))->name('production.bom');
Route::get('/production/tracking', fn () => $placeholder('Tracking', 'Production'))->name('production.tracking');

// 9. Reports
Route::get('/reports/daily', fn () => $placeholder('Daily Summary', 'Reports'))->name('reports.daily');
Route::get('/reports/monthly', fn () => $placeholder('Monthly Analytics', 'Reports'))->name('reports.monthly');
Route::get('/reports/export', fn () => $placeholder('Custom Export', 'Reports'))->name('reports.export');

// 10. Settings
Route::get('/settings/company', fn () => $placeholder('Company Profile', 'Settings'))->name('settings.company');
Route::get('/settings/language', fn () => $placeholder('Language', 'Settings'))->name('settings.language');
Route::get('/settings/config', fn () => $placeholder('App Configuration', 'Settings'))->name('settings.config');

// 11. Assets Management
Route::get('/assets/list', fn () => $placeholder('Assets List', 'Assets Management'))->name('assets.list');
Route::get('/assets/vehicles', fn () => $placeholder('Vehicles', 'Assets Management'))->name('assets.vehicles');
Route::get('/assets/machinery', fn () => $placeholder('Machinery', 'Assets Management'))->name('assets.machinery');

// 12. Quality Control
Route::get('/quality/checks', fn () => $placeholder('Quality Checks', 'Quality Control'))->name('quality.checks');
Route::get('/quality/standards', fn () => $placeholder('Standards', 'Quality Control'))->name('quality.standards');
Route::get('/quality/inspections', fn () => $placeholder('Inspections', 'Quality Control'))->name('quality.inspections');

// 13. Project Management
Route::get('/projects/list', fn () => $placeholder('Projects', 'Project Management'))->name('projects.list');
Route::get('/projects/tasks', fn () => $placeholder('Tasks', 'Project Management'))->name('projects.tasks');
Route::get('/projects/timeline', fn () => $placeholder('Timeline', 'Project Management'))->name('projects.timeline');

// 14. Fleet & Transport
Route::get('/fleet/vehicles', fn () => $placeholder('Vehicles', 'Fleet & Transport'))->name('fleet.vehicles');
Route::get('/fleet/fuel-log', fn () => $placeholder('Fuel Log', 'Fleet & Transport'))->name('fleet.fuel-log');
Route::get('/fleet/drivers', fn () => $placeholder('Drivers', 'Fleet & Transport'))->name('fleet.drivers');

// 15. Maintenance
Route::get('/maintenance/schedule', fn () => $placeholder('Schedule', 'Maintenance'))->name('maintenance.schedule');
Route::get('/maintenance/work-orders', fn () => $placeholder('Work Orders', 'Maintenance'))->name('maintenance.work-orders');
Route::get('/maintenance/history', fn () => $placeholder('History', 'Maintenance'))->name('maintenance.history');

// 16. Document Vault
Route::get('/documents/list', fn () => $placeholder('Documents', 'Document Vault'))->name('documents.list');
Route::get('/documents/contracts', fn () => $placeholder('Contracts', 'Document Vault'))->name('documents.contracts');
Route::get('/documents/licenses', fn () => $placeholder('Licenses', 'Document Vault'))->name('documents.licenses');

// 17. Marketing
Route::get('/marketing/campaigns', fn () => $placeholder('Campaigns', 'Marketing'))->name('marketing.campaigns');
Route::get('/marketing/templates', fn () => $placeholder('Templates', 'Marketing'))->name('marketing.templates');
Route::get('/marketing/analytics', fn () => $placeholder('Analytics', 'Marketing'))->name('marketing.analytics');

// 18. Audit Log
Route::get('/audit/activity', fn () => $placeholder('Activity Log', 'Audit Log'))->name('audit.activity');
Route::get('/audit/changes', fn () => $placeholder('Changes', 'Audit Log'))->name('audit.changes');
Route::get('/audit/export', fn () => $placeholder('Export', 'Audit Log'))->name('audit.export');

// 19. Payroll & Loans
Route::get('/payroll/salaries', fn () => $placeholder('Payroll', 'Payroll & Loans'))->name('payroll.salaries');
Route::get('/payroll/advances', fn () => $placeholder('Advances', 'Payroll & Loans'))->name('payroll.advances');
Route::get('/payroll/loans', fn () => $placeholder('Loans', 'Payroll & Loans'))->name('payroll.loans');

// 20. POS (Point of Sale)
Route::get('/pos/screen', fn () => $placeholder('POS Screen', 'POS'))->name('pos.screen');
Route::get('/pos/sessions', fn () => $placeholder('Sessions', 'POS'))->name('pos.sessions');
Route::get('/pos/daily-summary', fn () => $placeholder('Daily Summary', 'POS'))->name('pos.daily-summary');

// 21. Helpdesk
Route::get('/helpdesk/tickets', fn () => $placeholder('Tickets', 'Helpdesk'))->name('helpdesk.tickets');
Route::get('/helpdesk/knowledge-base', fn () => $placeholder('Knowledge Base', 'Helpdesk'))->name('helpdesk.knowledge-base');
Route::get('/helpdesk/reports', fn () => $placeholder('Reports', 'Helpdesk'))->name('helpdesk.reports');

// 22. Supply Chain
Route::get('/supply-chain/map', fn () => $placeholder('Supply Map', 'Supply Chain'))->name('supply-chain.map');
Route::get('/supply-chain/suppliers', fn () => $placeholder('Suppliers', 'Supply Chain'))->name('supply-chain.suppliers');
Route::get('/supply-chain/orders', fn () => $placeholder('Orders', 'Supply Chain'))->name('supply-chain.orders');

// 23. Appearance & Themes
Route::get('/appearance/themes', fn () => $placeholder('Themes', 'Appearance & Themes'))->name('appearance.themes');
Route::get('/appearance/wallpapers', fn () => $placeholder('Wallpapers', 'Appearance & Themes'))->name('appearance.wallpapers');
Route::get('/appearance/colors', fn () => $placeholder('Colors', 'Appearance & Themes'))->name('appearance.colors');

// 24. API & Sync Manager
Route::get('/api/integrations', fn () => $placeholder('Integrations', 'API & Sync Manager'))->name('api.integrations');
Route::get('/api/woocommerce', fn () => $placeholder('WooCommerce', 'API & Sync Manager'))->name('api.woocommerce');
Route::get('/api/marketplaces', fn () => $placeholder('Amazon & Alibaba', 'API & Sync Manager'))->name('api.marketplaces');

// 25. Notifications
Route::get('/notifications/whatsapp', fn () => $placeholder('WhatsApp', 'Notifications'))->name('notifications.whatsapp');
Route::get('/notifications/email', fn () => $placeholder('Email', 'Notifications'))->name('notifications.email');
Route::get('/notifications/system', fn () => $placeholder('System Alerts', 'Notifications'))->name('notifications.system');
