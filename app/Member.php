<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
  protected $table = 'members';

  protected $fillable = [
    'full_name',
    'born_place',
    'born_date',
    'gender',
  ];
}
