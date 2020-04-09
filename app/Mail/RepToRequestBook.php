<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RepToRequestBook extends Mailable
{
    use Queueable, SerializesModels;
    public $ans;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ans)
    {
        //
        // dd($link);
        $this->ans= $ans;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.repToRequest')->with('ans',$this->ans);
    }
}
