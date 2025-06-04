<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function dailyTracksTimeline($user = 'rj')
    {
        $apiKey = env('LASTFM_API_KEY');
        // Get recent tracks (limit 200 for demo; can page for more)
        $url = "https://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks"
            . "&user=" . urlencode($user)
            . "&api_key=" . urlencode($apiKey)
            . "&format=json"
            . "&limit=200";

        $response = @file_get_contents($url);
        $data = $response ? json_decode($response, true) : [];
        $recentTracks = $data['recenttracks']['track'] ?? [];

        // Group by day and by track
        $trackDayCounts = [];
        $allDays = [];
        foreach ($recentTracks as $track) {
            if (!isset($track['date']['uts'])) {
                // Now playing, skip
                continue;
            }
            $date = date('Y-m-d', $track['date']['uts']);
            $trackName = $track['name'];
            $trackDayCounts[$trackName][$date] = ($trackDayCounts[$trackName][$date] ?? 0) + 1;
            $allDays[$date] = true;
        }

        // Sort days
        $days = array_keys($allDays);
        sort($days);

        // Get top 5 tracks by total plays in period
        $topTracks = array_slice(
            array_keys(
                array_map(
                    function($arr) { return array_sum($arr); },
                    $trackDayCounts
                ),
                SORT_DESC,
                true
            ),
            0,
            5
        );

        // Prepare data for chart.js
        $timelineData = [];
        foreach ($topTracks as $trackName) {
            $dataPoints = [];
            foreach ($days as $day) {
                $dataPoints[] = $trackDayCounts[$trackName][$day] ?? 0;
            }
            $timelineData[] = [
                'name' => $trackName,
                'data' => $dataPoints,
            ];
        }

        return view('graph', [
            'timelineData' => $timelineData,
            'days' => $days,
            'user' => $user
        ]);
    }
}
