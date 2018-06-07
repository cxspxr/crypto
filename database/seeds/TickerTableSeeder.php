<?php

use Illuminate\Database\Seeder;
use App\Ticker;

class TickerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticker::create(['name' => 'tBTCUSD']);
        Ticker::create(['name' => 'tLTCUSD']);
        Ticker::create(['name' => 'tETHUSD']);
    }
}
