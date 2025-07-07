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

    public function watchlists() {
        return $this->hasMany(WatchList::class);
    }
}
