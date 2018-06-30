<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['content', 'read', 'is_response'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function requests()
    {
        return self::where('is_response', false);
    }

    public function responses()
    {
        return self::where('is_response', true);
    }
}
