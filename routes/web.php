<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Cashier\DashboardController as CashierDashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StockInController;
use App\Http\Controllers\Admin\PullOutController;
use App\Http\Controllers\Cashier\OrderController as CashierOrderController;
use App\Http\Controllers\Cashier\PaymentController as CashierPaymentController;
use App\Http\Controllers\Cashier\TransactionController as CashierTransactionController;

// Public Routes
Route::get('/', fn() => redirect()->route('login'));
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        
        // Products Routes
        Route::prefix('products')->name('products.')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('/create', [ProductController::class, 'create'])->name('create');
            Route::post('/', [ProductController::class, 'store'])->name('store');
            Route::get('/{product}', [ProductController::class, 'show'])->name('show');
            Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');
            Route::put('/{product}', [ProductController::class, 'update'])->name('update');
            Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
        });

        // Stock In Routes
        Route::prefix('stock-in')->name('stock-in.')->group(function () {
            Route::get('/', [StockInController::class, 'index'])->name('index');
            Route::get('/create', [StockInController::class, 'create'])->name('create');
            Route::post('/', [StockInController::class, 'store'])->name('store');
        });

        // Pullouts Routes
        Route::prefix('pullouts')->name('pullouts.')->group(function () {
            Route::get('/', [PullOutController::class, 'index'])->name('index');
            Route::get('/create', [PullOutController::class, 'create'])->name('create');
            Route::post('/', [PullOutController::class, 'store'])->name('store');
            Route::get('/{pullOut}', [PullOutController::class, 'show'])->name('show');
            Route::get('/{pullOut}/edit', [PullOutController::class, 'edit'])->name('edit');
            Route::put('/{pullOut}', [PullOutController::class, 'update'])->name('update');
            Route::delete('/{pullOut}', [PullOutController::class, 'destroy'])->name('destroy');
        });

        // Suppliers Routes
        Route::prefix('suppliers')->name('suppliers.')->group(function () {
            Route::get('/', function () {
                return view('admin.suppliers.index');
            })->name('index');
            Route::get('/create', function () {
                return view('admin.suppliers.create');
            })->name('create');
        });

        // Employees Routes
        Route::prefix('employees')->name('employees.')->group(function () {
            Route::get('/', function () {
                return view('admin.employees.index');
            })->name('index');
            Route::get('/create', function () {
                return view('admin.employees.create');
            })->name('create');
        });

        // Accounts Routes
        Route::prefix('accounts')->name('accounts.')->group(function () {
            Route::get('/', function () {
                return view('admin.accounts.index');
            })->name('index');
        });

        // Records Routes
        Route::prefix('records')->name('records.')->group(function () {
            Route::get('/', function () {
                return view('admin.records.index');
            })->name('index');
        });

        // Reports Routes
        Route::prefix('reports')->name('reports.')->group(function () {
            Route::get('/analytics', function () {
                return view('admin.reports.analytics');
            })->name('analytics');
            Route::get('/daily-sales', function () {
                return view('admin.reports.daily-sales');
            })->name('daily-sales');
            Route::get('/inventory', function () {
                return view('admin.reports.inventory');
            })->name('inventory');
            Route::get('/pullouts', function () {
                return view('admin.reports.pullouts');
            })->name('pullouts');
        });

        // Settings Routes
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/', function () {
                return view('admin.settings.index');
            })->name('index');
        });
    });
    
    // Cashier Routes
    Route::prefix('cashier')->name('cashier.')->group(function () {
        Route::get('/dashboard', [CashierDashboardController::class, 'index'])->name('dashboard');
        
        // Orders Routes
        Route::prefix('orders')->name('orders.')->group(function () {
            Route::get('/', [CashierOrderController::class, 'index'])->name('index');
            Route::get('/create', [CashierOrderController::class, 'create'])->name('create');
            Route::post('/', [CashierOrderController::class, 'store'])->name('store');
            Route::get('/{order}', [CashierOrderController::class, 'show'])->name('show');
            Route::put('/{order}', [CashierOrderController::class, 'update'])->name('update');
            Route::delete('/{order}', [CashierOrderController::class, 'destroy'])->name('destroy');
            Route::post('/{order}/process-payment', [CashierOrderController::class, 'processPayment'])->name('process-payment');
            Route::post('/{order}/update-status', [CashierOrderController::class, 'updateStatus'])->name('update-status');
        });

        // Payments Routes
        Route::prefix('payments')->name('payments.')->group(function () {
            Route::get('/', [CashierPaymentController::class, 'index'])->name('index');
            Route::get('/create', [CashierPaymentController::class, 'create'])->name('create');
            Route::post('/', [CashierPaymentController::class, 'store'])->name('store');
            Route::get('/{payment}', [CashierPaymentController::class, 'show'])->name('show');
            Route::put('/{payment}', [CashierPaymentController::class, 'update'])->name('update');
            Route::post('/{payment}/refund', [CashierPaymentController::class, 'refund'])->name('refund');
        });

        // Transactions Routes
        Route::prefix('transactions')->name('transactions.')->group(function () {
            Route::get('/', [CashierTransactionController::class, 'index'])->name('index');
            Route::get('/{transaction}', [CashierTransactionController::class, 'show'])->name('show');
            Route::get('/{transaction}/receipt', [CashierTransactionController::class, 'receipt'])->name('receipt');
        });

        // Reports Routes for Cashier
        Route::prefix('reports')->name('reports.')->group(function () {
            Route::get('/daily-sales', function () {
                return view('cashier.reports.daily-sales');
            })->name('daily-sales');
            Route::get('/transactions', function () {
                return view('cashier.reports.transactions');
            })->name('transactions');
            Route::get('/payment-summary', function () {
                return view('cashier.reports.payment-summary');
            })->name('payment-summary');
        });

        // Settings Routes for Cashier
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/', function () {
                return view('cashier.settings.index');
            })->name('index');
            Route::get('/profile', function () {
                return view('cashier.settings.profile');
            })->name('profile');
        });
    });
});

Route::fallback(fn() => redirect()->route('login'));