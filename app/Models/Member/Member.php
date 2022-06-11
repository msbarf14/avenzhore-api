<?php

namespace App\Models\Member;

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

  public function address() {
    return $this->hasOne('App\Models\Member\Address', 'member_id');
  }

  public function contact() {
    return $this->hasMany('App\Models\Member\Contact', 'member_id');
  }
}
