<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $data;

    public function __construct($data =[])
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
        return $this->from('man.site@gmail.com')->subject('New Customer')->view('mail')->with('data',$this->data)->attach($this->data['document']->getRealPath(),
    [
            'as' => $this->data['document']->getClientOriginalName(),
            'mime' =>$this->data['document']->getClientMimeType(),

    ]);
    }
}
