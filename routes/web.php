<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WatchListController;
use App\Models\Status;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
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

Route::get('/dashboard', function () {
//    $user = auth()->user();
//    $stats = [
//        'total' => $user->watchLists()->count(),
//        'watching' => $user->watchLists()
//                            ->whereHas('status', function($query) {
//                                $query->where('name', 'watching');
//                            })
//                            ->count(),
//        'completed' => $user->watchLists()
//                            ->whereHas('status', function($query) {
//                                $query->where('name', 'completed');
//                            })
//                            ->count(),
//        'wantToWatch' => $user->watchLists()
//                            ->whereHas('status', function($query) {
//                                $query->where('name', 'want_to_watch');
//                            })
//                            ->count(),
//        'avgRating' => $user->watchLists
//                            ->avg('rating')
//    ];

    $statusIds = Status::whereIn('name', [
        'watching',
        'completed',
        'want_to_watch',
    ])->pluck('id','name');

    $stats = DB::table('watch_lists')
        ->where('user_id', auth()->id())
        ->selectRaw("
            COUNT(*) AS total,
            SUM(CASE WHEN status_id = ? THEN 1 ELSE 0 END) AS watching,
            SUM(CASE WHEN status_id = ? THEN 1 ELSE 0 END) AS completed,
            SUM(CASE WHEN status_id = ? THEN 1 ELSE 0 END) AS want_to_watch,
            AVG(rating) AS avg_rating
        ",
        [
            $statusIds['watching'],
            $statusIds['completed'],
            $statusIds['want_to_watch'],
        ])
        ->first();

    // and if you need the same keys as before:
    $formatted = [
        'total'       => (int) $stats->total,
        'watching'    => (int) $stats->watching,
        'completed'   => (int) $stats->completed,
        'wantToWatch' => (int) $stats->want_to_watch,
        'avgRating'   => round($stats->avg_rating, 1),
    ];
    return Inertia::render('Dashboard', [
        'stats' => $formatted,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
