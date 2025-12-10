<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
</head>
<body>
    <h2>New Contact Message from Ventar Website</h2>

    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    @if(!empty($data['phone']))
        <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
    @endif
    <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $data['message'] }}</p>

    <hr>
    <p>Sent from contact page on {{ config('app.name') }}.</p>
</body>
</html>
