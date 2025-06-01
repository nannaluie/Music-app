<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('frontpage');
});
Route::get('/track/{artist}/{track}', [TrackController::class, 'showTrackInfo']);

Route::get('/user/{user}/toptracks', [UserController::class, 'showUserTopTracks']);
Route::get('/user/{user}/toptracks', [App\Http\Controllers\UserController::class, 'showUserTopTracks']);
