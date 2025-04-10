<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WithdrawalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
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





});

require __DIR__.'/auth.php';
