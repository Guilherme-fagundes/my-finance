<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecoverUserAcount extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $this->subject('Recuperação de senha');
        $this->to($this->users->email, $this->users->nome);
        $this->from('guilhermedev94@gmail.com', 'Sistema');


        return $this->view('conta.mail.recover-pass', [
            'user' => $this->users
        ]);
    }
}
