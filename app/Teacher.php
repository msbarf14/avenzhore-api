<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = "teachers";

    protected $casts = [
        'studies' => 'array'
    ];

    public function booksDetail() {
        return $this->hasMany(Teacherbook::class, 'teacher_id');
    }

}
