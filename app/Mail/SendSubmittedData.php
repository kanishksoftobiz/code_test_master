<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSubmittedData extends Mailable
{
    use Queueable, SerializesModels;

    public $submittedData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($submittedData)
    {
        //
        $this->submittedData = $submittedData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Submitted data')->markdown('emails.submitted');
    }
}
