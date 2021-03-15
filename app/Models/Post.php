<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\PostDec;

class Post extends Model
{
    use HasFactory;

    /**
     * Get the author that owns the post.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getNewerAttribute()
    {
        return self::where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    }

    public function getOlderAttribute()
    {
        return self::where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    }
}
