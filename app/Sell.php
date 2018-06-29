<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Redis;
use Auth;

class Sell extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function ticker()
    {
        return $this->belongsTo(Ticker::class);
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($sell) {
            $sell->status_id = Status::whereName('waiting')->first()->id;

            $existingSell = Sell::whereTransaction($sell->transaction)
                ->where('ticker_id', $sell->ticker_id)
                ->whereHas('status', function($query) use ($sell) {
                    $query->whereNotIn('name', ['executed', 'cancelled']);
                })
                ->first();

            if ($existingSell) {
                return false;
            }

            if (!$sell->user) {
                $sell->user()->associate(Auth::user());
            }
        });

        self::created(function ($sell) {
            Redis::publish('sell', json_encode([
                'transaction' => $sell->transaction,
                'ticker' => $sell->ticker->ticker,
                'user' => $sell->user->id,
                'ticker_id' => $sell->ticker->id
            ]));
        });
    }
}
