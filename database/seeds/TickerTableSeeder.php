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
        Ticker::create(['name' => 'EOS', 'ticker' => 'tEOSUSD']);
        Ticker::create(['name' => 'Bitcoin Cash', 'ticker' => 'tBCHUSD']);
        Ticker::create(['name' => 'Iota', 'ticker' => 'tIOTUSD']);
        Ticker::create(['name' => 'Ripple', 'ticker' => 'tXRPUSD']);
        Ticker::create(['name' => 'NEO', 'ticker' => 'tNEOUSD']);
        Ticker::create(['name' => 'Monero', 'ticker' => 'tXMRUSD']);
        Ticker::create(['name' => 'ZCash', 'ticker' => 'tZECUSD']);
        Ticker::create(['name' => 'OMG', 'ticker' => 'tOMGUSD']);
        Ticker::create(['name' => 'Bitcoin Gold', 'ticker' => 'tBTGUSD']);
        Ticker::create(['name' => 'Tron', 'ticker' => 'tTRXUSD']);
        Ticker::create(['name' => '0x', 'ticker' => 'tZRXUSD']);
        Ticker::create(['name' => 'Quantum', 'ticker' => 'tQTMUSD']);
        Ticker::create(['name' => 'Verge', 'ticker' => 'tXVGUSD']);
        Ticker::create(['name' => 'ELF', 'ticker' => 'tELFUSD']);
        Ticker::create(['name' => 'FUN', 'ticker' => 'tFUNUSD']);
    }
}
