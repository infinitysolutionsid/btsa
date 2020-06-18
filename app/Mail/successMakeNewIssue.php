<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class successMakeNewIssue extends Mailable
{
    public $issueData;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($issueData)
    {
        $this->issueData = $issueData;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('report@btsa.co.id', 'Issue Report BTSA Logistics.')
            ->subject('[Ticket#' . $this->issueData->id . '] Important: Issue report have been made to our IR Portal.')
            ->with([
                'nama' => $this->issueData->nama_lengkap,
                'kendala' => $this->issueData->kendala,
                'tujuan' => $this->issueData->tujuan,
                'status' => $this->issueData->approve,
            ])
            ->markdown('emails.sites.newIssue');
}
