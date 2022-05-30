<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    
    public function genre() {
        return $this->belongsTo(BookGenre::class, 'genre_id');
    }
}
