<h2>Thank you for registering!</h2>

<p>Hello {{ $participant->participant_name }},</p>

<p>Thank you for your interest in our exhibit.</p>

<p>Kindly click the link below to download the brochure:</p>
<p>
   <!-- Old: -->
<!-- <a href="https://example.com/brochure.pdf">Download Brochure</a> -->

<!-- New: -->
<a href="{{ route('brochure.download', ['recipient' => $participant->id]) }}">Download Brochure</a>
</p>

<p>Best Regards,<br>
{{ config('app.name') }}</p>