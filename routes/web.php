<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/privacy', fn () => view('legal.privacy'))->name('privacy');
Route::get('/terms', fn () => view('legal.terms'))->name('terms');

// Auth: guest only
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/register/check-status', [AuthController::class, 'checkStatus'])->name('register.check-status');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin panel is now provided by Filament at /admin (see App\Providers\Filament\AdminPanelProvider)

// Placeholder helper for module sub-pages
$placeholder = fn (string $title, string $module) => view('modules.placeholder', compact('title', 'module'));

/**
 * Register a set of placeholder routes under a prefix.
 *
 * @param string $prefix       URI prefix (e.g. 'inventory')
 * @param string $moduleLabel  Human-readable module name for the view
 * @param array  $pages        [slug => page title]
 */
$registerModule = static function (string $prefix, string $moduleLabel, array $pages) use (&$placeholder): void {
    foreach ($pages as $slug => $title) {
        Route::get("/{$prefix}/{$slug}", fn () => $placeholder($title, $moduleLabel))
            ->name("{$prefix}.{$slug}");
    }
};

// Protected routes: require authentication and approved status
Route::middleware(['auth', 'approved'])->group(function () use (&$placeholder, $registerModule) {
    // Dashboard
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    // Admin: Approvals (priority module – placeholder until logic exists)
    Route::get('/admin/approvals', fn () => $placeholder('Pending Approvals', 'Admin Approvals'))->name('admin.approvals');

    $registerModule('user-management', 'User Management', [
        'roles' => 'Roles',
        'permissions' => 'Permissions',
        'staff' => 'Staff List',
    ]);

    $registerModule('inventory', 'Inventory', [
        'current-stock' => 'Current Stock',
        'add-item' => 'Add Item',
        'categories' => 'Categories',
    ]);

    $registerModule('sales', 'Sales', [
        'pos' => 'Point of Sale',
        'invoices' => 'Invoices',
        'report' => 'Sales Report',
    ]);

    $registerModule('procurement', 'Procurement', [
        'purchase-orders' => 'Purchase Orders',
        'suppliers' => 'Suppliers',
        'expenses' => 'Expenses',
    ]);

    $registerModule('finance', 'Finance', [
        'cash-book' => 'Cash Book',
        'profit-loss' => 'Profit / Loss',
        'bank-accounts' => 'Bank Accounts',
    ]);

    $registerModule('crm', 'CRM', [
        'customers' => 'Customers List',
        'leads' => 'Leads',
        'communications' => 'Communications',
    ]);

    $registerModule('hrm', 'HRM', [
        'attendance' => 'Employee Attendance',
        'salaries' => 'Salaries',
        'leave-requests' => 'Leave Requests',
    ]);

    $registerModule('production', 'Production', [
        'work-orders' => 'Work Orders',
        'bom' => 'Bill of Materials',
        'tracking' => 'Tracking',
    ]);

    $registerModule('reports', 'Reports', [
        'daily' => 'Daily Summary',
        'monthly' => 'Monthly Analytics',
        'export' => 'Custom Export',
    ]);

    $registerModule('settings', 'Settings', [
        'company' => 'Company Profile',
        'language' => 'Language',
        'config' => 'App Configuration',
    ]);

    $registerModule('assets', 'Assets Management', [
        'list' => 'Assets List',
        'vehicles' => 'Vehicles',
        'machinery' => 'Machinery',
    ]);

    $registerModule('quality', 'Quality Control', [
        'checks' => 'Quality Checks',
        'standards' => 'Standards',
        'inspections' => 'Inspections',
    ]);

    $registerModule('projects', 'Project Management', [
        'list' => 'Projects',
        'tasks' => 'Tasks',
        'timeline' => 'Timeline',
    ]);

    $registerModule('fleet', 'Fleet & Transport', [
        'vehicles' => 'Vehicles',
        'fuel-log' => 'Fuel Log',
        'drivers' => 'Drivers',
    ]);

    $registerModule('maintenance', 'Maintenance', [
        'schedule' => 'Schedule',
        'work-orders' => 'Work Orders',
        'history' => 'History',
    ]);

    $registerModule('documents', 'Document Vault', [
        'list' => 'Documents',
        'contracts' => 'Contracts',
        'licenses' => 'Licenses',
    ]);

    $registerModule('marketing', 'Marketing', [
        'campaigns' => 'Campaigns',
        'templates' => 'Templates',
        'analytics' => 'Analytics',
    ]);

    $registerModule('audit', 'Audit Log', [
        'activity' => 'Activity Log',
        'changes' => 'Changes',
        'export' => 'Export',
    ]);

    $registerModule('payroll', 'Payroll & Loans', [
        'salaries' => 'Payroll',
        'advances' => 'Advances',
        'loans' => 'Loans',
    ]);

    $registerModule('pos', 'POS', [
        'screen' => 'POS Screen',
        'sessions' => 'Sessions',
        'daily-summary' => 'Daily Summary',
    ]);

    $registerModule('helpdesk', 'Helpdesk', [
        'tickets' => 'Tickets',
        'knowledge-base' => 'Knowledge Base',
        'reports' => 'Reports',
    ]);

    $registerModule('supply-chain', 'Supply Chain', [
        'map' => 'Supply Map',
        'suppliers' => 'Suppliers',
        'orders' => 'Orders',
    ]);

    $registerModule('appearance', 'Appearance & Themes', [
        'themes' => 'Themes',
        'wallpapers' => 'Wallpapers',
        'colors' => 'Colors',
    ]);

    $registerModule('api', 'API & Sync Manager', [
        'integrations' => 'Integrations',
        'woocommerce' => 'WooCommerce',
        'marketplaces' => 'Amazon & Alibaba',
    ]);

    $registerModule('notifications', 'Notifications', [
        'whatsapp' => 'WhatsApp',
        'email' => 'Email',
        'system' => 'System Alerts',
    ]);
});
