# MyWallet (Laravel Testing Practice)

A Laravel project built to explore both **Unit Testing** and **Feature Testing**, focusing on clean architecture, exception handling, API endpoints, and database interactions.

## Features & Architecture
- **Service Layer**: Pure business logic isolation (`MyWallet`).
- **Custom Exceptions**: Domain-specific error handling (`InvalidAmountException`).
- **Database & Model**: Persistent storage for wallet balances (`Wallet` model & migration).
- **API Endpoints**: RESTful route and controller (`WalletController`) for deposit transactions.

## What I Learned
- **Unit Testing**: Testing core business logic in isolation without touching the database.
- **Feature Testing**: Testing full end-to-end HTTP requests, validation rules, JSON responses, and database state assertions (`assertDatabaseHas`).
- **Laravel Tooling**: Setting up API routes (`install:api`), managing app keys, and utilizing `RefreshDatabase` for clean test runs.

## Running Tests

Run all test suites (Unit & Feature):
```bash
php artisan test
