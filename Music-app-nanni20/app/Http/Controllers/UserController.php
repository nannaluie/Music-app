<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showRecentTracks()
    {
        $user = 'nannaluie'; // Or use 'nannaluie' if you want your own user
        $apiKey = env('LASTFM_API_KEY');
        $url = "https://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks"
            . "&user=" . urlencode($user)
            . "&api_key=" . urlencode($apiKey)
            . "&format=json"
            . "&limit=20";

        $response = @file_get_contents($url);
        $tracks = [];
        if ($response) {
            $data = json_decode($response, true);
            $tracks = $data['recenttracks']['track'] ?? [];
        }

        return view('something1', [
            'tracks' => $tracks,
            'user' => $user,
        ]);
    }
    public function showTopArtists()
    {
        $user = 'rj'; // Change to 'nannaluie' if you want your own user
        $apiKey = env('LASTFM_API_KEY');
        $url = "https://ws.audioscrobbler.com/2.0/?method=user.gettopartists"
            . "&user=" . urlencode($user)
            . "&api_key=" . urlencode($apiKey)
            . "&format=json"
            . "&limit=20";

        $response = @file_get_contents($url);
        $artists = [];
        if ($response) {
            $data = json_decode($response, true);
            $artists = $data['topartists']['artist'] ?? [];
        }

        return view('something2', [
            'artists' => $artists,
            'user' => $user,
        ]);
    }
    public function showTopAlbums()
    {
        $user = 'nannaluie'; // You can change to 'nannaluie' if needed
        $apiKey = env('LASTFM_API_KEY');
        $url = "https://ws.audioscrobbler.com/2.0/?method=user.gettopalbums"
            . "&user=" . urlencode($user)
            . "&api_key=" . urlencode($apiKey)
            . "&format=json"
            . "&limit=20";

        $response = @file_get_contents($url);
        $albums = [];
        if ($response) {
            $data = json_decode($response, true);
            $albums = $data['topalbums']['album'] ?? [];
        }

        return view('something3', [
            'albums' => $albums,
            'user' => $user,
        ]);
    }
}
