<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PractitionerLoginDetails extends Mailable
{
    use Queueable, SerializesModels;
    public $password, $fullname, $phone, $email, $hospital_email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password, $fullname, $phone, $email, $hospital_email)
    {
        //
        $this->password = $password;
        $this->phone = $phone;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->hospital_email = $hospital_email;



    }

    /**
     * Build the message.  
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->from($this->hospital_email)
                    ->subject('OPMRS App: Practitioner Account Login Details')
                    ->view('email.confirm');
    }
}
