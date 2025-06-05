<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LastfmService;

class FrontpageController extends Controller
{
    protected $lastfmService;

    public function __construct(LastfmService $lastfmService)
    {
        $this->lastfmService = $lastfmService;
    }

    public function showTopTracks(Request $request)
    {
        $user = 'nannaluie';
        $data = $this->lastfmService->getTopTracks($user, 10);
        $topTracks = $data['toptracks']['track'] ?? [];
        return view('frontpage', compact('topTracks', 'user'));
    }
}
