<?php
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\TvController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::get('/', [NewsController::class,'index'] )->name('news.index');
Route::get('/news/{id}',[NewsController::class,'show'])->name('news.show');


Route::get('/movies', [MoviesController::class,'index'] )->name('movies.index');
Route::get('/movies/{id}',[MoviesController::class,'show'])->name('movies.show');

Route::get('/tv', [TvController::class,'index'] )->name('tv.index');
Route::get('/tv/{id}',[TvController::class,'show'])->name('tv.show');



// Route::get('/', 'MoviesController@index')->name('movies.index');
// Route::get('/movies/{movie}', 'MoviesController@show')->name('movies.show');
Route::get('/actors', [ActorsController::class,'index'] )->name('actors.index');
Route::get('/actors/page/{page?}', [ActorsController::class,'index'] );
Route::get('/actors/{id}',[ActorsController::class,'show'])->name('actors.show');



// Route::get('/wishlist', [WishlistController::class,'index'] )->name('wishlist.index');
// Route::get('/wishlist/{id}',[WishlistController::class,'show'])->name('wishlist.show');





Auth::routes();

Route::get('/wishlist', [\App\Http\Controllers\HomeController::class, 'index'])->name('wishlist.index');
Route::get('/wishlist/store', [\App\Http\Controllers\HomeController::class, 'store'])->name('wishlist.store');
Route::get('delete/{id}',[App\Http\Controllers\HomeController::class,'destroy'])->name('wishlist.destroy');
