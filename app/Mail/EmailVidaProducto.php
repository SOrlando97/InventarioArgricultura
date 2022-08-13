<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\historialentrada;

class EmailVidaProducto extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $historialentrada;
    public function __construct(historialentrada $historialentrada)
    {
        $this->historialentrada = $historialentrada;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(historialentrada $historialentrada)
    {
        return $this->markdown('emails.dailyReport', compact('historialentrada'));
    }
}
