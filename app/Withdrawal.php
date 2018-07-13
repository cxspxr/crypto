<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Withdrawal extends Model
{
    protected $fillable = ['amount', 'card'];

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

        self::creating(function ($w) {
            $w->status()->associate(Status::whereName('processing')->first());

            if (!$w->user) {
                $w->user()->associate(Auth::user());
            }
        });

        self::updating(function ($w) {
            if ($w->status->name == 'complete') {
                $user = Auth::user();
                $user->balance = $user->balance - $w->amount;
                $user->save();
            }
        });
    }
}
