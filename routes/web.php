<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\EventlandingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PosterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/dashboard', [LandingPageController::class, 'index'])->name('dashboard');
DB::table('page_visits')->insert([
    'ip_address' => request()->ip(),
    'created_at' => now(),
    'updated_at' => now(),
]);
Route::get('/', [LandingPageController::class, 'linktree'])->name('linktree');

Route::get('/about', [LandingPageController::class, 'about'])->name('about');
Route::get('/location', [LandingPageController::class, 'location'])->name('location');
Route::get('/contact', [LandingPageController::class, 'contact'])->name('contact');
Route::post('/feedback', [LandingPageController::class, 'feedback'])->name('feedback');
Route::get('/menu', [LandingPageController::class, 'menu'])->name('menu');

Route::get('/event', [EventlandingController::class, 'index'])->name('event.index');
Route::get('/event/{slug}', [EventlandingController::class, 'show'])->name('event.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/events', EventController::class);
    Route::resource('/users', \App\Http\Controllers\Admin\UserController::class);
    Route::get('/feedback', [App\Http\Controllers\Admin\FeedbackController::class, 'index'])->name('feedback.index');
    Route::resource('/posters', App\Http\Controllers\Admin\PosterController::class);
    Route::resource('/menus', App\Http\Controllers\Admin\MenuController::class);
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::resource('/landing', \App\Http\Controllers\Admin\LandingContentController::class);


});



require __DIR__.'/auth.php';