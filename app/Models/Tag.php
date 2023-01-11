<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = false;
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
    use HasFactory;
}
