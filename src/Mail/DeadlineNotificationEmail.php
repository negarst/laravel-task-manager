<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;

class DeadlineNotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Set up Mailgun mail driver
        // Retrieve Mailgun domain and secret from configuration
        $mailgunDomain = Config::get('task-manager.mail.mailgun.domain');
        $mailgunSecret = Config::get('task-manager.mail.mailgun.secret');

        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject('Hi! Your task deadline is within 24 hours.');
    }
}