<?php

namespace App\Http\Controllers;

use App\Models\WatchList;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WatchListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $stats = [
            'total' => $user->watchLists->count(),
            'watching' => $user->watchLists()
                ->whereHas('status', function($query) {
                    $query->where('name', 'watching');
                })
                ->count(),
            'completed' => $user->watchLists()
                ->whereHas('status', function($query) {
                    $query->where('name', 'completed');
                })
                ->count(),
            'wantToWatch' => $user->watchLists()
                ->whereHas('status', function($query) {
                    $query->where('name', 'want_to_watch');
                })
                ->count(),
            'avgRating' => $user->watchLists->avg('rating'),
        ];
        $continue = $user->watchLists()
            ->with(['content', 'content.type'])
            ->whereHas('status', function($query) {
                $query->where('name', 'watching');
            })
            ->get()
            ->map(function($watchList) {
                return [
                    'id' => $watchList->id,
                    'content_id' => $watchList->content_id,
                    'title' => $watchList->content->title,
                    'image_url' => $watchList->content->poster_path,
                    'type' => $watchList->content->type->name,
                    'rating' => $watchList->rating,
                    'progress' => 53,

                ];
            });
        $top_rated = $user->watchLists()
            ->with(['content', 'content.type'])
            ->orderBy('rating', 'desc')
            ->take(5)
            ->get()
            ->map(function($watchList) {
                return [
                    'id' => $watchList->id,
                    'content_id' => $watchList->content_id,
                    'title' => $watchList->content->title,
                    'image_url' => $watchList->content->poster_path,
                    'type' => $watchList->content->type->name,
                    'rating' => $watchList->rating,
                    'progress' => 53,
                ];
            });

        return Inertia::render('Dashboard', [
            'stats' => $stats,
            'userContinue' => $continue,
            'topRated' => $top_rated,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(WatchList $watchList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WatchList $watchList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WatchList $watchList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WatchList $watchList)
    {
        //
    }
}
