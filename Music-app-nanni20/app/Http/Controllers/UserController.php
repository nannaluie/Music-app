<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUserTopTracks($user)
    {
        $apiKey = env('LASTFM_API_KEY');
        $url = "https://ws.audioscrobbler.com/2.0/?method=user.gettoptracks"
            . "&user=" . urlencode($user)
            . "&api_key=" . urlencode($apiKey)
            . "&format=json";

        $response = @file_get_contents($url);
        $data = $response ? json_decode($response, true) : [];

        $topTracks = $data['toptracks']['track'] ?? [];

        return view('user.toptracks', compact('topTracks', 'user'));
    }
}
