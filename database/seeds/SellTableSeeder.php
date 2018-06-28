<?php

use Illuminate\Database\Seeder;
use App\Sell;

class SellTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sell::class, 10)->create();
    }
}
