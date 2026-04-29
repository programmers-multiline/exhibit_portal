<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrochureDownload;
use App\Mail\ParticipantBrochureMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\Participants;

class BrochureController extends Controller
{
  /*   public function download(Request $request)
    {
        $recipientId = $request->query('participants'); // id passed in email link

        // Find recipient email
        $email = $recipientId 
            ? \App\Models\User::find($recipientId)->email ?? 'guest@example.com'
            : $request->input('email', 'guest@example.com');

        // Log download
        BrochureDownload::create([
            'recipient_id'  => $recipientId,
            'email'         => $email,
            'downloaded_at' => Carbon::now(),
        ]);

        // Optional: send confirmation email (queued)
        Mail::to($email)->queue(new ParticipantBrochureMail());

        // Return file download
        $file = public_path('storage/brochure/brochure.pdf');
        return response()->download($file, 'brochure.pdf');
    } */
   public function download(Request $request)
{
    $recipientId = $request->recipient;

    $participant = \App\Models\Participants::find($recipientId);

    BrochureDownload::create([
        'recipient_id'  => $recipientId,
        'email'         => $participant->participant_email ?? null,
        'downloaded_at' => now()
    ]);

   // $file = storage_path('brochure/brochure.pdf');

    $file = storage_path('app/brochure/brochure.pdf');


    return response()->download($file);
}
}