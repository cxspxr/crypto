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
        Ticker::create(['name' => 'Bitcoin', 'ticker' => 'tBTCUSD']);
        Ticker::create(['name' => 'Litecoin', 'ticker' => 'tLTCUSD']);
        Ticker::create(['name' => 'Ethereum', 'ticker' => 'tETHUSD']);
    }
}
