<!DOCTYPE html>
<html>
<head>
    <title>{{ $user }}'s Top Tracks</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        img { vertical-align: middle; margin-right: 8px; }
        li { margin-bottom: 18px; }
    </style>
</head>
<body>
<h1>Top Tracks for {{ $user }}</h1>

@if(count($topTracks))
    <ol>
        @foreach($topTracks as $track)
            <li>
                @if(!empty($track['image'][2]['#text']))
                    <img src="{{ $track['image'][2]['#text'] }}" alt="cover" width="64" height="64">
                @endif
                <strong>{{ $track['name'] }}</strong> by {{ $track['artist']['name'] ?? '-' }}<br>
                <small>Playcount: {{ $track['playcount'] ?? 'N/A' }}</small>
            </li>
        @endforeach
    </ol>
@else
    <p>No top tracks found for this user or API error.</p>
@endif

</body>
</html>
