<?php

use Illuminate\Database\Seeder;
use App\Commission;

class CommissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Commission::create([
            'commission' => .1
        ]);

        Commission::create([
            'commission' => .08,
            'from' => 1000
        ]);

        Commission::create([
            'commission' => .07,
            'from' => 2000
        ]);
    }
}
