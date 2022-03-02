<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PhpParser\Node\Expr\Cast\Object_;

class CreateUserAcount extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject("Ativação de conta via email");
        $this->to($this->user->email, $this->user->name);
        $this->from('guilhermedev94@gmail.com', 'Suporte');

        return $this->view('conta.mail.create-user-acount-confirm', [
            'user' => $this->user
        ]);
    }
}
