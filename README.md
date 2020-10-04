# laraveleg/laravel-user-wallet
Create a cash wallet for the user that can deposit and withdraw.

## Install via composer
Add orm to composer.json configuration file.

```bash
$ composer require laraveleg/laravel-user-wallet
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
Auth::user()->depositBalance(100);
```

### withdrawalBalance
For withdrawal from the user's wallet.

```php
Auth::user()->withdrawalBalance(50);
```

## Attributes
### balance
Fetch user balance.

```php
Auth::user()->balance;
```

THX.