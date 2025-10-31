<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

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

Route::get('/services', [ServiceController::class, 'show']);

Route::get('/add-services', [ServiceController::class, 'add']);
Route::post('/add-services', [ServiceController::class, 'addService']);

