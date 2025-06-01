<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class trackHistoryController extends Controller
{
    public function showTrackInfo($artist, $track)
    {
        $apiKey = env('LASTFM_API_KEY'); // Store your key in .env as LASTFM_API_KEY
        $url = "https://ws.audioscrobbler.com/2.0/?method=track.getInfo"
            . "&api_key=" . urlencode($apiKey)
            . "&artist=" . urlencode($artist)
            . "&track=" . urlencode($track)
            . "&format=json";

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        // Pass to view
        return view('track.info', ['trackInfo' => $data['track'] ?? []]);
    }
    public function showUserTopTracks($user)
    {
        $apiKey = env('LASTFM_API_KEY'); // Store your Last.fm API key in .env
        $url = "https://ws.audioscrobbler.com/2.0/?method=user.gettoptracks"
            . "&user=" . urlencode($user)
            . "&api_key=" . urlencode($apiKey)
            . "&format=json";

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        // The API returns tracks at $data['toptracks']['track']
        $topTracks = $data['toptracks']['track'] ?? [];

        return view('user.toptracks', compact('topTracks', 'user'));
    }
    //
}
