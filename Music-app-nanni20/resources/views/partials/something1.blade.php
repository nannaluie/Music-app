<!DOCTYPE html>
<html>
<head>
    <title>Recent Listens for {{ $user ?? 'User' }}</title>
    <link rel="stylesheet" href="{{ asset('css/candyfloss.css') }}">
    <style>
        body {
            background: #FFD1DC;
            font-family: Arial, sans-serif;
        }
        .recent-listens-container {
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            max-width: 750px;
            margin: 45px auto;
            box-shadow: 0 2px 16px #f0acb8aa;
        }
        h1 {
            text-align: center;
            margin-bottom: 28px;
        }
        .recent-list {
            list-style: none;
            padding: 0;
        }
        .recent-list li {
            display: flex;
            align-items: center;
            margin-bottom: 18px;
            border-bottom: 1px solid #F8BBD0;
            padding-bottom: 10px;
        }
        .recent-list img {
            width: 56px;
            height: 56px;
            border-radius: 6px;
            margin-right: 16px;
            background: #eee;
        }
        .track-details {
            display: flex;
            flex-direction: column;
        }
        .track-title {
            font-weight: bold;
            color: #C2185B;
        }
        .track-artist {
            color: #555;
        }
        .track-album {
            color: #888;
            font-size: 0.95em;
        }
        .track-time {
            color: #BA68C8;
            font-size: 0.93em;
            margin-top: 2px;
        }
        .now-playing {
            color: #43A047;
            font-size: 0.97em;
            margin-top: 2px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="recent-listens-container">
    <h1>Recent Listens for {{ $user ?? 'User' }}</h1>
    @if(isset($recentTracks) && count($recentTracks))
        <ul class="recent-list">
            @foreach($recentTracks as $track)
                <li>
                    @if(!empty($track['image'][2]['#text']))
                        <img src="{{ $track['image'][2]['#text'] }}" alt="cover">
                    @else
                        <img src="https://via.placeholder.com/56?text=No+Image" alt="no cover">
                    @endif
                    <div class="track-details">
                            <span class="track-title">
                                <a href="{{ $track['url'] ?? '#' }}" target="_blank" style="color:inherit;text-decoration:underline;">
                                    {{ $track['name'] ?? '-' }}
                                </a>
                            </span>
                        <span class="track-artist">by {{ $track['artist']['#text'] ?? $track['artist']['name'] ?? '-' }}</span>
                        @if(!empty($track['album']['#text']))
                            <span class="track-album">Album: {{ $track['album']['#text'] }}</span>
                        @endif
                        @if(isset($track['@attr']['nowplaying']))
                            <span class="now-playing">Now playing</span>
                        @elseif(isset($track['date']['#text']))
                            <span class="track-time">
                                    Played at: {{ $track['date']['#text'] }}
                                </span>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p style="text-align:center;">No recent listens found.</p>
    @endif
</div>
</body>
</html>
