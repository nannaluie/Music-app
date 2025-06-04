<!DOCTYPE html>
<html>
<head>
    <title>Last.fm music app nanni20</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .app-header {
            background: linear-gradient(90deg, #e75480 0%, #ffb6c1 100%);
            color: #fff;
            padding: 32px 0 18px 0;
            text-align: center;
            font-size: 2.3em;
            font-weight: bold;
            letter-spacing: 2px;
            box-shadow: 0 4px 18px #e7548055;
            margin-bottom: 24px;
        }
        .graph-btn {
            display: inline-block;
            margin: 24px auto 0;
            padding: 12px 26px;
            font-size: 1.15em;
            color: #fff;
            background-color: #e75480;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            box-shadow: 0 2px 8px #f0acb880;
            transition: background 0.2s;
        }
        .graph-btn:hover {
            background-color: #d14670;
        }
        .btn-container {
            width: 100%;
            text-align: center;
        }
        .top-tracks {
            margin: 40px auto 0;
            max-width: 600px;
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 2px 12px #f0acb8aa;
            padding: 28px;
        }
        .top-tracks h2 {
            text-align: center;
        }
        .track-list {
            list-style: none;
            padding: 0;
        }
        .track-list li {
            display: flex;
            align-items: center;
            margin-bottom: 18px;
            border-bottom: 1px solid #F8BBD0;
            padding-bottom: 10px;
        }
        .track-list img {
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
        .track-playcount {
            color: #888;
            font-size: 0.95em;
        }
    </style>
</head>
<body>
<div class="app-header">
    Last.fm music app nanni20
</div>
<div class="btn-container">
    <a href="{{ route('graph.timeline', ['user' => 'nannaluie']) }}" class="graph-btn">
        🎵 View Listening Graph
    </a>
</div>

<div class="top-tracks">
    <h2>Top Tracks for nannaluie</h2>
    @if(isset($topTracks) && count($topTracks))
        <ul class="track-list">
            @foreach($topTracks as $track)
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
                        <span class="track-artist">by {{ $track['artist']['name'] ?? '-' }}</span>
                        <span class="track-playcount">Plays: {{ $track['playcount'] ?? 'N/A' }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p style="text-align:center;">No top tracks found.</p>
    @endif
</div>
</body>
</html>
