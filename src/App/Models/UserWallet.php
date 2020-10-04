<?php

namespace LaravelEG\UserWallet\App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'laraveleg_user_wallets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'details',
        'amount',
        'operation'
    ];
}
