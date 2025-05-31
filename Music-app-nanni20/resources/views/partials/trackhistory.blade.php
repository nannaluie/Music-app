<!DOCTYPE html>
<html>
<head>
    <title>Track History</title>
</head>
<body>
<h1>API Data</h1>
@if(count($data))
    <ul>
        @foreach ($data as $item)
            <li>
                <strong>{{ $item['title'] }}</strong><br>
                {{ $item['body'] }}
            </li>
        @endforeach
    </ul>
@else
    <p>No data found or API error.</p>
@endif
</body>
</html>
