<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

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
