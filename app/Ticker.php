<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticker extends Model
{
    protected $fillable = ['name', 'ticker'];

    protected $appends = ['pretty_ticker'];

    public function getPrettyTickerAttribute()
    {
        return substr(substr($this->ticker, 1), 0, -3);
    }
}
