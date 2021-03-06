# laraveleg/laravel-user-wallet
Create a cash wallet for the user that can deposit and withdraw.

## Requirements
- php ^7.0
- laravel/framework ^7.0 OR ^8.0

## Install via composer
Add orm to composer.json configuration file.

```bash
$ composer require laraveleg/laravel-user-wallet
```

## Migrate
```bash
$ php artisan migrate
```

## add the trait in your model User in `app/Models/User.php` file
```php
use LaravelEG\UserWallet\Traits\UserWalletTrait;

class User extends Authenticatable
{
    use UserWalletTrait;
    ...
```

## Functions

### depositBalance
To deposit into a user's wallet.

```php
Auth::user()->depositBalance(100, '<details>');
```

### withdrawalBalance
For withdrawal from the user's wallet.

```php
Auth::user()->withdrawalBalance(50, '<details>');
```

## Attributes
### balance
Fetch user balance.

```php
Auth::user()->balance;
```

## Listeners
### Publish vendor
- Run `php artisan vendor:publish`
- Selection `LaravelEG\UserWallet\UserWalletServiceProvider`

### Config file
Go to `config/laraveleg/userwallet.php`
- You can set listeners classes if when `depositing` and `withdrawal`

THX.