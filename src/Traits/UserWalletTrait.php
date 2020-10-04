<?php

namespace LaravelEG\UserWallet\Traits;

use LaravelEG\UserWallet\App\Models\UserWallet as UserWallet;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

trait UserWalletTrait
{

    public function getBalanceAttribute()
    {
        $totalAllDeposit = $this->walletRecords()->where('operation', '=', 'deposit')->sum('amount');
        $totalAllWithdrawal = $this->walletRecords()->where('operation', '=', 'withdrawal')->sum('amount');
    
        $total = ($totalAllDeposit-$totalAllWithdrawal);

        return $total;
    }

    public function depositBalance($amount, $details = NULL)
    {
        UserWallet::create([
            'user_id' => $this->id,
            'details' => $details,
            'amount' => $amount,
            'operation' => 'deposit'
        ]);
    }

    public function withdrawalBalance($amount, $details = NULL)
    {
        UserWallet::create([
            'user_id' => $this->id,
            'details' => $details,
            'amount' => $amount,
            'operation' => 'withdrawal'
        ]);
    }

    public function walletRecords()
    {
        return $this->hasMany(UserWallet::class, 'user_id', 'id');
    }
}
