<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Career Application</title>
</head>
<body>
    <h2>New Career Application from Ventar Website</h2>

    <h3>Job Details</h3>
    <p><strong>Title:</strong> {{ $data['job_title'] }}</p>
    <p><strong>Location:</strong> {{ $data['job_location'] }}</p>
    <p><strong>Type:</strong> {{ $data['job_type'] }}</p>

    <h3>Candidate Details</h3>
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    @if(!empty($data['phone']))
        <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
    @endif
    @if(!empty($data['portfolio']))
        <p><strong>Portfolio/LinkedIn:</strong> {{ $data['portfolio'] }}</p>
    @endif

    @if(!empty($data['cover_letter']))
        <h3>Cover Letter</h3>
        <p>{{ $data['cover_letter'] }}</p>
    @endif

    <hr>
    <p>Sent from careers page on {{ config('app.name') }}.</p>
</body>
</html>
