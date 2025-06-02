<!DOCTYPE html>
<html>
<head>
    <title>Top Albums for {{ $user }}</title>
    <link rel="stylesheet" href="{{ asset('css/candyfloss.css') }}">
    <style>
        .album-list { max-width: 800px; margin: 30px auto; }
        .album-list li { margin-bottom: 22px; display: flex; align-items: center; }
        .album-list img { vertical-align: middle; margin-right: 18px; width: 70px; height: 70px; border-radius: 8px; background: #eee; }
        .album-details { display: flex; flex-direction: column; }
        .album-title { font-weight: bold; font-size: 1.1em; }
        h1 { text-align: center; }
    </style>
</head>
<body>
<h1>Top Albums for {{ $user }}</h1>
@if(count($albums ?? []))
    <ol class="album-list">
        @foreach($albums as $album)
            <li>
                @if(!empty($album['image'][2]['#text']))
                    <img src="{{ $album['image'][2]['#text'] }}" alt="album cover">
                @else
                    <img src="https://via.placeholder.com/70?text=No+Image" alt="no cover">
                @endif
                <div class="album-details">
                    <span class="album-title">{{ $album['name'] }}</span>
                    <span>by {{ $album['artist']['name'] ?? '-' }}</span>
                    <small>Playcount: {{ $album['playcount'] ?? 'N/A' }}</small>
                </div>
            </li>
        @endforeach
    </ol>
@else
    <p style="text-align:center;">No albums found or API error.</p>
@endif
</body>
</html>
