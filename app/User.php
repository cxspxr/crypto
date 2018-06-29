<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    protected $appends = ['pretty_balance'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sells()
    {
        return $this->hasMany(Sell::class);
    }

    public function getPrettyBalanceAttribute()
    {
        return number_format($this->balance * Config::first()->currency_rate, 2, '.', ' ') . " руб.";
    }
}
