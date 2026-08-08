# MyWallet (Laravel Unit Testing Practice)

A minimal Laravel project built to explore **Unit Testing** and **Exception Handling** without database dependency.

## What I Learned
- Writing pure business logic service (`WalletService`).
- Handling custom exceptions (`InvalidAmountException`).
- Writing automated test cases using Pest / PHPUnit.

## Run Test
```bash
php artisan test --filter WalletServiceTest
