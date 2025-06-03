<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\GraphController;

Route::get('/something1', [UserController::class, 'showRecentTracks'])->name('something1');
Route::get('/', [GraphController::class, 'showTopTracksGraph']);
Route::get('/', [FrontpageController::class, 'showTopTracks']);
//Route::get('/recent/{user}', [App\Http\Controllers\UserController::class, 'recentListens']);
//Route::get('/track/{artist}/{track}', [TrackController::class, 'showTrackInfo']);
//Route::get('/user/{user}/recentlistens', [App\Http\Controllers\UserController::class, 'showRecentListens']);
//Route::get('/user/{user}/toptracks', [UserController::class, 'showUserTopTracks']);
//Route::get('/user/{user}/toptracks', [App\Http\Controllers\UserController::class, 'showUserTopTracks']);
Route::get('/graph', [App\Http\Controllers\GraphController::class, 'show'])->name('graph.show');
Route::get('/something2', [UserController::class, 'showTopArtists'])->name('something2');
Route::get('/something3', [UserController::class, 'showTopAlbums'])->name('something3');
