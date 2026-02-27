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

// 3D Dashboard drum modules: whitelist (drum_slug => [module_slug => module_label])
$drumModules = [
    'commerce' => ['sales-pos' => 'Sales POS', 'inventory' => 'Inventory', 'suppliers' => 'Suppliers'],
    'sync-hub' => ['woocommerce' => 'WooCommerce', 'daraz' => 'Daraz', 'alibaba' => 'Alibaba'],
    'finance' => ['bank-accounts' => 'Bank Accounts', 'cash-book' => 'Cash Book', 'profit-loss' => 'Profit/Loss'],
    'expenses' => ['utility-bills' => 'Utility Bills', 'shop-rent' => 'Shop Rent', 'staff-tea' => 'Staff Tea'],
    'human-capital' => ['staff-payroll' => 'Staff Payroll', 'attendance' => 'Attendance', 'performance' => 'Performance'],
    'relations' => ['customer-khata' => 'Customer Khata', 'leads' => 'Leads', 'marketing' => 'Marketing'],
    'insights' => ['sales-reports' => 'Sales Reports', 'expense-analytics' => 'Expense Analytics', 'growth-charts' => 'Growth Charts'],
    'platform' => ['system-settings' => 'System Settings', 'user-roles' => 'User Roles', 'security-logs' => 'Security Logs'],
];
$drumLabels = [
    'commerce' => 'COMMERCE', 'sync-hub' => 'SYNC HUB', 'finance' => 'FINANCE', 'expenses' => 'EXPENSES',
    'human-capital' => 'HUMAN CAPITAL', 'relations' => 'RELATIONS', 'insights' => 'INSIGHTS', 'platform' => 'PLATFORM',
];

// Protected routes: require authentication and approved status
Route::middleware(['auth', 'approved'])->group(function () use (&$placeholder, $registerModule, $drumModules, $drumLabels) {
    // Dashboard
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    // 3D Drum module placeholder: /modules/{drum}/{module} (e.g. /modules/commerce/sales-pos)
    Route::get('/modules/{drum}/{module}', function (string $drum, string $module) use ($drumModules, $drumLabels) {
        if (!isset($drumModules[$drum]) || !isset($drumModules[$drum][$module])) {
            abort(404);
        }
        $view = 'modules.' . $drum . '.' . $module;
        if (view()->exists($view)) {
            return view($view, [
                'drumLabel' => $drumLabels[$drum],
                'moduleLabel' => $drumModules[$drum][$module],
            ]);
        }
        return view('modules.drum-placeholder', [
            'drumLabel' => $drumLabels[$drum],
            'moduleLabel' => $drumModules[$drum][$module],
        ]);
    })->name('module.show');

    // Product catalog master + sub-modules
    Route::prefix('catalog')->name('catalog.')->group(function () {
        Route::get('/', fn () => view('modules.commerce.inventory'))->name('master');
        Route::get('/categories', fn () => view('modules.catalog.categories'))->name('categories');
        Route::get('/brands', fn () => view('modules.catalog.brands'))->name('brands');
        Route::get('/attributes', fn () => view('modules.catalog.attributes'))->name('attributes');
        Route::get('/products', fn () => view('modules.catalog.products'))->name('products');
        Route::get('/products/create', fn () => view('modules.catalog.product-wizard'))->name('products.create');
        Route::get('/stock-alerts', fn () => view('modules.catalog.stock-alerts'))->name('stock-alerts');
    });

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
