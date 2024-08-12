<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FlockController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'index']);

Route::get('/dashboard', function () {
    $user = Auth::user();
    return view('dashboard', ['user'=> $user]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Flock Routes
Route::get('/flock', [FlockController::class, 'index']);
Route::post('/flock', [FlockController::class, 'addFlock']);
Route::get('/flock/edit/{id}', [FlockController::class, 'editBird']);
Route::get('/flock/delete/{id}', [FlockController::class, 'deleteBird']);
//Route::get('/chicken/{slug}', [FlockController::class, 'peepShow']);

// Other Routes
Route::get('/{slug}', [PageController::class, 'page']);

