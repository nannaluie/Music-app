<!DOCTYPE html>
<html>
<head>
    <title>Top Tracks for {{ $user }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        img { vertical-align: middle; margin-right: 8px; }
        li { margin-bottom: 18px; }
    </style>
</head>
<body>
<h1>Top Tracks for {{ $user }}</h1>

@if(isset($topTracks) && count($topTracks))
    <div class="top-tracks-section">
        <h2>Top Tracks the last week</h2>
        <ol class="top-tracks-list">
            @foreach($topTracks as $track)
                <li>
                    @if(!empty($track['image'][2]['#text']))
                        <img src="{{ $track['image'][2]['#text'] }}" alt="cover" width="48" height="48">
                    @else
                        <img src="https://via.placeholder.com/48?text=No+Image" alt="no cover" width="48" height="48">
                    @endif
                    <strong>{{ $track['name'] }}</strong>
                    by {{ $track['artist']['name'] ?? '-' }}
                    <br>
                    <small>Playcount: {{ $track['playcount'] ?? 'N/A' }}</small>
                </li>
            @endforeach
        </ol>
    </div>
@endif

</body>
</html>
