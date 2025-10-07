<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use App\Livewire\Counter;

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

Route::get('/', function () {
    return view('welcome');
});

/* LIVEWIRE */
/* Counter */

Route::get('/counter', function () {
    return view('counter');
})->middleware(['auth', 'verified'])->name('counter');

Route::get('/create-post', function () {
    return view('create-post');
})->middleware(['auth', 'verified'])->name('create-post');

Route::get('/todo-list', function () {
    return view('todo-list');
})->middleware(['auth', 'verified'])->name('todo-list');

/* LIVEWIRE */

Route::get('/health', function (Request $request) {
    try {
        DB::connection()->getPdo();
        return response()->json([
            'OK' => true,
            'DB' => DB::connection()->getDatabaseName(),
            // 'user' => $request->user()?->name,
        ]);
    } catch (\Throwable $e) {
        return response()->json([
            'OK' => false,
            'error' => $e->getMessage()
        ], 500);
    }
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
