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
        Ticker::create(['name' => 'Bitcoin', 'ticker' => 'tBTCUSD', 'wallet' => Hash::make(str_random(120))]);
        Ticker::create(['name' => 'Litecoin', 'ticker' => 'tLTCUSD', 'wallet' => Hash::make(str_random(120))]);
        Ticker::create(['name' => 'Ethereum', 'ticker' => 'tETHUSD', 'wallet' => Hash::make(str_random(120))]);
        Ticker::create(['name' => 'EOS', 'ticker' => 'tEOSUSD', 'wallet' => Hash::make(str_random(120))]);
        Ticker::create(['name' => 'Bitcoin Cash', 'ticker' => 'tBCHUSD', 'wallet' => Hash::make(str_random(120))]);
        Ticker::create(['name' => 'Iota', 'ticker' => 'tIOTUSD', 'wallet' => Hash::make(str_random(120))]);
        Ticker::create(['name' => 'Ripple', 'ticker' => 'tXRPUSD', 'wallet' => Hash::make(str_random(120))]);
        Ticker::create(['name' => 'NEO', 'ticker' => 'tNEOUSD', 'wallet' => Hash::make(str_random(120))]);
        Ticker::create(['name' => 'Monero', 'ticker' => 'tXMRUSD', 'wallet' => Hash::make(str_random(120))]);
        Ticker::create(['name' => 'ZCash', 'ticker' => 'tZECUSD', 'wallet' => Hash::make(str_random(120))]);
        Ticker::create(['name' => 'OMG', 'ticker' => 'tOMGUSD', 'wallet' => Hash::make(str_random(120))]);
        Ticker::create(['name' => 'Bitcoin Gold', 'ticker' => 'tBTGUSD', 'wallet' => Hash::make(str_random(120))]);
        Ticker::create(['name' => 'Tron', 'ticker' => 'tTRXUSD', 'wallet' => Hash::make(str_random(120))]);
        Ticker::create(['name' => '0x', 'ticker' => 'tZRXUSD', 'wallet' => Hash::make(str_random(120))]);
        Ticker::create(['name' => 'Quantum', 'ticker' => 'tQTMUSD', 'wallet' => Hash::make(str_random(120))]);
        Ticker::create(['name' => 'Verge', 'ticker' => 'tXVGUSD', 'wallet' => Hash::make(str_random(120))]);
        Ticker::create(['name' => 'ELF', 'ticker' => 'tELFUSD', 'wallet' => Hash::make(str_random(120))]);
        Ticker::create(['name' => 'FUN', 'ticker' => 'tFUNUSD', 'wallet' => Hash::make(str_random(120))]);
    }
}
