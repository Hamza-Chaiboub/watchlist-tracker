<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchList extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'content_id',
        'status_id',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function content() {
        return $this->belongsTo(Content::class, 'content_id');
    }
}
