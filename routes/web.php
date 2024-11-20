<?php

use App\Http\Controllers\ChampController;
use App\Http\Controllers\ComposantController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\PersonalisationController;
use App\Http\Controllers\PrevisualisationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/features', function () {
    return view('features');
});

Route::get('/login', function () {
    return view('login');
});


Route::resource('projets', ProjectController::class);
Route::resource('templates', TemplateController::class);
Route::resource('composants', ComposantController::class);
Route::resource('champs', ChampController::class);
Route::resource('imageuploads', ImageUploadController::class);
Route::resource('previsualisations', PrevisualisationController::class);
Route::resource('configurations', ConfigurationController::class);
Route::resource('personnalisations', PersonalisationController::class);