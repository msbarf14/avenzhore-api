<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = "alumnis";
    protected $guarded = [];  

    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
