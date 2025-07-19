<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Content $content)
    {
        $content = Content::where('id', $content->id)
            ->with(['watchlists' => function($query) use ($content) {
                $query->where('user_id', auth()->id())
                      ->where('content_id', $content->id)
                      ->with('status');
            }, 'type'])
            ->first();
        if($content) {
            $watchlist = $content->watchlists->first();
            $content = [
                'id' => $content->id,
                'content_id' => $content->id,
                'title' => $content->title,
                'image_url' => $content->poster_path,
                'type' => $content->type->name,
                'rating' => $watchlist->rating,
                'status' => $watchlist->status->name,
                'release_date' => $content->year,
            ];
        } else {
            $content = null;
        }
        return Inertia::render('Content', [
            'content' => $content,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Content $content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        //
    }
}
