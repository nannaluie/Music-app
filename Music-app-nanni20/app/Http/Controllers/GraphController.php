<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function showTopTracksGraph()
    {
        $user = 'nannaluie'; // <-- replace with your Last.fm username
        $apiKey = env('LASTFM_API_KEY');
        $limit = 200; // Max allowed by Last.fm per request

        $url = "https://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks"
            . "&user=" . urlencode($user)
            . "&api_key=" . urlencode($apiKey)
            . "&format=json"
            . "&limit={$limit}";

        $response = @file_get_contents($url);
        $data = $response ? json_decode($response, true) : [];

        $trackPlays = [];
        $allDates = [];

        if (!empty($data['recenttracks']['track'])) {
            foreach ($data['recenttracks']['track'] as $track) {
                if (isset($track['date']['uts'])) {
                    $date = date('Y-m-d', $track['date']['uts']);
                    $song = $track['name'] . ' - ' . ($track['artist']['#text'] ?? '');

                    // Group plays per date per song
                    if (!isset($trackPlays[$song])) $trackPlays[$song] = [];
                    if (!isset($trackPlays[$song][$date])) $trackPlays[$song][$date] = 0;
                    $trackPlays[$song][$date]++;
                    $allDates[$date] = true;
                }
            }
        }

        // Sort all dates
        $allDates = array_keys($allDates);
        sort($allDates);

        // Prepare data for graph: for each song, fill missing dates with 0
        $graphData = [];
        foreach ($trackPlays as $song => $dateCounts) {
            $counts = [];
            foreach ($allDates as $date) {
                $counts[] = $dateCounts[$date] ?? 0;
            }
            $graphData[] = [
                'label' => $song,
                'data' => $counts,
            ];
        }

        return view('frontpage', [
            'user' => $user,
            'allDates' => $allDates,
            'graphData' => $graphData,
        ]);
    }
}
