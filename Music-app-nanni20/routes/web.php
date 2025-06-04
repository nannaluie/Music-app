<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\GraphController;


Route::get('/', [FrontpageController::class, 'showTopTracks']);
Route::get('/graph/{user?}', [GraphController::class, 'dailyTracksTimeline'])->name('graph.timeline');
Route::get('/topartist', [UserController::class, 'topArtists'])->name('user.topartists');
Route::get('/topalbum', [UserController::class, 'topAlbums'])->name('user.topalbums');
