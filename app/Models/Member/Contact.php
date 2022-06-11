<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  protected $table = 'member_contacts';

  public function member() {
    return $this->belongsTo('App\Models\Member\Member', 'member_id');
  }
}
