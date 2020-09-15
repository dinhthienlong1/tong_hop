<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;
    public $demo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demo)
    {
        $this->demo = $demo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sender@example.com')
            ->view('mails.mail')
            ->text('mails.mailtext')
            ->with(
                [
                    'testVarOne' => '1',
                    'testVarTwo' => '2',
                ]
            )
            ->attach(public_path('/images') . '/anhdep.jpg', [
                'as' => 'anhdep.jpg',
                'mime' => 'image/jpeg',
            ]);
    }
}
