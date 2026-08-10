<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Services\MyWallet;
use App\Exceptions\InvalidAmountException;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function deposit(Request $request, Wallet $wallet)
    {
        $request->validate([
            'amount' => 'required|numeric',
        ]);

        try {
            $service = new MyWallet($wallet->balance);
            $service->deposit($request->amount);

            $wallet->update(['balance' => $service->getBalance()]);

            return response()->json([
                'message' => 'Deposit berhasil',
                'balance' => $wallet->balance,
            ], 200);

        } catch (InvalidAmountException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 422);
        }
    }
}
