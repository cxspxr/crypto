<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
            $sell->status_id = Status::whereName('processing')->first()->id;

            $existingSell = Sell::whereTransaction($sell->transaction)
                ->whereHas('ticker', function ($query) use ($sell) {
                    $query->whereTicker($sell->ticker->ticker);
                })
                ->whereHas('status', function ($query) {
                    $query->whereNotIn('name', ['executed', 'cancelled']);
                })->first();

            if ($existingSell) {
                abort(403);
            }
        });
    }
}
