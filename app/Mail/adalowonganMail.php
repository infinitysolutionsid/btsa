<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class adalowonganMail extends Mailable
{
    public $lokerID;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->lokerID = $lokerID;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('report@btsa.co.id', 'Ada Lowongan Kerja baru di BTSA Logistics!')
            ->subject('[UPDATED PROGRAM] Ada lowongan kerja baru di BTSA Logistics! Check it!')
            ->with([
                'posisi' => $this->lokerID->available_position,
                'created_at' => $this->lokerID->created_at,
            ])
            ->markdown('emails.sites.lowongan');
    }
}
