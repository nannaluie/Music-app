<!DOCTYPE html>
<html>
<head>
    <title>Top Tracks Graph for {{ $user }}</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        #chart-container { width: 100%; max-width: 900px; margin: 0 auto; }
    </style>
</head>
<body>
<h1>Recent Listening History for {{ $user }}</h1>
<div id="chart-container">
    <canvas id="topTracksChart"></canvas>
</div>

@if(count($graphData))
    <script>
        const ctx = document.getElementById('topTracksChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($allDates),
                datasets: [
                        @foreach($graphData as $dataset)
                    {
                        label: {!! json_encode($dataset['label']) !!},
                        data: {!! json_encode($dataset['data']) !!},
                        borderColor: '#' + Math.floor(Math.random()*16777215).toString(16),
                        backgroundColor: 'rgba(0,0,0,0.0)',
                        fill: false,
                        tension: 0.2
                    },
                    @endforeach
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    title: {
                        display: true,
                        text: 'Scrobbles per Track per Day (Recent Plays)'
                    }
                },
                interaction: {
                    mode: 'nearest',
                    intersect: false
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Plays'
                        }
                    }
                }
            }
        });
    </script>
@else
    <p>No recent listening data found.</p>
@endif
</body>
</html>
