<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['is_open', 'content'];
    protected $appends = ['unread_responses', 'unread_requests'];

    public function sell()
    {
        return $this->belongsTo(Sell::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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

    public function getUnreadRequestsAttribute()
    {
        return $this->requests()->whereRead(false)->get()->count();
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
