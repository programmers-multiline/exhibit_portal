<h2>Thank you for registering!</h2>

<p>Hello {{ $participant->participant_name }},</p>

<p>Thank you for your interest in our exhibit.</p>

<p>You can download the brochure here:</p>
<p>

<!-- New: -->
<a href="{{ route('brochure.download', ['recipient' => $recipient->id]) }}">Download Brochure</a>
</p>

<p>Best Regards,<br>
{{ config('app.name') }}</p>