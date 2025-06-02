<!DOCTYPE html>
<html>
<head>
    <title>Top Artists for {{ $user }}</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; margin: 40px; }
        .artist-list { max-width: 700px; margin: 30px auto; }
        .artist-list li { margin-bottom: 18px; }
        .artist-list img { vertical-align: middle; margin-right: 14px; width: 60px; height: 60px; border-radius: 6px; }
        h1 { text-align: center; }
    </style>
</head>
<body>
<h1>Top Artists for {{ $user }}</h1>
@if(count($artists ?? []))
    <ol class="artist-list">
        @foreach($artists as $artist)
            <li>
                @if(!empty($artist['image'][2]['#text']))
                    <img src="{{ $artist['image'][2]['#text'] }}" alt="artist image">
                @endif
                <strong>{{ $artist['name'] }}</strong>
                <br>
                <small>Playcount: {{ $artist['playcount'] ?? 'N/A' }}</small>
            </li>
        @endforeach
    </ol>
@else
    <p>No artists found or API error.</p>
@endif
</body>
</html>
