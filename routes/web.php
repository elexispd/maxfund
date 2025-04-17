<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WithdrawalController;

use App\Http\Controllers\Admin\DepositController as AdminDepositController;
use App\Http\Controllers\Admin\InvestmentController as AdminInvestmentController;
use App\Http\Controllers\Admin\ReferralController as AdminReferralController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\WithdrawController as AdminWithdrawalController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MenuConroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/{user}edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/wallets')->group(function () {
        Route::get('/', [WalletController::class, 'index'])->name('user.wallet.index');
        Route::get('/create', [WalletController::class, 'create'])->name('user.wallet.create');
        Route::post('/create', [WalletController::class, 'store'])->name('user.wallet.store');
        Route::delete('/wallets/{wallet}', [WalletController::class, 'destroy'])->name('user.wallet.destroy');
    });

    Route::prefix('/transactions')->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('user.transaction.index');
        Route::get('/create', [TransactionController::class, 'create'])->name('user.transaction.create');
        Route::post('/create', [TransactionController::class, 'store'])->name('user.transaction.store');
    });

    Route::prefix('/deposits')->group(function () {
        Route::get('/', [DepositController::class, 'index'])->name('user.deposit.index');
        Route::get('/create', [DepositController::class, 'create'])->name('user.deposit.create');
        Route::post('/create', [DepositController::class, 'store'])->name('user.deposit.store');
        Route::get('/{deposit}/instructions/{admin_wallet}', [DepositController::class, 'showInstructions'])
         ->name('user.deposit.instructions');
        Route::post('/{deposit}/upload', [DepositController::class, 'uploadProof'])
         ->name('user.deposit.upload');
    });

    Route::prefix('/investment')->group(function () {
        Route::get('/', [InvestmentController::class, 'index'])->name('user.investment.index');
        Route::get('/plans', [InvestmentController::class, 'list'])->name('user.investment.plan');
        Route::get('/{plan:slug}', [InvestmentController::class, 'create'])->name('user.investment.create');
        Route::post('/create', [InvestmentController::class, 'store'])->name('user.investment.store');
    });

    Route::prefix('/referrals')->group(function () {
        Route::get('/', [ReferralController::class, 'index'])->name('user.referral.index');
    });

    Route::prefix('/kyc')->group(function () {
        Route::get('/', [ProfileController::class, 'create'])->name('user.kyc.create');
        Route::post('/', [ProfileController::class, 'store'])->name('user.kyc.store');
    });

    Route::prefix('/withdraw')->group(function () {
        Route::get('/', [WithdrawalController::class, 'index'])->name('user.withdraw.index');
        Route::get('/create', [WithdrawalController::class, 'create'])->name('user.withdraw.create');
        Route::post('/create', [WithdrawalController::class, 'store'])->name('user.withdraw.store');
    });


    Route::prefix('/admin')->group(function () {

        Route::prefix('/users')->group(function () {
            Route::get('/', [AdminUserController::class, 'index'])->name('admin.user.index');
            Route::get('/create', [AdminUserController::class, 'create'])->name('admin.user.create');
            Route::post('/create', [AdminUserController::class, 'store'])->name('admin.user.store');
            Route::get('/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.user.edit');
            Route::put('/{user}', [AdminUserController::class, 'update'])->name('admin.user.update');
            Route::get('/{user}', [AdminUserController::class, 'show'])->name('admin.user.show');
            Route::put('/{user}/status', [AdminUserController::class, 'changeStatus'])->name('admin.user.change-status');
            Route::delete('/{user}', [AdminUserController::class, 'destroy'])->name('admin.user.destroy');

        });

        Route::prefix('/dashboard')->group(function () {
            Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        });

        Route::prefix('/deposits')->group(function () {
            Route::get('/', [AdminDepositController::class, 'index'])->name('admin.deposit.index');
            Route::put('approve/{deposit}', [AdminDepositController::class, 'approve'])->name('admin.deposits.approve');
            Route::put('reject/{deposit}', [AdminDepositController::class, 'reject'])->name('admin.deposits.reject');
        });

        Route::prefix('/investments')->group(function () {
            Route::get('/', [AdminInvestmentController::class, 'index'])->name('admin.investment.index');
            Route::get('/plans', [AdminInvestmentController::class, 'plans'])->name('admin.investment.plan');
            Route::get('/{investment}', [AdminInvestmentController::class, 'show'])->name('admin.investment.show');
        });

        Route::prefix('/withdraw')->group(function () {
            Route::get('/', [AdminWithdrawalController::class, 'index'])->name('admin.withdraw.index');
            Route::put('/approve/{withdraw}', [AdminWithdrawalController::class, 'approve'])->name('admin.withdraw.approve');
            Route::put('/reject/{withdraw}', [AdminWithdrawalController::class, 'reject'])->name('admin.withdraw.reject');
        });

        Route::prefix('/referrals')->group(function () {
            Route::get('/{user}', [AdminReferralController::class, 'index'])->name('admin.referral.index');
        });



    });





});



Route::get('/creed', function () {
    return view('index'); // index.blade.php in resources/views
});

Route::get('/services', [MenuConroller::class, 'services'])->name('services');
Route::get('/about', [MenuConroller::class, 'about'])->name('about');
Route::get('/faq', [MenuConroller::class, 'faq'])->name('faq');
Route::get('/contact', [MenuConroller::class, 'contact'])->name('contact');
Route::get('/terms', [MenuConroller::class, 'terms'])->name('terms');

require __DIR__.'/auth.php';
