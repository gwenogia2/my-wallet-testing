<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Wallet;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WalletApiTest extends TestCase
{
    use RefreshDatabase;

    // Menguji proses deposit berhasil melalui endpoint API.
    public function test_user_dapat_melakukan_deposit_via_endpoint_api(): void
    {

        $wallet = Wallet::create(['balance' => 50000]);

        $response = $this->postJson("/api/wallets/{$wallet->id}/deposit", [
            'amount' => 25000,
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Deposit berhasil',
                     'balance' => 75000,
                 ]);

        $this->assertDatabaseHas('wallets', [
            'id' => $wallet->id,
            'balance' => 75000,
        ]);
    }

    // Menguji validasi deposit ketika nominal yang diberikan adalah 0 atau negatif.
    public function test_deposit_gagal_jika_nominal_nol_atau_minus(): void
    {

        $wallet = Wallet::create(['balance' => 50000]);

        $response = $this->postJson("/api/wallets/{$wallet->id}/deposit", [
            'amount' => 0,
        ]);

        $response->assertStatus(422)
                 ->assertJson([
                     'message' => 'Nominal deposit harus lebih dari 0.',
                 ]);
    }
}
