<?php

namespace App\Http\Controllers;

use App\Models\WatchList;
use Illuminate\Http\Request;

class WatchListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $watchLists = auth()->user()->watchLists()
            ->with(['content', 'status', 'content.type'])
            ->get()
            ->map(function($item) {
                return [
                    'watchlist_id' => $item->id,
                    'content_id' => $item->content->id,
                    'content_external_id' => $item->content->external_id,
                    'content_name' => $item->content->title,
                    'content_type' => $item->content->type->name,
                    'content_release_year' => $item->content->year,
                    'content_poster' => $item->content->poster_path

                ];
            });
        return response()->json($watchLists);
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
