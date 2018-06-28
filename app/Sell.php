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

    public static function boot()
    {
        parent::boot();
        self::creating(function ($sell) {
            $sell->status_id = Status::whereName('processing')->first()->id;
        });
    }
}
