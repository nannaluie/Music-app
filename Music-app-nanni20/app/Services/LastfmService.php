<?php

namespace App\Services;

class LastfmService
{
    protected $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getTopTracks(string $user, $limit = 10)
    {
        $url = "https://ws.audioscrobbler.com/2.0/?method=user.gettoptracks&user={$user}&api_key={$this->apiKey}&format=json&limit={$limit}";
        $response = @file_get_contents($url);
        return $response ? json_decode($response, true) : [];
    }
}
