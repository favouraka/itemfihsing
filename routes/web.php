<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Listing\Show as ShowListing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('listing/{listing}', ShowListing::class)->name('listing');

Route::get('shop', App\Http\Livewire\Pages\Shop::class)->name('shop');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('cart', \App\Http\Livewire\Cart::class)->name('cart');

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function(){
    Route::prefix('listing')->name('listing.')->group(function(){
        Route::get('all', \App\Http\Livewire\Dashboard\Listings\AllListings::class)->name('all');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
