<!DOCTYPE html>
<html>
<head>
    <title>Daily Listens Timeline for {{ $user }}</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { background: #FFD1DC; font-family: Arial, sans-serif; }
        .container { background: #fff; border-radius: 15px; padding: 30px; max-width: 900px; margin: 45px auto; box-shadow: 0 2px 16px #f0acb8aa;}
        h1 { text-align: center; margin-bottom: 28px; }
        #timeline-chart { background: #fff; border-radius: 12px; }
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
    <h1>Daily Listens Timeline for {{ $user }}</h1>
    <canvas id="timeline-chart" height="320"></canvas>
</div>
<script>
    // Define a palette of distinct colors
    const colorPalette = [
        "#e75480", "#2196f3", "#ffb300", "#43a047", "#c2185b",
        "#8e24aa", "#ffa726", "#3949ab", "#00bcd4", "#f44336"
    ];

    const labels = @json($days);
    const datasets = [
            @foreach($timelineData as $idx => $track)
        {
            label: @json($track['name']),
            data: @json($track['data']),
            fill: false,
            borderColor: colorPalette[{{ $idx }} % colorPalette.length],
            backgroundColor: colorPalette[{{ $idx }} % colorPalette.length],
            tension: 0.2
        },
        @endforeach
    ];
    new Chart(document.getElementById('timeline-chart'), {
        type: 'line',
        data: { labels, datasets },
        options: {
            responsive: true,
            plugins: { legend: { position: 'bottom' }, title: { display: false } },
            scales: {
                y: { beginAtZero: true, title: { display: true, text: 'Listen count' } },
                x: { title: { display: true, text: 'Day' } }
            }
        }
    });
</script>
</body>
</html>
