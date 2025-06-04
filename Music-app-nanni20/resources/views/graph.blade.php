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
    </style>
</head>
<body>
<div class="container">
    <h1>Daily Listens Timeline for {{ $user }}</h1>
    <canvas id="timeline-chart" height="320"></canvas>
</div>
<script>
    const labels = @json($days);
    const datasets = [
            @foreach($timelineData as $track)
        {
            label: @json($track['name']),
            data: @json($track['data']),
            fill: false,
            borderColor: '#' + Math.floor(Math.random()*16777215).toString(16),
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
