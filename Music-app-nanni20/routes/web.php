<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\GraphController;

Route::get('/', [GraphController::class, 'showTopTracksGraph']);
Route::get('/', [FrontpageController::class, 'showTopTracks']);

Route::get('/track/{artist}/{track}', [TrackController::class, 'showTrackInfo']);

Route::get('/user/{user}/toptracks', [UserController::class, 'showUserTopTracks']);
Route::get('/user/{user}/toptracks', [App\Http\Controllers\UserController::class, 'showUserTopTracks']);
