<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use hasFactory;

    protected $fillable = ['name'];

    public function contents() {
        return $this->hasMany(Content::class, 'status_id');
    }
}
