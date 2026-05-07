<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poem extends Model
{
    protected $fillable=['title', 
    'author', 
    'genre',
    'body',
    'image'];
}

