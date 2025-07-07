<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Content extends Model
{
    use HasFactory;
    protected $fillable = [
        'external_id',
        'title',
        'year',
        'type_id',
        'poster_path'
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'watch_lists')
            ->using(WatchList::class)
            ->withPivot('status_id', 'rating', 'created_at', 'updated_at')
            ->withTimestamps();
    }
}
