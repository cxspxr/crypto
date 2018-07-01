<?php

use Illuminate\Database\Seeder;
use App\Ticket;
use App\Answer;

class TicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ticket::class, 15)->create()->each(function ($ticket) {
            factory(Answer::class, 10)->create()->each(function ($answer) use ($ticket) {
                $answer->ticket()->associate($ticket);
            });
        });
    }
}
