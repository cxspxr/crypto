<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['content', 'read', 'is_response'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
