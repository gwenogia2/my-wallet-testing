<?php

use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

Route::post('/wallets/{wallet}/deposit', [WalletController::class, 'deposit']);
