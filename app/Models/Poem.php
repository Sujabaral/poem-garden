<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Poem extends Model
{
    use SoftDeletes;

    const DELETED_AT = 'archived_at';   
    protected $fillable=['title', 
    'author', 
    'genre',
    'body',
    'image'];

    public function favoritedByUsers()
    {
    return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }
}

