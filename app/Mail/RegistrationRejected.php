<?php

namespace App\Mail;

use App\Admission;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationRejected extends Mailable
{
    use Queueable, SerializesModels;

    public $admission;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Admission $admission)
    {
        $this->admission = $admission;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.reject');
    }
}
