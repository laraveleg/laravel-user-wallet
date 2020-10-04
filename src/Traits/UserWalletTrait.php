<?php

namespace LaravelEG\UserWallet\Traits;

use LaravelEG\UserWallet\App\Models\UserWallet as UserWallet;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

trait UserWalletTrait
{

    /**
     * Fetch user balance.
     *
     * @return balance
     */
    public function getBalanceAttribute()
    {
        $totalAllDeposit = $this->walletRecords()->where('operation', '=', 'deposit')->sum('amount');
        $totalAllWithdrawal = $this->walletRecords()->where('operation', '=', 'withdrawal')->sum('amount');
    
        $total = ($totalAllDeposit-$totalAllWithdrawal);

        return $total;
    }

    /**
     * To deposit into a user's wallet.
     *
     * @return void
     */
    public function depositBalance($amount, $details = NULL)
    {
        UserWallet::create([
            'user_id' => $this->id,
            'details' => $details,
            'amount' => $amount,
            'operation' => 'deposit'
        ]);
    }

    /**
     * For withdrawal from the user's wallet.
     *
     * @return void
     */
    public function withdrawalBalance($amount, $details = NULL)
    {
        UserWallet::create([
            'user_id' => $this->id,
            'details' => $details,
            'amount' => $amount,
            'operation' => 'withdrawal'
        ]);
    }

    /**
     * Fetch user wallet records.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function walletRecords()
    {
        return $this->hasMany(UserWallet::class, 'user_id', 'id');
    }
}
