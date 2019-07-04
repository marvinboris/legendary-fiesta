<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TrainingShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $trainings;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($trainings, $user)
    {
        //
        $this->trainings = $trainings;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $trainingsArray = [];
        foreach ($this->trainings as $training) {
            $trainingsArray[] = $training;
        }
        return $this->subject('Mise à jour de la liste des formations')
                    ->view('emails.trainings', compact('trainingsArray', 'user'));
    }
}
