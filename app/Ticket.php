<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['is_open', 'content'];
    protected $appends = ['unread_responses'];

    public function sell()
    {
        return $this->belongsTo(Sell::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
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

    public function requests()
    {
        return $this->hasMany(Answer::class)->where('is_response', false);
    }

    public function responses()
    {
        return $this->hasMany(Answer::class)->where('is_response', true);
    }

    public function getUnreadResponsesAttribute()
    {
        return $this->responses()->whereRead(false)->get()->count();
    }

    public function readResponses()
    {
        $this->responses()->whereRead(false)->update(['read' => true]);
    }

    public function readRequests()
    {
        $this->requests()->whereRead(false)->update(['read' => true]);
    }
}
