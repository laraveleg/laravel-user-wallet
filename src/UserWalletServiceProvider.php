<?php

namespace LaravelEG\UserWallet;

class UserWalletServiceProvider extends \Illuminate\Support\ServiceProvider
{
    
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }
    
}