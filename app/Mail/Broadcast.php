<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Broadcast extends Mailable
{
    use Queueable, SerializesModels;
    public $senderMail,$senderName,$title,$body,$category;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($senderMail, $senderName, $title, $body, $category)
    {
        $this->senderMail = $senderMail;
        $this->senderName = $senderName;
        $this->title = $title;
        $this->body = $body;
        $this->category = $category;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('post.broadcast')
                    ->subject('HATEK - Broadcast '.$this->category);
    }
}
