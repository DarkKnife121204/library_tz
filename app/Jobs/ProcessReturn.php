<?php

namespace App\Jobs;

use App\Models\Rental;
use App\Notifications\ReturnBook;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessReturn implements ShouldQueue
{
    use Queueable;

    public Rental $rental;

    public function __construct(Rental $rental)
    {
        $this->rental = $rental;
    }

    public function handle(): void
    {
        if ($this->rental->return_at==null)
        {
            $user = $this->rental->user;
            $mailData = [
                'name'=>$user->name,
                'book'=>$this->rental->book->title,
            ];

            $user->notify(new ReturnBook($mailData));
        }
    }
}
