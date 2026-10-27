<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\MyWallet;
use App\Exceptions\InsufficientBalanceException;
use App\Exceptions\InvalidAmountException;

class MyWalletTest extends TestCase
{
    // Cek inisialisasi saldo awal (0.0)
    public function test_saldo_awal_adalah_nol()
    {
        $wallet = new MyWallet();

        $this->assertEquals(0.0, $wallet->getBalance());
    }

    // Cek logika penambahan saldo saat deposit
    public function test_deposit_berhasil_menambah_saldo()
    {
        $wallet = new MyWallet(50000);
        $wallet->deposit(25000);

        $this->assertEquals(75000.0, $wallet->getBalance());
    }

    // Cek logika pengurangan saldo saat withdraw
    public function test_withdraw_berhasil_mengurangi_saldo()
    {
        $wallet = new MyWallet(50000);
        $wallet->withdraw(25000);

        $this->assertEquals(25000.0, $wallet->getBalance());
    }

    public function test_gagal_withdraw_jika_saldo_tidak_mencukupi()
    {
        $this->expectException(InsufficientBalanceException::class);

        $wallet = new MyWallet(30000);
        $wallet->withdraw(50000);
    }
}
