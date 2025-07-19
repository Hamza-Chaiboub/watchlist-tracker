<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WatchListController;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/watchlist', [WatchListController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('watchlist.index');

Route::get('/dashboard', [WatchListController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/content/{content}', [ContentController::class, 'show'])->middleware(['auth', 'verified'])->name('content.show');
Route::get('/omdb/search', function (Request $request) {
    $validated = $request->validate([
        'query' => 'required|string|min:2|max:100'
    ]);

    try {
        $response = Http::get('http://www.omdbapi.com/', [
            'apikey' => env('OMDB_API_KEY'),
            's' => $validated['query']
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        return response()->json([
            'Response' => 'False',
            'Error' => 'Service unavailable'
        ], 502);

    } catch (\Exception $e) {
        return response()->json([
            'Response' => 'False',
            'Error' => $e->getMessage()
        ], 500);
    }
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
