<?php

namespace App\Http\Controllers;

class UserController extends Controller
{

    public function topArtists()
    {
        $apiKey = env('LASTFM_API_KEY');
        $user = 'nannaluie'; // You can make this dynamic if needed

        $url = "https://ws.audioscrobbler.com/2.0/?method=user.gettopartists"
            . "&user=" . urlencode($user)
            . "&api_key=" . urlencode($apiKey)
            . "&format=json";

        $response = @file_get_contents($url);
        $data = $response ? json_decode($response, true) : [];
        $topArtists = $data['topartists']['artist'] ?? [];

        return view('topartist', [
            'topArtists' => $topArtists,
            'user' => $user
        ]);
    }
    public function topAlbums()
    {
        $apiKey = env('LASTFM_API_KEY');
        $user = 'nannaluie';

        $url = "https://ws.audioscrobbler.com/2.0/?method=user.gettopalbums"
            . "&user=" . urlencode($user)
            . "&api_key=" . urlencode($apiKey)
            . "&format=json";

        $response = @file_get_contents($url);
        $data = $response ? json_decode($response, true) : [];
        $topAlbums = $data['topalbums']['album'] ?? [];

        return view('topalbum', [
            'topAlbums' => $topAlbums,
            'user' => $user,
        ]);
    }

}
