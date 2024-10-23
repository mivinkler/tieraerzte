<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nachricht von einem Website-Besucher</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .content {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            font-size: 12px;
            color: #777;
        }
        .message {
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="header">
            <h2>Nachricht von einem Website-Besucher</h2>
        </div>
        <div class="message">
            @if(!empty($data['earliest']))
                <p><strong>Baldmöglichster Termin:</strong> {{ $data['earliest'] }}</p>
            @endif
        
            @if(!empty($data['date']))
                <p><strong>Datum:</strong> {{ $data['date'] }}</p>
            @endif

            @if(!empty($data['time']))
                <p><strong>Uhrzeit:</strong> {{ $data['time'] }}</p>
            @endif

            @if(!empty($data['tageszeit']))
                <p><strong>Tageszeit:</strong> {{ $data['tageszeit'] }}</p>
            @endif
        
            @if(!empty($data['tiername']))
                <p><strong>Tiername:</strong> {{ $data['tiername'] }}</p>
            @endif
        
            @if(!empty($data['tierart']))
                <p><strong>Tierart:</strong> {{ $data['tierart'] }}</p>
            @endif
        
            @if(!empty($data['email']))
                <p><strong>Email:</strong> {{ $data['email'] }}</p>
            @endif

            @if(!empty($data['tel']))
                <p><strong>Telefon:</strong> {{ $data['tel'] }}</p>
            @endif
        
            @if(!empty($data['text']))
                <p><strong>Mitteilung:</strong> {{ $data['text'] }}</p>
            @endif
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} Ihr Unternehmen. Alle Rechte vorbehalten.</p>
        </div>
    </div>
</body>
</html>