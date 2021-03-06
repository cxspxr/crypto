<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ConfigTableSeeder::class);
        $this->call(CommissionTableSeeder::class);
        $this->call(TickerTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(AdminTableSeeder::class);
    }
}
