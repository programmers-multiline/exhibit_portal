<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Models\Participant;

use Illuminate\Mail\Mailables\Attachment;

class ParticipantBrochureMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    

    /**
     * Create a new message instance.
     */
    public $participant;

    public function __construct($participant)
    {
        $this->participant = $participant;
    }

    public function build()
    {
    

      /*  $file = storage_path('app/brochure/brochure.pdf');

        return $this->subject('Thank you for registering')
            ->view('emails.participant_brochure')
            ->attach($file, [
                'as'   => 'brochure.pdf',
                'mime' => 'application/pdf',
            ]); */

            $files = [
        storage_path('app/brochure/Brochure_msc.pdf'),
        storage_path('app/brochure/Brochure_mbi.pdf'), 
    ];

    $email = $this->subject('Thank you for registering')
                  ->view('emails.participant_brochure');

    foreach ($files as $file) {
        $email->attach($file, [
            'as'   => basename($file), // lalabas ang original filename
            'mime' => 'application/pdf',
        ]);
    }

    return $email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Participant Brochure Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
         return new Content(
        view: 'emails.participant_brochure',
    );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
   /*  public function attachments(): array
    {
        $attachments = [];
 
        // Check if system access contains "2" (COF)
       
            $filePath = public_path('brochure.pdf');
            if (file_exists($filePath)) {
                $attachments[] = Attachment::fromPath($filePath);
            }
      
 
        return $attachments;
    } */
}
