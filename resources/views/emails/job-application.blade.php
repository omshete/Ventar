<!DOCTYPE html>
<html>
<head>
    <title>New Job Application</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .header { background: linear-gradient(135deg, #f59e0b, #ef4444); color: white; padding: 20px; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background: #f8f9fa; font-weight: bold; width: 150px; }
        .cover-letter { background: #f8f9fa; padding: 20px; border-left: 5px solid #f59e0b; margin: 20px 0; }
        .footer { background: #f1f5f9; padding: 15px; text-align: center; font-size: 12px; color: #64748b; }
    </style>
</head>
<body>
    <div class="header">
        <h1>🚀 New Job Application Received!</h1>
    </div>

    <table>
        <tr><th>Position:</th><td><strong>{{ $data['job_title'] }}</strong></td></tr>
        <tr><th>Location:</th><td>{{ $data['job_location'] }}</td></tr>
        <tr><th>Type:</th><td>{{ $data['job_type'] }}</td></tr>
        <tr><th>Full Name:</th><td>{{ $data['name'] }}</td></tr>
        <tr><th>Email:</th><td><a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a></td></tr>
        @if(isset($data['phone']) && $data['phone'])
        <tr><th>Phone:</th><td>{{ $data['phone'] }}</td></tr>
        @endif
        @if(isset($data['portfolio']) && $data['portfolio'])
        <tr><th>Portfolio:</th><td><a href="{{ $data['portfolio'] }}" target="_blank">{{ $data['portfolio'] }}</a></td></tr>
        @endif
    </table>

    @if(isset($data['cover_letter']) && $data['cover_letter'])
    <div class="cover-letter">
        <h3>📝 Cover Letter:</h3>
        <p>{{ nl2br(e($data['cover_letter'])) }}</p>
    </div>
    @endif

    <div class="footer">
        <p>Applied via <strong>Ventar Careers Page</strong> on {{ now()->format('M d, Y g:i A') }}</p>
        <p>✅ Application received successfully</p>
    </div>
</body>
</html>
