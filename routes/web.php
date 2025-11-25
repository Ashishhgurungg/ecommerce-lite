<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/about', function(){
    return view('about');
});

route::get('/articles', function(){
    return view('articles');
});

Route::get('/gallery', function(){
    return view('gallery');
});
Route::get('/contact', function(){
    return view('contact');
});
Route::get('/faq', function(){
    return view('faq');
});

Route::get('/services', [HomeController::class, 'showServicePage']);

Route::get('/add-services', [ServiceController::class, 'displayServiceForm']);
Route::post('/add-services', [ServiceController::class, 'addService']);
Route::get('/all-services', [ServiceController::class, 'listAllServices']);
Route::get('/update-services/{id}', [ServiceController::class, 'showUpdateForm']);
Route::post('/update-services', [ServiceController::class, 'updateService']);


Route::get('/articles', [ArticleController::class, 'show']);
