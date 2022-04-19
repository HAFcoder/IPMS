<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $subject;
    public $type;

    public function __construct($details,$subject,$type)
    {
        $this->details = $details;
        $this->subject = $subject;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.customEmail')
                    ->subject($this->subject)
                    ->with('type', $this->type)
                    ->with('subject', $this->subject)
                    ->with('details', $this->details);
    }
}
