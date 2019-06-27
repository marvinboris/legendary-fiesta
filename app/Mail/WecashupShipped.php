<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WecashupShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The WeCashUp transaction instance.
     *
     * @var Wecashup
     */
    public $transaction;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Wecashup $transaction)
    {
        //
        $this->transaction = $transaction;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.wecashup.shipped');
    }
}
