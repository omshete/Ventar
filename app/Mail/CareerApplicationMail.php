<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\UploadedFile;

class CareerApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;
    protected ?UploadedFile $resumeFile;

    /**
     * Create a new message instance.
     *
     * @param  array  $data
     * @param  \Illuminate\Http\UploadedFile|null  $resumeFile
     */
    public function __construct(array $data, ?UploadedFile $resumeFile = null)
    {
        $this->data = $data;
        $this->resumeFile = $resumeFile;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $mail = $this->subject('New Career Application: '.$this->data['job_title'])
                     ->view('emails.career_application')
                     ->with(['data' => $this->data]);

        // Attach resume if uploaded
        if ($this->resumeFile) {
            $mail->attach(
                $this->resumeFile->getRealPath(),
                [
                    'as'   => 'Resume_'.$this->data['name'].'.'.$this->resumeFile->getClientOriginalExtension(),
                    'mime' => $this->resumeFile->getClientMimeType(),
                ]
            );
        }

        return $mail;
    }
}
