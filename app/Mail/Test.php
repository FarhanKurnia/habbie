<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Test extends Mailable
{
    use Queueable, SerializesModels;
    public $data;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('/pages/mail/test')
                    ->subject('Request Forget Password')
                    ->with([
                        'data' => $this->data,
                        'image' => 'https://testing.habbie.co.id/storage/img/logo/logo-habbie.jpg', // Include the image URL
                    ]);
                    // ->with('data', $this->data);
    }
}