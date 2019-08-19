<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactusMail extends Mailable
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
        //return $this->view('view.name'); dynamic_email_template.blade.php
        return $this->from('khalil.devmail@gmail.com')->subject('New Customer Enquery - CodeSchool')->view('contactus.dynamic_email_template')->with('data', $this->data); 
    }
}
