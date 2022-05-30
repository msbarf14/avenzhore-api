<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacherbook extends Model
{
    protected $table = 'teacherbooks';

    public function teacher(){
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function book(){
        return $this->belongsTo(Book::class, 'book_id');
    }
}
