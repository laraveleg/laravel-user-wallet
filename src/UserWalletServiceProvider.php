<?php

namespace LaravelEG\UserWallet;

class UserWalletServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $when_depositing_listener = (new \LaravelEG\UserWallet\Config())['listeners']['when_depositing'];
        $when_withdrawal_listener = (new \LaravelEG\UserWallet\Config())['listeners']['when_withdrawal'];


        if ($when_depositing_listener) {
            \Illuminate\Support\Facades\Event::listen(\LaravelEG\UserWallet\App\Events\DepositBalanceEvent::class, $when_depositing_listener);
        }

        if ($when_withdrawal_listener) {
            \Illuminate\Support\Facades\Event::listen(\LaravelEG\UserWallet\App\Events\withdrawalBalanceEvent::class, $when_withdrawal_listener);
        }

        $this->publishes([
            __DIR__.'/../laravel/publishes/config/userwallet.php' => config_path('laraveleg/userwallet.php')
        ]);

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }
}