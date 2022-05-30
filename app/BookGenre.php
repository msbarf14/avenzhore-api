<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookGenre extends Model
{
    protected $table = 'book_genres';

    public function books(){
        return $this->hasMany(Book::class, 'genre_id');
    }
    
}
