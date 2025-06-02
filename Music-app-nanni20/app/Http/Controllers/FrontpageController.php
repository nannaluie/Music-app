<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontpageController extends Controller
{
    public function showTopTracks()
    {
        $user = 'nannaluie'; // <-- Change this to your Last.fm username
        $apiKey = env('LASTFM_API_KEY');
        $url = "https://ws.audioscrobbler.com/2.0/?method=user.gettoptracks"
            . "&user=" . urlencode($user)
            . "&api_key=" . urlencode($apiKey)
            . "&format=json&limit=10";

        $response = @file_get_contents($url);
        $data = $response ? json_decode($response, true) : [];
        $topTracks = $data['toptracks']['track'] ?? [];

        return view('frontpage', compact('topTracks', 'user'));
    }
}
