<!DOCTYPE html>
<html>
<head>
    <title>{{ $user }}'s Recent Listens</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        img { vertical-align: middle; margin-right: 8px; }
        li { margin-bottom: 18px; }
    </style>
</head>
<body>
<h1>Recent Listens for {{ $user }}</h1>

@if(count($recentTracks ?? []))
    <ul>
        @foreach($recentTracks as $track)
            <li>
                @if(!empty($track['image'][2]['#text']))
                    <img src="{{ $track['image'][2]['#text'] }}" alt="cover" width="64" height="64">
                @endif
                <strong>{{ $track['name'] }}</strong>
                by {{ $track['artist']['#text'] ?? '-' }}
                <br>
                <small>
                    Album: {{ $track['album']['#text'] ?? '-' }}<br>
                    Played at:
                    @if(isset($track['date']['uts']))
                        {{ date('Y-m-d H:i:s', $track['date']['uts']) }}
                    @else
                        <em>Now Playing</em>
                    @endif
                </small>
            </li>
        @endforeach
    </ul>
@else
    <p>No recent listens found for this user or API error.</p>
@endif

</body>
</html>
