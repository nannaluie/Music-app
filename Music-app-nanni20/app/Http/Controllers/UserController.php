<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function recentTracks($user = 'nannaluie')
    {
        $apiKey = env('LASTFM_API_KEY');
        $url = "https://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks"
            . "&user=" . urlencode($user)
            . "&api_key=" . urlencode($apiKey)
            . "&format=json";

        $response = @file_get_contents($url);
        $data = $response ? json_decode($response, true) : [];
        $recentTracks = $data['recenttracks']['track'] ?? [];

        return view('something1', compact('recentTracks', 'user'));
    }
}
