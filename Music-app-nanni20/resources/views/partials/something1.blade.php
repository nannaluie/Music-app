<!DOCTYPE html>
<html>
<head>
    <title>Recent Tracks for {{ $user }}</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; margin: 40px; }
        .track-list { max-width: 700px; margin: 30px auto; }
        .track-list li { margin-bottom: 14px; }
        .track-list img { vertical-align: middle; margin-right: 10px; width: 44px; height: 44px; border-radius: 4px; }
        h1 { text-align: center; }
    </style>
</head>
<body>
<h1>Recent Tracks for {{ $user }}</h1>
@if(count($tracks ?? []))
    <ul class="track-list">
        @foreach($tracks as $track)
            <li>
                @if(!empty($track['image'][1]['#text']))
                    <img src="{{ $track['image'][1]['#text'] }}" alt="cover">
                @endif
                <strong>{{ $track['name'] }}</strong>
                by {{ $track['artist']['#text'] ?? '-' }}
                @if(isset($track['date']['uts']))
                    <small>({{ date('Y-m-d H:i', $track['date']['uts']) }})</small>
                @else
                    <small>(Now Playing)</small>
                @endif
            </li>
        @endforeach
    </ul>
@else
    <p>No recent tracks found.</p>
@endif
</body>
</html>
