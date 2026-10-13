<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\EnclosureController;
use App\Http\Controllers\KeeperController;
use App\Http\Controllers\FeedingRecordController;

Route::get('/', function () {
    return redirect()->route('animals.index');
});

Route::resource('animals', AnimalController::class);
Route::resource('species', SpeciesController::class);
Route::resource('enclosures', EnclosureController::class);
Route::resource('keepers', KeeperController::class);
Route::resource('feeding-records', FeedingRecordController::class);