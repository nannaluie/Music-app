<!DOCTYPE html>
<html>
<head>
    <title>Top Artists for {{ $user }}</title>
    <style>
        body { background: #FFD1DC; font-family: Arial, sans-serif; }
        .container { background: #fff; border-radius: 15px; padding: 30px; max-width: 700px; margin: 45px auto; box-shadow: 0 2px 16px #f0acb8aa;}
        h1 { text-align: center; margin-bottom: 28px; }
        .artist-list { list-style: none; padding: 0; }
        .artist-list li {
            display: flex;
            align-items: center;
            margin-bottom: 18px;
            border-bottom: 1px solid #F8BBD0;
            padding-bottom: 10px;
        }
        .artist-list img {
            width: 56px;
            height: 56px;
            border-radius: 6px;
            margin-right: 16px;
            background: #eee;
        }
        .artist-details {
            display: flex;
            flex-direction: column;
        }
        .artist-name {
            font-weight: bold;
            color: #C2185B;
        }
        .artist-playcount {
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
    <h1>Top Artists for {{ $user }}</h1>
    @if(count($topArtists))
        <ul class="artist-list">
            @foreach($topArtists as $artist)
                <li>
                    @if(!empty($artist['image'][2]['#text']))
                        <img src="{{ $artist['image'][2]['#text'] }}" alt="artist cover">
                    @else
                        <img src="https://via.placeholder.com/56?text=No+Image" alt="no cover">
                    @endif
                    <div class="artist-details">
                        <span class="artist-name">
                            <a href="{{ $artist['url'] ?? '#' }}" target="_blank" style="color:inherit;text-decoration:underline;">
                                {{ $artist['name'] ?? '-' }}
                            </a>
                        </span>
                        <span class="artist-playcount">Plays: {{ $artist['playcount'] ?? 'N/A' }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p style="text-align:center;">No artists found.</p>
    @endif
</div>
</body>
</html>
