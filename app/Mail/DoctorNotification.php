<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DoctorNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $doctor;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($doctor)
    {
        //
        $this->doctor = $doctor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->doctor->hospital->email)
                    ->subject('OPMRS App: Patient Booking Notification')
                    ->view('email.notify');
    }
}
