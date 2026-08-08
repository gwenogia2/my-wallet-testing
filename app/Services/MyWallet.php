<?php

namespace App\Services;

use App\Exceptions\InsufficientBalanceException;
use App\Exceptions\InvalidAmountException;

class MyWallet
{
    public function __construct(
        private float $balance = 0.0
    ) {}

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function deposit(float $amount): void
    {
        if ($amount <= 0) {
            throw new InvalidAmountException("Nominal deposit harus lebih dari 0.");
        }

        $this->balance += $amount;
    }

    public function withdraw(float $amount): void
    {
        if ($amount <= 0) {
            throw new InvalidAmountException("Nominal penarikan harus lebih dari 0.");
        }

        if ($amount > $this->balance) {
            throw new InsufficientBalanceException("Saldo tidak mencukupi untuk melakukan penarikan.");
        }

        $this->balance -= $amount;
    }

    public function transferTo(MyWallet $targetWallet, float $amount): void
    {
        // Penarikan dari akun ini (akan otomatis melempar exception jika tidak cukup)
        $this->withdraw($amount);

        // Deposit ke akun tujuan
        $targetWallet->deposit($amount);
    }
}
