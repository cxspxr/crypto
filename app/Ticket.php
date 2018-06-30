<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['is_open', 'content'];

    public function sell()
    {
        return $this->belongsTo(Sell::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function boot()
    {
        parent::boot();

        self::creating(function ($ticket) {
            $existingTicket = self::where('is_open', true)
                ->where('sell_id', $ticket->sell_id)
                ->first();

            if ($existingTicket) {
                return false;
            }
        });
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
