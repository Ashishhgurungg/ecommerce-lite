<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/about', function(){
    return view('about');
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
Route::get('/delete-service/{id}', [ServiceController::class, 'deleteService'])->middleware(['auth', 'password.confirm']);


Route::get('/articles', [HomeController::class, 'showArticlePage']);

Route::get('/article-form', [ArticleController::class, 'articleForm']);
Route::post('/article-form', [ArticleController::class, 'createArticle']);
Route::get('/all-articles', [ArticleController::class, 'allArticles']);
Route::get('/delete-article/{id}', [ArticleController::class, 'deleteArticle'])->middleware(['auth', 'password.confirm']);
Route::get('/update-articles/{id}', [ArticleController::class, 'showUpdateForm']);
Route::post('/update-articles', [ArticleController::class, 'updateArticle']);

Route::get('/galleries', [HomeController::class, 'showGalleryPage']);

Route::get('/gallery-form', [GalleryController::class, 'galleryForm']);
Route::post('/gallery-form', [GalleryController::class, 'createGallery']);
Route::get('/all-galleries', [GalleryController::class, 'allGalleries']);
Route::get('/delete-gallery/{id}', [GalleryController::class, 'deleteGallery'])->middleware(['auth', 'password.confirm']);
Route::get('/update-galleries/{id}', [GalleryController::class, 'showUpdateForm']);
Route::post('/update-galleries', [GalleryController::class, 'updateGallery']);