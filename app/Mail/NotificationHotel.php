<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationHotel extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->message = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('Booking confirmation Hotel')->view('emails.new_booking')
                ->with('full_name', $this->message['full_name'])
                ->with('departure_date', $this->message['departure_date'])
                ->with('arrival_date', $this->message['arrival_date'])
                ->with('amount', $this->message['amount'])
                ->with('room', $this->message['room']);

    }
}
