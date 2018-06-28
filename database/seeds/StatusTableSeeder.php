<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create(['name' => 'processing']);
        Status::create(['name' => 'filled']);
        Status::create(['name' => 'cancelled']);
        Status::create(['name' => 'executed']);
    }
}
