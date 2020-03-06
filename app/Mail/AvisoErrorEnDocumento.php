<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AvisoErrorEnDocumento extends Mailable
{
    use Queueable, SerializesModels;
    protected $mailData;


    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }


    public function build()
    {
        $mailData = array(
            'fechaBitDist' => $this->mailData['fecha'],
            'tipoerror' => $this->mailData['tipoerror'],
            'numdoc' => $this->mailData['numdoc'],
            'foliocompdocint' =>$this->mailData['foliocompdocint'],
            'reporta' => $this->mailData['reporta']
        );

        return $this->view('correos.avisoerror')
            ->with([
                'data' => $mailData
            ]);
    }
}
