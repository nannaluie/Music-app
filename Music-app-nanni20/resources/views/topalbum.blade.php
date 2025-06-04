<!DOCTYPE html>
<html>
<head>
    <title>Top Albums for {{ $user }}</title>
    <style>
        body { background: #FFD1DC; font-family: Arial, sans-serif; }
        .container { background: #fff; border-radius: 15px; padding: 30px; max-width: 700px; margin: 45px auto; box-shadow: 0 2px 16px #f0acb8aa;}
        h1 { text-align: center; margin-bottom: 28px; }
        .album-list { list-style: none; padding: 0; }
        .album-list li {
            display: flex;
            align-items: center;
            margin-bottom: 18px;
            border-bottom: 1px solid #F8BBD0;
            padding-bottom: 10px;
        }
        .album-list img {
            width: 56px;
            height: 56px;
            border-radius: 6px;
            margin-right: 16px;
            background: #eee;
        }
        .album-details {
            display: flex;
            flex-direction: column;
        }
        .album-title {
            font-weight: bold;
            color: #C2185B;
        }
        .album-artist {
            color: #555;
        }
        .album-playcount {
            color: #888;
            font-size: 0.95em;
        }
        .back-btn {
            position: absolute;
            top: 22px;
            left: 32px;
            padding: 10px 22px;
            background-color: #e75480;
            color: #fff;
            border: none;
            border-radius: 7px;
            text-decoration: none;
            font-size: 1em;
            font-weight: bold;
            box-shadow: 0 2px 8px #f0acb880;
            transition: background 0.2s;
            z-index: 10;
        }
        .back-btn:hover {
            background-color: #d14670;
        }
    </style>
</head>
<body>
<a href="{{ url('/') }}" class="back-btn">← Back to Frontpage</a>
<div class="container">
    <h1>Top Albums for {{ $user }}</h1>
    @if(count($topAlbums))
        <ul class="album-list">
            @foreach($topAlbums as $album)
                <li>
                    @if(!empty($album['image'][2]['#text']))
                        <img src="{{ $album['image'][2]['#text'] }}" alt="album cover">
                    @else
                        <img src="https://via.placeholder.com/56?text=No+Image" alt="no cover">
                    @endif
                    <div class="album-details">
                        <span class="album-title">
                            <a href="{{ $album['url'] ?? '#' }}" target="_blank" style="color:inherit;text-decoration:underline;">
                                {{ $album['name'] ?? '-' }}
                            </a>
                        </span>
                        <span class="album-artist">by {{ $album['artist']['name'] ?? '-' }}</span>
                        <span class="album-playcount">Plays: {{ $album['playcount'] ?? 'N/A' }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p style="text-align:center;">No albums found.</p>
    @endif
</div>
</body>
</html>
