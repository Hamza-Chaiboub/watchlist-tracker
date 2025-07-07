<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use hasFactory;
    //

    protected $fillable = ['name'];

    public function contents() {
        return $this->hasMany(Content::class, 'type_id');
    }
}
