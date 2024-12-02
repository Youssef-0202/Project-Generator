<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChampController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\ComposantController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\PersonalisationController;
use App\Http\Controllers\PrevisualisationController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\PasswordResetController;


Route::get('/', function () {
    return view('home');
});

Route::get('/features', function () {
    return view('features');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/contact', function(){
    return view('contact');
});
Route::get('temp1', [TemplateController::class, 'renderTemp1']);
// Route::get('temp1', function(){
//     return view('templates/temp1');
// });
Route::get('temp2', function(){
    return view('templates/temp2');
});

Route::get('temp3', function(){
    return view('templates/temp3');
});
 Route::get('builder' , [TemplateController::class , 'edit']);
 Route::post('/template/update/{componentName}', [TemplateController::class, 'update'])->name('update.component');

//Route::get('/preview/{templateId}', [TemplateController::class, 'preview'])->name('template.preview');

Route::resource('projets', ProjectController::class);
Route::resource('templates', TemplateController::class);
Route::resource('composants', ComposantController::class);
Route::resource('champs', ChampController::class);
Route::resource('imageuploads', ImageUploadController::class);
Route::resource('previsualisations', PrevisualisationController::class);
Route::resource('configurations', ConfigurationController::class);
Route::resource('personnalisations', PersonalisationController::class);





Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/forgot-password', [PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');

Route::get('register', [RegistrationController::class, 'create'])->name('register');
Route::post('register', [RegistrationController::class, 'store']);