<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

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
        /*return $this->from('nasreddine.dev.capital@gmail.com', 'Nasro')
            ->subject($this->details['subject'])->view('mail')->with('data', $this->details);*/

        /** attach file from disk **/
        return $this->view('notification')
            ->subject('This is notification')
            ->attach($this->data[0]);

        /*return $this->view('mail')
            ->attachFromStorage('C:\xampp\htdocs\vicidial_lv_server\vicidial_lv\public\storage\storage\audioZip.zip');*/

    }
}
